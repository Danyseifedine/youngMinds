<?php

namespace App\Orchid\Screens;

use App\Models\StudentProfile;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentProfileListScreen extends Screen
{
    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'profiles' => StudentProfile::with('user')->latest()->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Student Profiles';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Manage student profiles with descriptions, pictures and videos';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('New Profile')
                ->icon('bs.plus')
                ->route('platform.student-profiles.create'),
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
            Layout::table('profiles', [
                TD::make('user.name', 'Student')
                    ->render(function (StudentProfile $profile) {
                        return Link::make($profile->user->name)
                            ->route('platform.student-profiles.edit', $profile);
                    })
                    ->sort()
                    ->cantHide(),

                TD::make('description', 'Description')
                    ->render(function (StudentProfile $profile) {
                        $desc = Str::limit($profile->description ?? 'No description', 50);
                        if (!empty($profile->description_ar)) {
                            $desc .= '<br><small class="text-muted">AR: ' . Str::limit($profile->description_ar, 50) . '</small>';
                        }
                        return $desc;
                    })
                    ->width('300px'),

                TD::make('attachments', 'Media')
                    ->render(function (StudentProfile $profile) {
                        $media = [];
                        if ($profile->profile_picture) {
                            $media[] = '<span class="badge bg-primary">Photo</span>';
                        }
                        if ($profile->profile_video) {
                            $media[] = '<span class="badge bg-success">Video</span>';
                        }
                        return implode(' ', $media) ?: '<span class="text-muted">No media</span>';
                    }),

                TD::make('created_at', 'Created')
                    ->render(function (StudentProfile $profile) {
                        return $profile->created_at->format('M d, Y');
                    })
                    ->sort(),

                TD::make('actions', 'Actions')
                    ->render(function (StudentProfile $profile) {
                        return DropDown::make()
                            ->icon('bs.three-dots-vertical')
                            ->list([
                                Link::make('Edit')
                                    ->icon('bs.pencil')
                                    ->route('platform.student-profiles.edit', $profile)
                                    ->class('dropdown-item'),

                                Button::make('Delete')
                                    ->icon('bs.trash3')
                                    ->confirm('Are you sure you want to delete this profile?')
                                    ->method('remove')
                                    ->parameters(['id' => $profile->id])
                                    ->class('btn btn-link dropdown-item text-danger')
                            ]);
                    })
                    ->width('60px'),
            ]),
        ];
    }

    /**
     * Remove the profile.
     */
    public function remove(Request $request)
    {
        $profile = StudentProfile::findOrFail($request->get('id'));
        $profile->delete();

        Toast::info('Student profile was removed successfully.');

        return redirect()->route('platform.student-profiles');
    }
}