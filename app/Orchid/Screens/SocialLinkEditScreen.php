<?php

namespace App\Orchid\Screens;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class SocialLinkEditScreen extends Screen
{
    /**
     * @var SocialLink
     */
    public $socialLink;

    /**
     * Fetch data to be displayed on the screen.
     */
    public function query(SocialLink $socialLink): iterable
    {
        return [
            'socialLink' => $socialLink
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->socialLink->exists ? 'Edit Social Link' : 'Create Social Link';
    }

    /**
     * The screen's action buttons.
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save Social Link')
                ->icon('bs.check-circle')
                ->method('save'),

            Button::make('Remove')
                ->icon('bs.trash3')
                ->method('remove')
                ->canSee($this->socialLink->exists)
                ->confirm('Are you sure you want to delete this social link?'),
        ];
    }

    /**
     * The screen's layout elements.
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Input::make('socialLink.icon')
                    ->title('Icon Class')
                    ->placeholder('fab fa-facebook-f')
                    ->help('FontAwesome icon class (e.g., fab fa-facebook-f, fab fa-twitter, fab fa-instagram)')
                    ->required(),

                Input::make('socialLink.url')
                    ->title('URL')
                    ->placeholder('https://facebook.com/yourpage')
                    ->type('url')
                    ->required(),

                Input::make('socialLink.sort_order')
                    ->title('Sort Order')
                    ->type('number')
                    ->value(0)
                    ->help('Lower numbers appear first'),

                Switcher::make('socialLink.is_active')
                    ->title('Active')
                    ->sendTrueOrFalse()
                    ->value(true),
            ])
        ];
    }

    /**
     * Save the social link.
     */
    public function save(Request $request, SocialLink $socialLink)
    {
        $socialLink->fill($request->get('socialLink'))->save();

        Alert::info('Social link was saved successfully.');

        return redirect()->route('platform.social-links');
    }

    /**
     * Remove the social link.
     */
    public function remove(SocialLink $socialLink)
    {
        $socialLink->delete();

        Alert::info('Social link was removed successfully.');

        return redirect()->route('platform.social-links');
    }
}