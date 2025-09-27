<?php

namespace App\Orchid\Screens;

use App\Models\Payment;
use App\Models\User;
use App\Models\Course;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Relation;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class PaymentListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        $paymentsQuery = Payment::with(['user', 'course'])->filters();

        // Calculate comprehensive financial metrics based on current filters
        $totalRevenue = $paymentsQuery->sum('amount_paid');
        $totalPayments = $paymentsQuery->count();
        $totalOwedToStudents = $paymentsQuery->sum('owe_to_student');
        $totalOwedFromStudents = $paymentsQuery->sum('owe_from_student');

        // Net profit = Total revenue - what we owe to students + what students owe us
        $netProfit = $totalRevenue - $totalOwedToStudents + $totalOwedFromStudents;

        $payments = $paymentsQuery->latest()->paginate();

        return [
            'payments' => $payments,
            'totalRevenue' => $totalRevenue,
            'totalPayments' => $totalPayments,
            'totalOwedToStudents' => $totalOwedToStudents,
            'totalOwedFromStudents' => $totalOwedFromStudents,
            'netProfit' => $netProfit
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Payment Management';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        $data = $this->query();
        $hasFilters = !empty(array_filter(request('filter', [])));

        $prefix = $hasFilters ? 'Filtered Results' : 'Total';

        $metrics = [
            "Payments: {$data['totalPayments']}",
            "Revenue: $" . number_format($data['totalRevenue'], 2),
            "We Owe Students: $" . number_format($data['totalOwedToStudents'], 2),
            "Students Owe Us: $" . number_format($data['totalOwedFromStudents'], 2),
            "Net Profit: $" . number_format($data['netProfit'], 2)
        ];

        return "$prefix | " . implode(' | ', $metrics);
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        $hasFilters = !empty(array_filter(request('filter', [])));

        return [
            Button::make('Clear Filters')
                ->icon('bs.x-circle')
                ->method('clearFilters')
                ->class('btn btn-outline-secondary me-2')
                ->canSee($hasFilters),

            Link::make('New Payment')
                ->icon('bs.plus')
                ->route('platform.payments.create'),
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
                Input::make('filter[start_date]')
                    ->title('Start Date')
                    ->type('date')
                    ->placeholder('Select start date')
                    ->value(request('filter.start_date'))
                    ->help('Filter payments from this date'),

                Input::make('filter[end_date]')
                    ->title('End Date')
                    ->type('date')
                    ->placeholder('Select end date')
                    ->value(request('filter.end_date'))
                    ->help('Filter payments until this date'),

                Relation::make('filter[user_id]')
                    ->title('Filter by Student')
                    ->fromModel(User::class, 'name')
                    ->searchColumns('name', 'email')
                    ->chunk(20)
                    ->value(request('filter.user_id'))
                    ->help('Search and select a student'),

                Relation::make('filter[course_id]')
                    ->title('Filter by Course')
                    ->fromModel(Course::class, 'name')
                    ->searchColumns('name')
                    ->value(request('filter.course_id'))
                    ->help('Select a course'),

                Select::make('filter[payment_status]')
                    ->title('Filter by Status')
                    ->options([
                        '' => 'All Statuses',
                        'partial' => 'Partial',
                        'full' => 'Full',
                        'overpaid' => 'Overpaid',
                        'refunded' => 'Refunded',
                    ])
                    ->value(request('filter.payment_status'))
                    ->help('Filter by payment status'),

                Button::make('Apply Filters')
                    ->icon('bs.funnel')
                    ->method('applyFilters')
                    ->class('btn btn-primary me-2'),

                Button::make('Clear Filters')
                    ->icon('bs.x-circle')
                    ->method('clearFilters')
                    ->class('btn btn-secondary'),
            ])->title('Filters'),


            Layout::table('payments', [
                TD::make('user.name', 'Student Name')
                    ->render(function (Payment $payment) {
                        return Link::make($payment->user->name)
                            ->route('platform.payments.edit', $payment);
                    })
                    ->sort()
                    ->cantHide(),

                TD::make('course.name', 'Course')
                    ->render(function (Payment $payment) {
                        return $payment->course->name ?? 'N/A';
                    })
                    ->sort(),

                TD::make('level', 'Level')
                    ->render(function (Payment $payment) {
                        return $payment->level ? "Level {$payment->level}" : 'N/A';
                    }),

                TD::make('amount_paid', 'Amount Paid')
                    ->render(function (Payment $payment) {
                        return '$' . number_format($payment->amount_paid, 2);
                    })
                    ->sort(),

                TD::make('payment_status', 'Status')
                    ->render(function (Payment $payment) {
                        $color = $payment->status_badge_color;
                        return '<span class="badge bg-' . $color . '">' . $payment->formatted_status . '</span>';
                    })
                    ->sort()
                    ->filter(TD::FILTER_SELECT, [
                        'partial' => 'Partial',
                        'full' => 'Full',
                        'overpaid' => 'Overpaid',
                        'refunded' => 'Refunded',
                    ]),

                TD::make('balance', 'Balance')
                    ->render(function (Payment $payment) {
                        $balance = $payment->balance;
                        if ($balance > 0) {
                            return '<span class="text-success">We owe: $' . number_format($balance, 2) . '</span>';
                        } elseif ($balance < 0) {
                            return '<span class="text-danger">They owe: $' . number_format(abs($balance), 2) . '</span>';
                        }
                        return '<span class="text-muted">Balanced</span>';
                    }),

                TD::make('payment_date', 'Payment Date')
                    ->render(function (Payment $payment) {
                        return $payment->payment_date->format('M d, Y');
                    })
                    ->sort(),

                TD::make('actions', 'Actions')
                    ->cantHide()
                    ->render(function (Payment $payment) {
                        return DropDown::make()
                            ->icon('bs.three-dots-vertical')
                            ->list([
                                Link::make(' Edit')
                                    ->route('platform.payments.edit', $payment)
                                    ->icon('bs.pencil'),

                                Button::make(' Mark as Full')
                                    ->icon('bs.check-circle')
                                    ->confirm('Mark this payment as fully paid?')
                                    ->method('markAsFull')
                                    ->parameters(['id' => $payment->id])
                                    ->class('btn btn-link dropdown-item text-success')
                                    ->canSee($payment->payment_status !== 'full'),

                                Button::make(' Delete')
                                    ->icon('bs.trash3')
                                    ->confirm('Are you sure you want to delete this payment record?')
                                    ->method('remove')
                                    ->parameters(['id' => $payment->id])
                                    ->class('btn btn-link dropdown-item text-danger')
                            ]);
                    })
                    ->width('60px'),
            ]),
        ];
    }

    /**
     * Mark payment as full.
     */
    public function markAsFull(Request $request)
    {
        $payment = Payment::findOrFail($request->get('id'));

        // Set both owe fields to 0 to trigger auto-status calculation
        $payment->owe_to_student = 0;
        $payment->owe_from_student = 0;
        $payment->save();

        Toast::success('Payment has been marked as fully paid.');

        return redirect()->route('platform.payments');
    }

    /**
     * Remove the payment.
     */
    public function remove(Request $request)
    {
        $payment = Payment::findOrFail($request->get('id'));
        $payment->delete();

        Toast::info('Payment record was removed successfully.');

        return redirect()->route('platform.payments');
    }

    /**
     * Apply filters.
     */
    public function applyFilters(Request $request)
    {
        $filters = array_filter($request->get('filter', []));

        if (empty($filters)) {
            Toast::info('No filters applied');
        } else {
            Toast::success('Filters applied successfully!');
        }

        return redirect()->route('platform.payments', ['filter' => $filters]);
    }

    /**
     * Clear all filters.
     */
    public function clearFilters()
    {
        return redirect()->route('platform.payments');
    }
}