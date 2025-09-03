<?php

namespace App\Orchid\Screens;

use App\Models\ContactInfo;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class ContactInfoEditScreen extends Screen
{
    /**
     * @var ContactInfo
     */
    public $contactInfo;

    /**
     * Fetch data to be displayed on the screen.
     */
    public function query(ContactInfo $contactInfo): iterable
    {
        return [
            'contactInfo' => $contactInfo
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->contactInfo->exists ? 'Edit Contact Info' : 'Create Contact Info';
    }

    /**
     * The screen's action buttons.
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save Contact Info')
                ->icon('bs.check-circle')
                ->method('save'),

            Button::make('Remove')
                ->icon('bs.trash3')
                ->method('remove')
                ->canSee($this->contactInfo->exists)
                ->confirm('Are you sure you want to delete this contact info?'),
        ];
    }

    /**
     * The screen's layout elements.
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('contactInfo.key')
                    ->title('Key')
                    ->placeholder('address, phone, email')
                    ->help('Contact info type (e.g., address, phone, email)')
                    ->required(),

                TextArea::make('contactInfo.value')
                    ->title('Value')
                    ->placeholder('Enter the contact information')
                    ->rows(3)
                    ->required(),

                Switcher::make('contactInfo.is_active')
                    ->title('Active')
                    ->sendTrueOrFalse()
                    ->value(true),
            ])
        ];
    }

    /**
     * Save the contact info.
     */
    public function save(Request $request, ContactInfo $contactInfo)
    {
        $contactInfo->fill($request->get('contactInfo'))->save();

        Alert::info('Contact info was saved successfully.');

        return redirect()->route('platform.contact-info');
    }

    /**
     * Remove the contact info.
     */
    public function remove(ContactInfo $contactInfo)
    {
        $contactInfo->delete();

        Alert::info('Contact info was removed successfully.');

        return redirect()->route('platform.contact-info');
    }
}