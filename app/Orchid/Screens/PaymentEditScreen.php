<?php

namespace App\Orchid\Screens;

use App\Models\Payment;
use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class PaymentEditScreen extends Screen
{
    /**
     * @var Payment
     */
    public $payment;

    /**
     * Query data.
     *
     * @param Payment $payment
     * @return array
     */
    public function query(Payment $payment): iterable
    {
        return [
            'payment' => $payment
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->payment->exists ? 'Edit Payment' : 'Create Payment';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Manage student payment records and financial tracking';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save Payment')
                ->icon('bs.check')
                ->method('save')
                ->class('btn btn-success'),

            Button::make('Remove')
                ->icon('bs.trash3')
                ->method('remove')
                ->class('btn btn-danger')
                ->confirm('Are you sure you want to delete this payment?')
                ->canSee($this->payment->exists),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                // Student Selection with Search
                Relation::make('payment.user_id')
                    ->title('Student')
                    ->fromModel(User::class, 'name')
                    ->searchColumns('name', 'email')
                    ->chunk(20)
                    ->help('Search by student name or email')
                    ->required(),

                // Course Selection with Search
                Relation::make('payment.course_id')
                    ->title('Course')
                    ->fromModel(Course::class, 'name')
                    ->searchColumns('name')
                    ->help('Select the course for this payment')
                    ->required(),

                // Level Selection (dynamic based on course)
                Input::make('payment.level')
                    ->type('number')
                    ->title('Level')
                    ->placeholder('Enter level number')
                    ->help('Leave empty if course has no levels')
                    ->min(1)
                    ->max(10),
            ]),

            Layout::rows([
                // Payment Details
                Input::make('payment.amount_paid')
                    ->type('number')
                    ->step(0.01)
                    ->title('Amount Paid ($)')
                    ->placeholder('0.00')
                    ->help('How much the student paid in USD')
                    ->required(),

                Input::make('payment.auto_status')
                    ->title('Payment Status (Auto-calculated)')
                    ->readonly()
                    ->help('Status is automatically calculated based on owe amounts')
                    ->value($this->payment->auto_status ?? 'Will be calculated on save'),
            ]),

            Layout::rows([
                // Financial Tracking
                Input::make('payment.owe_to_student')
                    ->type('number')
                    ->step(0.01)
                    ->title('We Owe to Student ($)')
                    ->placeholder('0.00')
                    ->help('Money we need to return to the student')
                    ->value(0),

                Input::make('payment.owe_from_student')
                    ->type('number')
                    ->step(0.01)
                    ->title('Student Owes Us ($)')
                    ->placeholder('0.00')
                    ->help('Money the student still owes us')
                    ->value(0),
            ]),

            Layout::rows([
                // Date Fields
                DateTimer::make('payment.payment_date')
                    ->title('Payment Date')
                    ->enableTime(false)
                    ->format('Y-m-d')
                    ->help('When the payment was made')
                    ->required(),

                DateTimer::make('payment.full_payment_date')
                    ->title('Full Payment Date')
                    ->enableTime(false)
                    ->format('Y-m-d')
                    ->help('When the full payment was completed (leave empty if not fully paid)'),

                DateTimer::make('payment.refund_date')
                    ->title('Refund Date')
                    ->enableTime(false)
                    ->format('Y-m-d')
                    ->help('When money was refunded (leave empty if no refund)'),
            ]),

            Layout::rows([
                // Notes
                TextArea::make('payment.notes')
                    ->title('Notes')
                    ->placeholder('Add any additional notes about this payment...')
                    ->rows(3)
                    ->help('Optional notes about the payment'),
            ]),
        ];
    }

    /**
     * Save the payment.
     */
    public function save(Request $request, Payment $payment)
    {
        $request->validate([
            'payment.user_id' => 'required|exists:users,id',
            'payment.course_id' => 'required|exists:courses,id',
            'payment.amount_paid' => 'required|numeric|min:0',
            'payment.payment_date' => 'required|date',
            'payment.owe_to_student' => 'nullable|numeric|min:0',
            'payment.owe_from_student' => 'nullable|numeric|min:0',
        ]);

        $paymentData = $request->get('payment');

        // Set default values for financial tracking
        $paymentData['owe_to_student'] = $paymentData['owe_to_student'] ?? 0;
        $paymentData['owe_from_student'] = $paymentData['owe_from_student'] ?? 0;

        // Remove auto_status from fillable data as it's calculated automatically
        unset($paymentData['auto_status']);

        $payment->fill($paymentData)->save();

        Toast::success('Payment has been saved successfully!');

        return redirect()->route('platform.payments');
    }

    /**
     * Remove the payment.
     */
    public function remove(Payment $payment)
    {
        $payment->delete();

        Toast::info('Payment record was removed successfully.');

        return redirect()->route('platform.payments');
    }
}