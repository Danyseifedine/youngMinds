<?php

namespace App\Orchid\Screens;

use App\Models\Course;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class CourseEditScreen extends Screen
{
    /**
     * @var Course
     */
    public $course;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Course $course): iterable
    {
        return [
            'course' => $course
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->course->exists ? 'Edit Course' : 'Create Course';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return $this->course->exists ? 'Update course information' : 'Create a new course';
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
                ->canSee(!$this->course->exists),

            Button::make('Update')
                ->icon('note')
                ->method('createOrUpdate')
                ->canSee($this->course->exists),

            Button::make('Delete')
                ->icon('trash')
                ->method('remove')
                ->confirm('Are you sure you want to delete this course?')
                ->canSee($this->course->exists),
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
                Input::make('course.name')
                    ->title('Course Name')
                    ->placeholder('Enter course name')
                    ->required()
                    ->help('Name of the course or program'),

                CheckBox::make('course.has_level')
                    ->title('Has Levels')
                    ->placeholder('Does this course have multiple levels?')
                    ->help('Check if this course has different levels (Level 1, Level 2, etc.)'),

                Input::make('course.level')
                    ->title('Number of Levels')
                    ->type('number')
                    ->placeholder('Enter number of levels (1-10)')
                    ->min(1)
                    ->max(10)
                    ->help('How many levels does this course have? (Leave empty if no levels)'),

                CheckBox::make('course.is_active')
                    ->title('Active')
                    ->placeholder('Is this course active?')
                    ->help('Only active courses will be available for registration')
                    ->value(1),
            ])
        ];
    }

    /**
     * Create or update course.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function createOrUpdate(Request $request)
    {
        $request->validate([
            'course.name' => 'required|string|max:255',
            'course.level' => 'nullable|integer|min:1|max:10',
        ]);

        $courseData = $request->get('course');
        
        // Handle checkboxes properly - if not sent, they're false (unchecked)
        $courseData['has_level'] = isset($courseData['has_level']) ? true : false;
        $courseData['is_active'] = isset($courseData['is_active']) ? true : false;

        $this->course->fill($courseData)->save();

        Toast::info(__('Course was saved successfully.'));

        return redirect()->route('platform.courses');
    }

    /**
     * Delete course.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove()
    {
        $this->course->delete();

        Toast::info(__('Course was deleted successfully.'));

        return redirect()->route('platform.courses');
    }
}