<?php

declare(strict_types=1);

namespace App\Orchid;

use Orchid\Platform\Dashboard;
use Orchid\Platform\ItemPermission;
use Orchid\Platform\OrchidServiceProvider;
use Orchid\Screen\Actions\Menu;

class PlatformProvider extends OrchidServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param Dashboard $dashboard
     *
     * @return void
     */
    public function boot(Dashboard $dashboard): void
    {
        parent::boot($dashboard);

        // Set custom sidebar title
        $dashboard->configure([
            'name' => 'Young Bot Minds',
            'description' => 'Admin Dashboard'
        ]);
    }

    /**
     * Register the application menu.
     *
     * @return Menu[]
     */
    public function menu(): array
    {
        return [
            Menu::make('Social Links')
                ->icon('bs.share')
                ->route('platform.social-links')
                ->title('Website'),

            Menu::make('Website Content')
                ->icon('bs.file-earmark-text')
                ->route('platform.cms'),

            Menu::make('Contact Info')
                ->icon('bs.telephone')
                ->route('platform.contact-info'),

            Menu::make('Events & Workshops')
                ->icon('bs.calendar-event')
                ->route('platform.events'),

            Menu::make('Student Gallery')
                ->icon('bs.images')
                ->route('platform.student-images'),

            Menu::make('Courses')
                ->icon('bs.book')
                ->route('platform.courses')
                ->title('Registration'),

            Menu::make('Payments')
                ->icon('bs.credit-card')
                ->route('platform.payments'),

            Menu::make('Statistic Categories')
                ->icon('bs.pie-chart')
                ->route('platform.statistic-categories')
                ->title('Analytics'),

            Menu::make('Student Statistics')
                ->icon('bs.graph-up')
                ->route('platform.student-statistics'),

            Menu::make('Student Profiles')
                ->icon('bs.person-badge')
                ->route('platform.student-profiles'),

            Menu::make(__('Students'))
                ->icon('bs.people')
                ->route('platform.systems.users')
                ->permission('platform.systems.users')
                ->title(__('Access Controls')),

            Menu::make(__('Roles'))
                ->icon('bs.shield')
                ->route('platform.systems.roles')
                ->permission('platform.systems.roles'),
        ];
    }

    /**
     * Register permissions for the application.
     *
     * @return ItemPermission[]
     */
    public function permissions(): array
    {
        return [
            ItemPermission::group(__('System'))
                ->addPermission('platform.systems.roles', __('Roles'))
                ->addPermission('platform.systems.users', __('Users')),
        ];
    }
}
