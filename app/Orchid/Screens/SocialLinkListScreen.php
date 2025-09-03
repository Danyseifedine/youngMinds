<?php

namespace App\Orchid\Screens;

use App\Models\SocialLink;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class SocialLinkListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     */
    public function query(): iterable
    {
        return [
            'social_links' => SocialLink::ordered()->paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Social Links';
    }

    /**
     * The screen's action buttons.
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Add Social Link')
                ->icon('bs.plus-circle')
                ->route('platform.social-links.edit')
        ];
    }

    /**
     * The screen's layout elements.
     */
    public function layout(): iterable
    {
        return [
            Layout::table('social_links', [
                TD::make('icon', 'Icon')
                    ->render(function (SocialLink $socialLink) {
                        return "<i class='{$socialLink->icon}'></i> {$socialLink->icon}";
                    }),

                TD::make('url', 'URL')
                    ->render(function (SocialLink $socialLink) {
                        return "<a href='{$socialLink->url}' target='_blank'>{$socialLink->url}</a>";
                    }),

                TD::make('is_active', 'Status')
                    ->render(function (SocialLink $socialLink) {
                        return $socialLink->is_active ?
                            '<span class="badge bg-success">Active</span>' :
                            '<span class="badge bg-secondary">Inactive</span>';
                    }),

                TD::make('sort_order', 'Order'),

                TD::make('actions', 'Actions')
                    ->cantHide()
                    ->render(function (SocialLink $socialLink) {
                        return Link::make('Edit')
                            ->route('platform.social-links.edit', $socialLink->id)
                            ->icon('bs.pencil');
                    }),
            ])
        ];
    }
}
