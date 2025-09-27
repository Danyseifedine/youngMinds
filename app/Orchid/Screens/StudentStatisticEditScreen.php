<?php

namespace App\Orchid\Screens;

use App\Models\StudentStatistic;
use App\Models\StudentStatisticCategory;
use App\Models\User;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class StudentStatisticEditScreen extends Screen
{
    /**
     * @var StudentStatistic
     */
    public $statistic;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(StudentStatistic $statistic): iterable
    {
        return [
            'statistic' => $statistic
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->statistic->exists ? 'Edit Student Statistic' : 'Create Student Statistic';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Assign percentage scores to students for specific categories';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save Statistic')
                ->icon('bs.check')
                ->method('save'),

            Button::make('Remove')
                ->icon('bs.trash3')
                ->confirm('Are you sure you want to delete this statistic?')
                ->method('remove')
                ->canSee($this->statistic->exists),
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
                Relation::make('statistic.user_id')
                    ->title('Student')
                    ->fromModel(User::class, 'name')
                    ->searchColumns('name', 'email')
                    ->chunk(20)
                    ->help('Search and select a student')
                    ->required(),

                Relation::make('statistic.category_id')
                    ->title('Statistic Category')
                    ->fromModel(StudentStatisticCategory::class, 'title')
                    ->searchColumns('title')
                    ->help('Select the type of statistic to record')
                    ->required(),

                Input::make('statistic.percentage')
                    ->title('Percentage')
                    ->type('number')
                    ->min(0)
                    ->max(100)
                    ->placeholder('Enter percentage (0-100)')
                    ->help('Enter the percentage score for this student in the selected category')
                    ->required(),
            ]),
        ];
    }

    /**
     * Save the statistic.
     */
    public function save(Request $request, StudentStatistic $statistic)
    {
        $request->validate([
            'statistic.user_id' => 'required|exists:users,id',
            'statistic.category_id' => 'required|exists:student_statistic_categories,id',
            'statistic.percentage' => 'required|integer|min:0|max:100',
        ]);

        $statisticData = $request->get('statistic');

        // Check for duplicate combination of user and category
        $existingStatistic = StudentStatistic::where('user_id', $statisticData['user_id'])
            ->where('category_id', $statisticData['category_id'])
            ->where('id', '!=', $statistic->id)
            ->first();

        if ($existingStatistic) {
            Toast::error('A statistic for this student and category already exists!');
            return back();
        }

        $statistic->fill($statisticData)->save();

        Toast::success('Student statistic has been saved successfully!');

        return redirect()->route('platform.student-statistics');
    }

    /**
     * Remove the statistic.
     */
    public function remove(StudentStatistic $statistic)
    {
        $statistic->delete();

        Toast::info('Student statistic was removed successfully.');

        return redirect()->route('platform.student-statistics');
    }
}