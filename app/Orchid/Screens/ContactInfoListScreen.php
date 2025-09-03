<?php

namespace App\Orchid\Screens;

use App\Models\ContactInfo;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class ContactInfoListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     */
    public function query(): iterable
    {
        return [
            'contact_info' => ContactInfo::paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Contact Information';
    }

    /**
     * The screen's action buttons.
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Add Contact Info')
                ->icon('bs.plus-circle')
                ->route('platform.contact-info.edit')
        ];
    }

    /**
     * The screen's layout elements.
     */
    public function layout(): iterable
    {
        return [
            Layout::table('contact_info', [
                TD::make('key', 'Key')
                    ->render(function (ContactInfo $contactInfo) {
                        return ucfirst($contactInfo->key);
                    }),

                TD::make('value', 'Value')
                    ->render(function (ContactInfo $contactInfo) {
                        return strlen($contactInfo->value) > 50 ? 
                            substr($contactInfo->value, 0, 50) . '...' : 
                            $contactInfo->value;
                    }),

                TD::make('is_active', 'Status')
                    ->render(function (ContactInfo $contactInfo) {
                        return $contactInfo->is_active ? 
                            '<span class="badge bg-success">Active</span>' : 
                            '<span class="badge bg-secondary">Inactive</span>';
                    }),

                TD::make('actions', 'Actions')
                    ->cantHide()
                    ->render(function (ContactInfo $contactInfo) {
                        return Link::make('Edit')
                            ->route('platform.contact-info.edit', $contactInfo->id)
                            ->icon('bs.pencil');
                    }),
            ])
        ];
    }
}