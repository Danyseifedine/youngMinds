<?php

declare(strict_types=1);

use App\Orchid\Screens\PlatformScreen;
use App\Orchid\Screens\Role\RoleEditScreen;
use App\Orchid\Screens\Role\RoleListScreen;
use App\Orchid\Screens\ContactInfoEditScreen;
use App\Orchid\Screens\ContactInfoListScreen;
use App\Orchid\Screens\CMSEditScreen;
use App\Orchid\Screens\EventEditScreen;
use App\Orchid\Screens\EventListScreen;
use App\Orchid\Screens\StudentImageEditScreen;
use App\Orchid\Screens\StudentImageListScreen;
use App\Orchid\Screens\SocialLinkEditScreen;
use App\Orchid\Screens\SocialLinkListScreen;
use App\Orchid\Screens\CourseEditScreen;
use App\Orchid\Screens\CourseListScreen;
use App\Orchid\Screens\PaymentEditScreen;
use App\Orchid\Screens\PaymentListScreen;
use App\Orchid\Screens\StatisticCategoryEditScreen;
use App\Orchid\Screens\StatisticCategoryListScreen;
use App\Orchid\Screens\StudentStatisticEditScreen;
use App\Orchid\Screens\StudentStatisticListScreen;
use App\Orchid\Screens\StudentProfileEditScreen;
use App\Orchid\Screens\StudentProfileListScreen;
use App\Orchid\Screens\RegistrationEditScreen;
use App\Orchid\Screens\RegistrationListScreen;
use App\Orchid\Screens\User\UserEditScreen;
use App\Orchid\Screens\User\UserListScreen;
use App\Orchid\Screens\User\UserProfileScreen;
use Illuminate\Support\Facades\Route;
use Tabuna\Breadcrumbs\Trail;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the need "dashboard" middleware group. Now create something great!
|
*/

// Main
Route::screen('/main', PlatformScreen::class)
    ->name('platform.main');

// Platform > Profile
Route::screen('profile', UserProfileScreen::class)
    ->name('platform.profile')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Profile'), route('platform.profile')));

// Platform > System > Users > User
Route::screen('users/{user}/edit', UserEditScreen::class)
    ->name('platform.systems.users.edit')
    ->breadcrumbs(fn(Trail $trail, $user) => $trail
        ->parent('platform.systems.users')
        ->push($user->name, route('platform.systems.users.edit', $user)));

// Platform > System > Users > Create
Route::screen('users/create', UserEditScreen::class)
    ->name('platform.systems.users.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.systems.users')
        ->push(__('Create'), route('platform.systems.users.create')));

// Platform > System > Users
Route::screen('users', UserListScreen::class)
    ->name('platform.systems.users')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Users'), route('platform.systems.users')));

// Platform > System > Roles > Role
Route::screen('roles/{role}/edit', RoleEditScreen::class)
    ->name('platform.systems.roles.edit')
    ->breadcrumbs(fn(Trail $trail, $role) => $trail
        ->parent('platform.systems.roles')
        ->push($role->name, route('platform.systems.roles.edit', $role)));

// Platform > System > Roles > Create
Route::screen('roles/create', RoleEditScreen::class)
    ->name('platform.systems.roles.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.systems.roles')
        ->push(__('Create'), route('platform.systems.roles.create')));

// Platform > System > Roles
Route::screen('roles', RoleListScreen::class)
    ->name('platform.systems.roles')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push(__('Roles'), route('platform.systems.roles')));

// Platform > Social Links > Social Link
Route::screen('social-links/{socialLink}/edit', SocialLinkEditScreen::class)
    ->name('platform.social-links.edit')
    ->breadcrumbs(fn(Trail $trail, $socialLink) => $trail
        ->parent('platform.social-links')
        ->push('Edit', route('platform.social-links.edit', $socialLink)));

// Platform > Social Links > Create
Route::screen('social-links/create', SocialLinkEditScreen::class)
    ->name('platform.social-links.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.social-links')
        ->push('Create', route('platform.social-links.create')));

// Platform > Social Links
Route::screen('social-links', SocialLinkListScreen::class)
    ->name('platform.social-links')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Social Links', route('platform.social-links')));

// Platform > Contact Info > Contact Info
Route::screen('contact-info/{contactInfo}/edit', ContactInfoEditScreen::class)
    ->name('platform.contact-info.edit')
    ->breadcrumbs(fn(Trail $trail, $contactInfo) => $trail
        ->parent('platform.contact-info')
        ->push('Edit', route('platform.contact-info.edit', $contactInfo)));

// Platform > Contact Info > Create
Route::screen('contact-info/create', ContactInfoEditScreen::class)
    ->name('platform.contact-info.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.contact-info')
        ->push('Create', route('platform.contact-info.create')));

// Platform > Website Content (CMS)
Route::screen('cms', CMSEditScreen::class)
    ->name('platform.cms')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Website Content', route('platform.cms')));

// Platform > Contact Info
Route::screen('contact-info', ContactInfoListScreen::class)
    ->name('platform.contact-info')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Contact Info', route('platform.contact-info')));

// Platform > Events > Event
Route::screen('events/{event}/edit', EventEditScreen::class)
    ->name('platform.events.edit')
    ->breadcrumbs(fn(Trail $trail, $event) => $trail
        ->parent('platform.events')
        ->push('Edit', route('platform.events.edit', $event)));

