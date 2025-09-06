<?php

namespace App\Orchid\Screens;

use App\Models\Registration;
use App\Models\Course;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class RegistrationEditScreen extends Screen
{
    /**
     * @var Registration
     */
    public $registration;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Registration $registration): iterable
    {
        return [
            'registration' => $registration,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->registration->exists ? 'Edit Registration' : 'Create Registration';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->registration->exists ? 'Update registration information' : 'Create a new registration';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save')
                ->icon('check')
                ->method('createOrUpdate')
                ->canSee(!$this->registration->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->registration->exists),

            Button::make('Accept')
                ->icon('check')
                ->method('accept')
                ->confirm('Accept this registration?')
                ->canSee($this->registration->exists && $this->registration->status === 'pending'),

            Button::make('Cancel Registration')
                ->icon('close')
                ->method('cancel')
                ->confirm('Cancel this registration?')
                ->canSee($this->registration->exists && $this->registration->status !== 'cancelled'),

            Button::make('Delete')
                ->icon('trash')
                ->method('remove')
                ->confirm('Are you sure you want to delete this registration?')
                ->canSee($this->registration->exists),
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
                Input::make('registration.child_name')
                    ->title('Child Name')
                    ->placeholder('Enter child name')
                    ->required()
                    ->help('Full name of the child'),

                Input::make('registration.child_age')
                    ->title('Child Age')
                    ->type('number')
                    ->placeholder('Enter child age')
                    ->required()
                    ->min(3)
                    ->max(18)
                    ->help('Age of the child in years'),

                Input::make('registration.parent_phone')
                    ->title('Parent Phone')
                    ->type('tel')
                    ->placeholder('Enter parent phone number')
                    ->required()
                    ->help('Phone number for contact'),

                Select::make('registration.course_id')
                    ->title('Course')
                    ->fromQuery(Course::where('is_active', true), 'name')
                    ->required()
                    ->help('Select the course for registration'),

                Input::make('registration.selected_level')
                    ->title('Level')
                    ->type('number')
                    ->min(1)
                    ->placeholder('Enter level number')
                    ->help('Enter the level number (only for courses with levels)'),

                Select::make('registration.preferred_time_slot')
                    ->title('Preferred Time Slot')
                    ->options([
                        'morning' => 'Morning',
                        'afternoon' => 'Afternoon',
                        'evening' => 'Evening',
                        'weekend' => 'Weekend',
                    ])
                    ->empty('Select time slot')
                    ->help('Preferred time for classes'),

                Select::make('registration.status')
                    ->title('Status')
                    ->options([
                        'pending' => 'Pending',
                        'accepted' => 'Accepted',
                        'cancelled' => 'Cancelled',
                    ])
                    ->required()
                    ->value($this->registration->status ?? 'pending')
                    ->help('Registration status'),
            ]),

            Layout::view('orchid.registration-script')
        ];
    }

    /**
     * Create or update registration.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Request $request)
    {
        $data = $request->get('registration');

        // Check if the selected course has levels
        $course = Course::find($data['course_id'] ?? null);

        // Build validation rules dynamically
        $rules = [
            'registration.child_name' => 'required|string|max:255',
            'registration.child_age' => 'required|integer|min:3|max:18',
            'registration.parent_phone' => 'required|string|max:255',
            'registration.course_id' => 'required|exists:courses,id',
            'registration.preferred_time_slot' => 'nullable|in:morning,afternoon,evening,weekend',
            'registration.status' => 'nullable|in:pending,accepted,cancelled',
        ];

        // Add level validation only if course has levels
        if ($course && $course->has_level && $course->level > 0) {
            $rules['registration.selected_level'] = 'required|integer|min:1|max:' . $course->level;
        } else {
            // Clear selected_level if course doesn't have levels
            $data['selected_level'] = null;
            $request->merge(['registration' => $data]);
        }

        $request->validate($rules);

        $this->registration->fill($data)->save();

        Toast::info(__('Registration was saved successfully.'));

        return redirect()->route('platform.registrations');
    }

    /**
     * Accept registration.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function accept()
    {
        $this->registration->status = 'accepted';
        $this->registration->save();

        Toast::info(__('Registration was accepted successfully.'));

        return redirect()->route('platform.registrations');
    }

    /**
     * Cancel registration.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function cancel()
    {
        $this->registration->status = 'cancelled';
        $this->registration->save();

        Toast::info(__('Registration was cancelled successfully.'));

        return redirect()->route('platform.registrations');
    }

    /**
     * Delete registration.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->registration->delete();

        Toast::info(__('Registration was deleted successfully.'));

        return redirect()->route('platform.registrations');
    }

    /**
     * Async method to get course levels (for AJAX requests)
     *
     * @param Request $request
     * @return array
     */
    public function asyncGetCourseLevels(Request $request): array
    {
        $courseId = $request->get('course_id');

        if (!$courseId) {
            return [
                'has_level' => false,
                'levels' => []
            ];
        }

        $course = Course::find($courseId);

        if (!$course || !$course->has_level || !$course->level) {
            return [
                'has_level' => false,
                'levels' => []
            ];
        }

        $levels = [];
        for ($i = 1; $i <= $course->level; $i++) {
            $levels[$i] = 'Level ' . $i;
        }

        return [
            'has_level' => true,
            'level_count' => $course->level,
            'levels' => $levels
        ];
    }
}
