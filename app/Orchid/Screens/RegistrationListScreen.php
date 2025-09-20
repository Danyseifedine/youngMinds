<?php

namespace App\Orchid\Screens;

use App\Models\Student;
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
            'students' => Student::with('user')->latest()->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Students';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Manage student registrations and applications';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('New Student')
                ->icon('plus')
                ->route('platform.students.create'),
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
            Layout::table('students', [
                TD::make('user.name', 'Student Name')
                    ->render(function (Student $student) {
                        return Link::make($student->user->name)
                            ->route('platform.students.edit', $student);
                    })
                    ->sort()
                    ->cantHide(),

                TD::make('child_age', 'Age')
                    ->sort(),

                TD::make('parent_phone', 'Phone')
                    ->render(function (Student $student) {
                        return '<a href="tel:' . $student->parent_phone . '">' . $student->parent_phone . '</a>';
                    }),

                TD::make('preferred_time_slot', 'Time Slot')
                    ->render(function (Student $student) {
                        return $student->preferred_time_slot ? ucfirst($student->preferred_time_slot) : '-';
                    })
                    ->sort()
                    ->filter(TD::FILTER_SELECT, [
                        'morning' => 'Morning',
                        'afternoon' => 'Afternoon',
                        'evening' => 'Evening',
                        'weekend' => 'Weekend',
                    ]),

                TD::make('status', 'Status')
                    ->render(function (Student $student) {
                        $colors = [
                            'pending' => 'warning',
                            'accepted' => 'success', 
                            'cancelled' => 'danger'
                        ];
                        $color = $colors[$student->status] ?? 'secondary';
                        return '<span class="badge bg-' . $color . '">' . ucfirst($student->status) . '</span>';
                    })
                    ->sort()
                    ->filter(TD::FILTER_SELECT, [
                        'pending' => 'Pending',
                        'accepted' => 'Accepted',
                        'cancelled' => 'Cancelled',
                    ]),

                TD::make('created_at', 'Registered')
                    ->render(function (Student $student) {
                        return $student->created_at->format('M d, Y H:i');
                    })
                    ->sort(),

                TD::make('actions', 'Actions')
                    ->cantHide()
                    ->render(function (Student $student) {
                        return DropDown::make()
                            ->icon('bs.three-dots-vertical')
                            ->list([
                                Link::make(' Edit')
                                    ->route('platform.students.edit', $student)
                                    ->icon('bs.pencil'),

                                // Status-specific actions
                                ...($student->status === 'pending' ? [
                                    Button::make(' Accept')
                                        ->icon('bs.check-circle')
                                        ->confirm('Accept this student?')
                                        ->method('acceptStudent')
                                        ->parameters(['id' => $student->id])
                                        ->class('btn btn-link dropdown-item text-success'),

                                    Button::make(' Cancel')
                                        ->icon('bs.x-circle')
                                        ->confirm('Cancel this student application?')
                                        ->method('cancelStudent')
                                        ->parameters(['id' => $student->id])
                                        ->class('btn btn-link dropdown-item text-warning'),
                                ] : []),

                                ...($student->status === 'accepted' ? [
                                    Button::make(' Mark as Pending')
                                        ->icon('bs.clock')
                                        ->confirm('Change status back to pending?')
                                        ->method('pendingStudent')
                                        ->parameters(['id' => $student->id])
                                        ->class('btn btn-link dropdown-item text-warning'),

                                    Button::make(' Cancel')
                                        ->icon('bs.x-circle')
                                        ->confirm('Cancel this student application?')
                                        ->method('cancelStudent')
                                        ->parameters(['id' => $student->id])
                                        ->class('btn btn-link dropdown-item text-warning'),
                                ] : []),

                                ...($student->status === 'cancelled' ? [
                                    Button::make(' Reactivate')
                                        ->icon('bs.arrow-clockwise')
                                        ->confirm('Reactivate this student as pending?')
                                        ->method('pendingStudent')
                                        ->parameters(['id' => $student->id])
                                        ->class('btn btn-link dropdown-item text-success'),

                                    Button::make(' Accept')
                                        ->icon('bs.check-circle')
                                        ->confirm('Accept this student?')
                                        ->method('acceptStudent')
                                        ->parameters(['id' => $student->id])
                                        ->class('btn btn-link dropdown-item text-success'),
                                ] : []),

                                Button::make(' Delete')
                                    ->icon('bs.trash3')
                                    ->confirm('Are you sure you want to delete this student?')
                                    ->method('remove')
                                    ->parameters(['id' => $student->id])
                                    ->class('btn btn-link dropdown-item text-danger')
                            ]);
                    })
                    ->width('60px'),
            ]),
        ];
    }

    /**
     * Accept student.
     */
    public function acceptStudent(Request $request)
    {
        $student = Student::findOrFail($request->get('id'));
        $student->status = 'accepted';
        $student->save();

        Toast::success('Student has been accepted successfully.');

        return redirect()->route('platform.students');
    }

    /**
     * Cancel student.
     */
    public function cancelStudent(Request $request)
    {
        $student = Student::findOrFail($request->get('id'));
        $student->status = 'cancelled';
        $student->save();

        Toast::warning('Student application has been cancelled.');

        return redirect()->route('platform.students');
    }

    /**
     * Mark student as pending.
     */
    public function pendingStudent(Request $request)
    {
        $student = Student::findOrFail($request->get('id'));
        $student->status = 'pending';
        $student->save();

        Toast::info('Student has been marked as pending.');

        return redirect()->route('platform.students');
    }

    /**
     * Remove the student.
     */
    public function remove(Request $request)
    {
        $student = Student::findOrFail($request->get('id'));
        $student->delete();

        Toast::info('Student was removed successfully.');

        return redirect()->route('platform.students');
    }
}