// Platform > Events > Create
Route::screen('events/create', EventEditScreen::class)
    ->name('platform.events.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.events')
        ->push('Create', route('platform.events.create')));

// Platform > Events
Route::screen('events', EventListScreen::class)
    ->name('platform.events')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Events & Workshops', route('platform.events')));

// Platform > Student Images > Student Image
Route::screen('student-images/{studentImage}/edit', StudentImageEditScreen::class)
    ->name('platform.student-images.edit')
    ->breadcrumbs(fn(Trail $trail, $studentImage) => $trail
        ->parent('platform.student-images')
        ->push('Edit', route('platform.student-images.edit', $studentImage)));

// Platform > Student Images > Create
Route::screen('student-images/create', StudentImageEditScreen::class)
    ->name('platform.student-images.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.student-images')
        ->push('Add Image', route('platform.student-images.create')));

// Platform > Student Images
Route::screen('student-images', StudentImageListScreen::class)
    ->name('platform.student-images')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Student Gallery', route('platform.student-images')));

// Platform > Courses > Course
Route::screen('courses/{course}/edit', CourseEditScreen::class)
    ->name('platform.courses.edit')
    ->breadcrumbs(fn(Trail $trail, $course) => $trail
        ->parent('platform.courses')
        ->push('Edit', route('platform.courses.edit', $course)));

// Platform > Courses > Create
Route::screen('courses/create', CourseEditScreen::class)
    ->name('platform.courses.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.courses')
        ->push('Create', route('platform.courses.create')));

// Platform > Courses
Route::screen('courses', CourseListScreen::class)
    ->name('platform.courses')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Courses', route('platform.courses')));

// Platform > Registrations > Registration
Route::screen('registrations/{registration}/edit', RegistrationEditScreen::class)
    ->name('platform.registrations.edit')
    ->breadcrumbs(fn(Trail $trail, $registration) => $trail
        ->parent('platform.registrations')
        ->push('Edit', route('platform.registrations.edit', $registration)));

// Platform > Registrations > Create
Route::screen('registrations/create', RegistrationEditScreen::class)
    ->name('platform.registrations.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.registrations')
        ->push('Create', route('platform.registrations.create')));

// Platform > Registrations
Route::screen('registrations', RegistrationListScreen::class)
    ->name('platform.registrations')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Registrations', route('platform.registrations')));

// Platform > Payments > Payment
Route::screen('payments/{payment}/edit', PaymentEditScreen::class)
    ->name('platform.payments.edit')
    ->breadcrumbs(fn(Trail $trail, $payment) => $trail
        ->parent('platform.payments')
        ->push('Edit', route('platform.payments.edit', $payment)));

// Platform > Payments > Create
Route::screen('payments/create', PaymentEditScreen::class)
    ->name('platform.payments.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.payments')
        ->push('Create', route('platform.payments.create')));

// Platform > Payments
Route::screen('payments', PaymentListScreen::class)
    ->name('platform.payments')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Payments', route('platform.payments')));

// Platform > Statistics > Statistic Categories > Category
Route::screen('statistic-categories/{category}/edit', StatisticCategoryEditScreen::class)
    ->name('platform.statistic-categories.edit')
    ->breadcrumbs(fn(Trail $trail, $category) => $trail
        ->parent('platform.statistic-categories')
        ->push('Edit', route('platform.statistic-categories.edit', $category)));

// Platform > Statistics > Statistic Categories > Create
Route::screen('statistic-categories/create', StatisticCategoryEditScreen::class)
    ->name('platform.statistic-categories.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.statistic-categories')
        ->push('Create', route('platform.statistic-categories.create')));

// Platform > Statistics > Statistic Categories
Route::screen('statistic-categories', StatisticCategoryListScreen::class)
    ->name('platform.statistic-categories')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Statistic Categories', route('platform.statistic-categories')));

// Platform > Statistics > Student Statistics > Statistic
Route::screen('student-statistics/{statistic}/edit', StudentStatisticEditScreen::class)
    ->name('platform.student-statistics.edit')
    ->breadcrumbs(fn(Trail $trail, $statistic) => $trail
        ->parent('platform.student-statistics')
        ->push('Edit', route('platform.student-statistics.edit', $statistic)));

// Platform > Statistics > Student Statistics > Create
Route::screen('student-statistics/create', StudentStatisticEditScreen::class)
    ->name('platform.student-statistics.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.student-statistics')
        ->push('Create', route('platform.student-statistics.create')));

// Platform > Statistics > Student Statistics
Route::screen('student-statistics', StudentStatisticListScreen::class)
    ->name('platform.student-statistics')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Student Statistics', route('platform.student-statistics')));

// Platform > Student Profiles > Student Profile
Route::screen('student-profiles/{profile}/edit', StudentProfileEditScreen::class)
    ->name('platform.student-profiles.edit')
    ->breadcrumbs(fn(Trail $trail, $profile) => $trail
        ->parent('platform.student-profiles')
        ->push('Edit', route('platform.student-profiles.edit', $profile)));

// Platform > Student Profiles > Create
Route::screen('student-profiles/create', StudentProfileEditScreen::class)
    ->name('platform.student-profiles.create')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.student-profiles')
        ->push('Create', route('platform.student-profiles.create')));

// Platform > Student Profiles
Route::screen('student-profiles', StudentProfileListScreen::class)
    ->name('platform.student-profiles')
    ->breadcrumbs(fn(Trail $trail) => $trail
        ->parent('platform.index')
        ->push('Student Profiles', route('platform.student-profiles')));
