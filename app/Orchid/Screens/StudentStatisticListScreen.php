<?php

namespace App\Orchid\Screens;

use App\Models\StudentStatistic;
use App\Models\StudentStatisticCategory;
use App\Models\User;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Relation;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class StudentStatisticListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        $statisticsQuery = StudentStatistic::with(['user', 'category']);

        // Apply filters
        if (request('filter.user_id')) {
            $statisticsQuery->where('user_id', request('filter.user_id'));
        }

        if (request('filter.category_id')) {
            $statisticsQuery->where('category_id', request('filter.category_id'));
        }

        return [
            'statistics' => $statisticsQuery->latest()->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Student Statistics';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Manage individual student statistics and percentages';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Clear Filters')
                ->icon('bs.x-circle')
                ->method('clearFilters')
                ->class('btn btn-outline-secondary me-2')
                ->canSee(!empty(array_filter(request('filter', [])))),

            Link::make('New Statistic')
                ->icon('bs.plus')
                ->route('platform.student-statistics.create'),
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
                Relation::make('filter[user_id]')
                    ->title('Filter by Student')
                    ->fromModel(User::class, 'name')
                    ->searchColumns('name', 'email')
                    ->chunk(20)
                    ->value(request('filter.user_id'))
                    ->help('Search and select a student'),

                Relation::make('filter[category_id]')
                    ->title('Filter by Category')
                    ->fromModel(StudentStatisticCategory::class, 'title')
                    ->searchColumns('title')
                    ->value(request('filter.category_id'))
                    ->help('Select a statistic category'),

                Button::make('Apply Filters')
                    ->icon('bs.funnel')
                    ->method('applyFilters')
                    ->class('btn btn-primary me-2'),

                Button::make('Clear Filters')
                    ->icon('bs.x-circle')
                    ->method('clearFilters')
                    ->class('btn btn-secondary'),
            ])->title('Filters'),

            Layout::table('statistics', [
                TD::make('user.name', 'Student Name')
                    ->render(function (StudentStatistic $statistic) {
                        return Link::make($statistic->user->name)
                            ->route('platform.student-statistics.edit', $statistic);
                    })
                    ->sort()
                    ->cantHide(),

                TD::make('category.title', 'Category')
                    ->render(function (StudentStatistic $statistic) {
                        return $statistic->category->title;
                    })
                    ->sort(),

                TD::make('percentage', 'Percentage')
                    ->render(function (StudentStatistic $statistic) {
                        $color = $statistic->percentage >= 70 ? 'success' :
                                ($statistic->percentage >= 50 ? 'warning' : 'danger');
                        return '<span class="badge bg-' . $color . '">' . $statistic->formatted_percentage . '</span>';
                    })
                    ->sort(),

                TD::make('updated_at', 'Last Updated')
                    ->render(function (StudentStatistic $statistic) {
                        return $statistic->updated_at->format('M d, Y');
                    })
                    ->sort(),

                TD::make('actions', 'Actions')
                    ->render(function (StudentStatistic $statistic) {
                        return DropDown::make()
                            ->icon('bs.three-dots-vertical')
                            ->list([
                                Link::make('Edit')
                                    ->icon('bs.pencil')
                                    ->route('platform.student-statistics.edit', $statistic)
                                    ->class('dropdown-item'),

                                Button::make('Delete')
                                    ->icon('bs.trash3')
                                    ->confirm('Are you sure you want to delete this statistic?')
                                    ->method('remove')
                                    ->parameters(['id' => $statistic->id])
                                    ->class('btn btn-link dropdown-item text-danger')
                            ]);
                    })
                    ->width('60px'),
            ]),
        ];
    }

    /**
     * Apply filters.
     */
    public function applyFilters(Request $request)
    {
        $filters = array_filter($request->get('filter', []));

        Toast::success('Filters applied successfully!');

        return redirect()->route('platform.student-statistics', ['filter' => $filters]);
    }

    /**
     * Clear all filters.
     */
    public function clearFilters()
    {
        return redirect()->route('platform.student-statistics');
    }

    /**
     * Remove the statistic.
     */
    public function remove(Request $request)
    {
        $statistic = StudentStatistic::findOrFail($request->get('id'));
        $statistic->delete();

        Toast::info('Student statistic was removed successfully.');

        return redirect()->route('platform.student-statistics');
    }
}