<?php

namespace App\Orchid\Screens;

use App\Models\StudentStatisticCategory;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class StatisticCategoryListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'categories' => StudentStatisticCategory::latest()->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Statistic Categories';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Manage student statistic categories and chart types';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('New Category')
                ->icon('bs.plus')
                ->route('platform.statistic-categories.create'),
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
            Layout::table('categories', [
                TD::make('title', 'Title')
                    ->render(function (StudentStatisticCategory $category) {
                        $title = Link::make($category->title)
                            ->route('platform.statistic-categories.edit', $category);

                        if (!empty($category->title_ar)) {
                            $title .= '<br><small class="text-muted">AR: ' . $category->title_ar . '</small>';
                        }

                        return $title;
                    })
                    ->sort()
                    ->cantHide(),

                TD::make('chart_type', 'Chart Type')
                    ->render(function (StudentStatisticCategory $category) {
                        return $category->formatted_chart_type;
                    })
                    ->sort(),

                TD::make('is_active', 'Status')
                    ->render(function (StudentStatisticCategory $category) {
                        return $category->is_active
                            ? '<span class="badge bg-success">Active</span>'
                            : '<span class="badge bg-secondary">Inactive</span>';
                    })
                    ->sort(),

                TD::make('created_at', 'Created')
                    ->render(function (StudentStatisticCategory $category) {
                        return $category->created_at->format('M d, Y');
                    })
                    ->sort(),

                TD::make('actions', 'Actions')
                    ->render(function (StudentStatisticCategory $category) {
                        return DropDown::make()
                            ->icon('bs.three-dots-vertical')
                            ->list([
                                Link::make('Edit')
                                    ->icon('bs.pencil')
                                    ->route('platform.statistic-categories.edit', $category)
                                    ->class('dropdown-item'),

                                Button::make('Delete')
                                    ->icon('bs.trash3')
                                    ->confirm('Are you sure you want to delete this category?')
                                    ->method('remove')
                                    ->parameters(['id' => $category->id])
                                    ->class('btn btn-link dropdown-item text-danger')
                            ]);
                    })
                    ->width('60px'),
            ]),
        ];
    }

    /**
     * Remove the category.
     */
    public function remove(Request $request)
    {
        $category = StudentStatisticCategory::findOrFail($request->get('id'));
        $category->delete();

        Toast::info('Statistic category was removed successfully.');

        return redirect()->route('platform.statistic-categories');
    }
}