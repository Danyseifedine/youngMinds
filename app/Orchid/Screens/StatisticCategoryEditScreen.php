<?php

namespace App\Orchid\Screens;

use App\Models\StudentStatisticCategory;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class StatisticCategoryEditScreen extends Screen
{
    /**
     * @var StudentStatisticCategory
     */
    public $category;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(StudentStatisticCategory $category): iterable
    {
        return [
            'category' => $category
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->category->exists ? 'Edit Statistic Category' : 'Create Statistic Category';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Configure student statistic categories for analytics dashboard';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save Category')
                ->icon('bs.check')
                ->method('save'),

            Button::make('Remove')
                ->icon('bs.trash3')
                ->confirm('Are you sure you want to delete this category?')
                ->method('remove')
                ->canSee($this->category->exists),
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
                Input::make('category.title')
                    ->title('Category Title (English)')
                    ->placeholder('e.g., Calmness in Class, Participation Level')
                    ->help('Enter a descriptive title for this statistic category in English')
                    ->required(),

                Input::make('category.title_ar')
                    ->title('Category Title (Arabic)')
                    ->placeholder('مثال: الهدوء في الفصل، مستوى المشاركة')
                    ->help('Enter a descriptive title for this statistic category in Arabic'),

                Select::make('category.chart_type')
                    ->title('Chart Type')
                    ->options(StudentStatisticCategory::CHART_TYPES)
                    ->help('Choose how this statistic will be displayed')
                    ->required(),

                CheckBox::make('category.is_active')
                    ->title('Active')
                    ->placeholder('Enable this category')
                    ->help('Only active categories will be displayed in the dashboard')
                    ->sendTrueOrFalse(),
            ]),
        ];
    }

    /**
     * Save the category.
     */
    public function save(Request $request, StudentStatisticCategory $category)
    {
        $request->validate([
            'category.title' => 'required|string|max:255',
            'category.title_ar' => 'nullable|string|max:255',
            'category.chart_type' => 'required|in:' . implode(',', array_keys(StudentStatisticCategory::CHART_TYPES)),
            'category.is_active' => 'boolean',
        ]);

        $categoryData = $request->get('category');
        $categoryData['is_active'] = $categoryData['is_active'] ?? false;

        $category->fill($categoryData)->save();

        Toast::success('Statistic category has been saved successfully!');

        return redirect()->route('platform.statistic-categories');
    }

    /**
     * Remove the category.
     */
    public function remove(StudentStatisticCategory $category)
    {
        $category->delete();

        Toast::info('Statistic category was removed successfully.');

        return redirect()->route('platform.statistic-categories');
    }
}