<?php

namespace App\Orchid\Screens;

use App\Models\Event;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class EventListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     */
    public function query(): iterable
    {
        return [
            'events' => Event::latest('start_date')->paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Events & Workshops';
    }

    /**
     * The screen's action buttons.
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Add Event')
                ->icon('bs.plus-circle')
                ->route('platform.events.create')
        ];
    }

    /**
     * The screen's layout elements.
     */
    public function layout(): iterable
    {
        return [
            Layout::table('events', [
                TD::make('title', 'Title')
                    ->render(function (Event $event) {
                        return Link::make($event->title)
                            ->route('platform.events.edit', $event->id);
                    }),

                TD::make('type', 'Type')
                    ->render(function (Event $event) {
                        return '<span class="badge bg-info">' . ucfirst($event->type) . '</span>';
                    }),

                TD::make('age_range', 'Age Range')
                    ->render(function (Event $event) {
                        return '<span class="badge bg-secondary">' . $event->age_range . '</span>';
                    }),

                TD::make('start_date', 'Start Date')
                    ->render(function (Event $event) {
                        return $event->start_date->format('M d, Y');
                    }),

                TD::make('end_date', 'End Date')
                    ->render(function (Event $event) {
                        return $event->end_date ? $event->end_date->format('M d, Y') : '<span class="badge bg-success">Present</span>';
                    }),

                TD::make('location', 'Location')
                    ->render(function (Event $event) {
                        return strlen($event->location) > 30 ? 
                            substr($event->location, 0, 30) . '...' : 
                            $event->location;
                    }),

                TD::make('is_active', 'Status')
                    ->render(function (Event $event) {
                        $status = $event->is_active ? 'Active' : 'Inactive';
                        $class = $event->is_active ? 'bg-success' : 'bg-secondary';
                        
                        if ($event->is_active && $event->start_date >= today()) {
                            $status = 'Upcoming';
                            $class = 'bg-primary';
                        } elseif ($event->is_active && $event->end_date < today()) {
                            $status = 'Past';
                            $class = 'bg-warning';
                        }
                        
                        return '<span class="badge ' . $class . '">' . $status . '</span>';
                    }),

                TD::make('actions', 'Actions')
                    ->cantHide()
                    ->render(function (Event $event) {
                        return DropDown::make()
                            ->icon('bs.three-dots-vertical')
                            ->list([
                                Link::make('Edit')
                                    ->route('platform.events.edit', $event->id)
                                    ->icon('bs.pencil'),
                                
                                Button::make('Delete')
                                    ->icon('bs.trash3')
                                    ->confirm('Are you sure you want to delete this event?')
                                    ->method('remove')
                                    ->parameters(['id' => $event->id])
                                    ->class('btn btn-link dropdown-item text-danger')
                            ]);
                    })
                    ->width('60px'),
            ])
        ];
    }

    /**
     * Remove the event.
     */
    public function remove(Request $request)
    {
        $event = Event::findOrFail($request->get('id'));
        $event->delete();

        Alert::info('Event was removed successfully.');

        return redirect()->route('platform.events');
    }
}