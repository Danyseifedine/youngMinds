<?php

namespace App\Orchid\Screens;

use App\Models\Course;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class CourseListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'courses' => Course::orderBy('name')->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Courses';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Manage educational courses and programs';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Create new course')
                ->icon('plus')
                ->route('platform.courses.create'),
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
            Layout::table('courses', [
                TD::make('name', 'Course Name')
                    ->render(function (Course $course) {
                        return Link::make($course->name)
                            ->route('platform.courses.edit', $course);
                    })
                    ->sort()
                    ->cantHide(),

                TD::make('has_level', 'Has Levels')
                    ->render(function (Course $course) {
                        return $course->has_level
                            ? '<span class="badge bg-info">Yes</span>'
                            : '<span class="badge bg-secondary">No</span>';
                    })
                    ->sort()
                    ->filter(TD::FILTER_SELECT, [
                        1 => 'Yes',
                        0 => 'No',
                    ]),

                TD::make('level', 'Levels')
                    ->render(function (Course $course) {
                        if (!$course->has_level || !$course->level) {
                            return '-';
                        }
                        return $course->level . ' level' . ($course->level > 1 ? 's' : '');
                    })
                    ->sort(),

                TD::make('is_active', 'Status')
                    ->render(function (Course $course) {
                        return $course->is_active
                            ? '<span class="badge bg-success">Active</span>'
                            : '<span class="badge bg-secondary">Inactive</span>';
                    })
                    ->sort()
                    ->filter(TD::FILTER_SELECT, [
                        1 => 'Active',
                        0 => 'Inactive',
                    ]),

                TD::make('actions', 'Actions')
                    ->cantHide()
                    ->render(function (Course $course) {
                        return DropDown::make()
                            ->icon('bs.three-dots-vertical')
                            ->list([
                                Link::make('Edit')
                                    ->route('platform.courses.edit', $course)
                                    ->icon('bs.pencil'),

                                Button::make('Delete')
                                    ->icon('bs.trash3')
                                    ->confirm('Are you sure you want to delete this course?')
                                    ->method('remove')
                                    ->parameters(['id' => $course->id])
                                    ->class('btn btn-link dropdown-item text-danger')
                            ]);
                    })
                    ->width('60px'),
            ])
        ];
    }

    /**
     * Remove the course.
     */
    public function remove(Request $request)
    {
        $course = Course::findOrFail($request->get('id'));
        $course->delete();

        Toast::info('Course was removed successfully.');

        return redirect()->route('platform.courses');
    }
}
