<?php

namespace App\Orchid\Screens;

use App\Models\Event;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class EventEditScreen extends Screen
{
    /**
     * @var Event
     */
    public $event;

    /**
     * Fetch data to be displayed on the screen.
     */
    public function query(Event $event): iterable
    {
        return [
            'event' => $event
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->event->exists ? 'Edit Event' : 'Create Event';
    }

    /**
     * The screen's action buttons.
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save Event')
                ->icon('bs.check-circle')
                ->method('save'),

            Button::make('Remove')
                ->icon('bs.trash3')
                ->method('remove')
                ->canSee($this->event->exists)
                ->confirm('Are you sure you want to delete this event?'),
        ];
    }

    /**
     * The screen's layout elements.
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('event.title')
                    ->title('Event Title')
                    ->placeholder('Arduino Basics Workshop')
                    ->help('Name of the event or workshop')
                    ->required(),

                TextArea::make('event.description')
                    ->title('Description')
                    ->placeholder('Learn the fundamentals of Arduino programming...')
                    ->rows(4)
                    ->required(),

                Select::make('event.type')
                    ->title('Event Type')
                    ->options([
                        'workshop' => 'Workshop',
                        'competition' => 'Competition',
                        'summer_camp' => 'Summer Camp',
                        'seminar' => 'Seminar',
                        'bootcamp' => 'Bootcamp',
                        'open_day' => 'Open Day',
                        'demo' => 'Demo Session'
                    ])
                    ->help('Select the type of event')
                    ->required(),

                DateTimer::make('event.start_date')
                    ->title('Start Date')
                    ->enableTime(false)
                    ->format('Y-m-d')
                    ->help('When the event begins')
                    ->required(),

                DateTimer::make('event.end_date')
                    ->title('End Date')
                    ->enableTime(false)
                    ->format('Y-m-d')
                    ->help('When the event ends (can be same as start date)')
                    ->required(),

                Input::make('event.location')
                    ->title('Location')
                    ->placeholder('YoungBotMinds Center, Main Hall')
                    ->help('Where the event will take place')
                    ->required(),

                Switcher::make('event.is_active')
                    ->title('Active')
                    ->help('Show this event on the website')
                    ->sendTrueOrFalse()
                    ->value(true),
            ])
        ];
    }

    /**
     * Save the event.
     */
    public function save(Request $request, Event $event)
    {
        $event->fill($request->get('event'))->save();

        Alert::info('Event was saved successfully.');

        return redirect()->route('platform.events');
    }

    /**
     * Remove the event.
     */
    public function remove(Event $event)
    {
        $event->delete();

        Alert::info('Event was removed successfully.');

        return redirect()->route('platform.events');
    }
}