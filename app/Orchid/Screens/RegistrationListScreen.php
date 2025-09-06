<?php

namespace App\Orchid\Screens;

use App\Models\Registration;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Fields\Select;
use Orchid\Support\Facades\Modal;
use Illuminate\Http\Request;

class RegistrationListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'registrations' => Registration::with('course')->latest()->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Registrations';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Manage course registrations and applications';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('New Registration')
                ->icon('plus')
                ->route('platform.registrations.create'),
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
            Layout::table('registrations', [
                TD::make('child_name', 'Child Name')
                    ->render(function (Registration $registration) {
                        return Link::make($registration->child_name)
                            ->route('platform.registrations.edit', $registration);
                    })
                    ->sort()
                    ->cantHide(),

                TD::make('child_age', 'Age')
                    ->sort(),

                TD::make('parent_phone', 'Phone')
                    ->render(function (Registration $registration) {
                        return '<a href="tel:' . $registration->parent_phone . '">' . $registration->parent_phone . '</a>';
                    }),

                TD::make('course.name', 'Course')
                    ->render(function (Registration $registration) {
                        return $registration->course ? $registration->course->name : '-';
                    })
                    ->sort(),

                TD::make('selected_level', 'Level')
                    ->render(function (Registration $registration) {
                        if (!$registration->selected_level) {
                            return '-';
                        }
                        return 'Level ' . $registration->selected_level;
                    }),

                TD::make('preferred_time_slot', 'Time Slot')
                    ->render(function (Registration $registration) {
                        return $registration->preferred_time_slot ? ucfirst($registration->preferred_time_slot) : '-';
                    })
                    ->sort()
                    ->filter(TD::FILTER_SELECT, [
                        'morning' => 'Morning',
                        'afternoon' => 'Afternoon',
                        'evening' => 'Evening',
                        'weekend' => 'Weekend',
                    ]),

                TD::make('status', 'Status')
                    ->render(function (Registration $registration) {
                        $color = $registration->status_badge_color;
                        return '<span class="badge bg-' . $color . '">' . $registration->formatted_status . '</span>';
                    })
                    ->sort()
                    ->filter(TD::FILTER_SELECT, [
                        'pending' => 'Pending',
                        'accepted' => 'Accepted',
                        'cancelled' => 'Cancelled',
                    ]),

                TD::make('created_at', 'Registered')
                    ->render(function (Registration $registration) {
                        return $registration->created_at->format('M d, Y H:i');
                    })
                    ->sort(),

                TD::make('actions', 'Actions')
                    ->cantHide()
                    ->render(function (Registration $registration) {
                        return DropDown::make()
                            ->icon('bs.three-dots-vertical')
                            ->list([
                                Link::make(' Edit')
                                    ->route('platform.registrations.edit', $registration)
                                    ->icon('bs.pencil'),

                                // Status-specific actions
                                ...($registration->status === 'pending' ? [
                                    Button::make(' Accept')
                                        ->icon('bs.check-circle')
                                        ->confirm('Accept this registration?')
                                        ->method('acceptRegistration')
                                        ->parameters(['id' => $registration->id])
                                        ->class('btn btn-link dropdown-item text-success'),

                                    Button::make(' Cancel')
                                        ->icon('bs.x-circle')
                                        ->confirm('Cancel this registration?')
                                        ->method('cancelRegistration')
                                        ->parameters(['id' => $registration->id])
                                        ->class('btn btn-link dropdown-item text-warning'),
                                ] : []),

                                ...($registration->status === 'accepted' ? [
                                    Button::make(' Mark as Pending')
                                        ->icon('bs.clock')
                                        ->confirm('Change status back to pending?')
                                        ->method('pendingRegistration')
                                        ->parameters(['id' => $registration->id])
                                        ->class('btn btn-link dropdown-item text-warning'),

                                    Button::make(' Cancel')
                                        ->icon('bs.x-circle')
                                        ->confirm('Cancel this registration?')
                                        ->method('cancelRegistration')
                                        ->parameters(['id' => $registration->id])
                                        ->class('btn btn-link dropdown-item text-warning'),
                                ] : []),

                                ...($registration->status === 'cancelled' ? [
                                    Button::make(' Reactivate')
                                        ->icon('bs.arrow-clockwise')
                                        ->confirm('Reactivate this registration as pending?')
                                        ->method('pendingRegistration')
                                        ->parameters(['id' => $registration->id])
                                        ->class('btn btn-link dropdown-item text-success'),

                                    Button::make(' Accept')
                                        ->icon('bs.check-circle')
                                        ->confirm('Accept this registration?')
                                        ->method('acceptRegistration')
                                        ->parameters(['id' => $registration->id])
                                        ->class('btn btn-link dropdown-item text-success'),
                                ] : []),

                                Button::make(' Delete')
                                    ->icon('bs.trash3')
                                    ->confirm('Are you sure you want to delete this registration?')
                                    ->method('remove')
                                    ->parameters(['id' => $registration->id])
                                    ->class('btn btn-link dropdown-item text-danger')
                            ]);
                    })
                    ->width('60px'),
            ]),
        ];
    }

    /**
     * Accept registration.
     */
    public function acceptRegistration(Request $request)
    {
        $registration = Registration::findOrFail($request->get('id'));
        $registration->status = 'accepted';
        $registration->save();

        Toast::success('Registration has been accepted successfully.');

        return redirect()->route('platform.registrations');
    }

    /**
     * Cancel registration.
     */
    public function cancelRegistration(Request $request)
    {
        $registration = Registration::findOrFail($request->get('id'));
        $registration->status = 'cancelled';
        $registration->save();

        Toast::warning('Registration has been cancelled.');

        return redirect()->route('platform.registrations');
    }

    /**
     * Mark registration as pending.
     */
    public function pendingRegistration(Request $request)
    {
        $registration = Registration::findOrFail($request->get('id'));
        $registration->status = 'pending';
        $registration->save();

        Toast::info('Registration has been marked as pending.');

        return redirect()->route('platform.registrations');
    }

    /**
     * Remove the registration.
     */
    public function remove(Request $request)
    {
        $registration = Registration::findOrFail($request->get('id'));
        $registration->delete();

        Toast::info('Registration was removed successfully.');

        return redirect()->route('platform.registrations');
    }
}
