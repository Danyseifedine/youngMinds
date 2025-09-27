<?php

namespace App\Orchid\Screens;

use App\Models\StudentProfile;
use App\Models\User;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\Upload;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Illuminate\Http\Request;

class StudentProfileEditScreen extends Screen
{
    /**
     * @var StudentProfile
     */
    public $profile;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(StudentProfile $profile): iterable
    {
        return [
            'profile' => $profile
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->profile->exists ? 'Edit Student Profile' : 'Create Student Profile';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Create and manage student profiles with descriptions, photos and videos';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save Profile')
                ->icon('bs.check')
                ->method('save'),

            Button::make('Remove')
                ->icon('bs.trash3')
                ->confirm('Are you sure you want to delete this profile?')
                ->method('remove')
                ->canSee($this->profile->exists),
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
                Select::make('profile.user_id')
                    ->title('Select Student')
                    ->fromQuery(User::whereNull('permissions'), 'name', 'id')
                    ->help('Choose the student for this profile')
                    ->required()
                    ->canSee(!$this->profile->exists),

                Input::make('profile.user.name')
                    ->title('Student Name')
                    ->readonly()
                    ->canSee($this->profile->exists),

                TextArea::make('profile.description')
                    ->title('Description (English)')
                    ->placeholder('Enter a detailed description about the student...')
                    ->help('Describe the student\'s achievements, personality, and progress in English')
                    ->rows(4),

                TextArea::make('profile.description_ar')
                    ->title('Description (Arabic)')
                    ->placeholder('أدخل وصفاً مفصلاً عن الطالب...')
                    ->help('اكتب وصفاً عن إنجازات الطالب وشخصيته وتقدمه باللغة العربية')
                    ->rows(4),

                Upload::make('profile.profile_picture')
                    ->title('Profile Picture')
                    ->acceptedFiles('image/*')
                    ->maxFiles(1)
                    ->help('Upload a profile picture for the student (JPG, PNG, GIF)'),

                Upload::make('profile.profile_video')
                    ->title('Profile Video')
                    ->acceptedFiles('video/*')
                    ->maxFiles(1)
                    ->help('Upload a video showcasing the student (MP4, AVI, MOV)'),
            ]),
        ];
    }

    /**
     * Save the profile.
     */
    public function save(Request $request, StudentProfile $profile)
    {
        $request->validate([
            'profile.user_id' => 'required|exists:users,id|unique:student_profile,user_id,' . $profile->id,
            'profile.description' => 'nullable|string',
            'profile.description_ar' => 'nullable|string',
        ]);

        $profileData = $request->get('profile');

        $profile->fill($profileData)->save();

        // Handle attachments
        $profile->attachment()->sync(
            $request->input('profile.profile_picture', [])
        );

        $profile->attachment()->sync(
            $request->input('profile.profile_video', [])
        );

        Toast::success('Student profile has been saved successfully!');

        return redirect()->route('platform.student-profiles');
    }

    /**
     * Remove the profile.
     */
    public function remove(StudentProfile $profile)
    {
        $profile->delete();

        Toast::info('Student profile was removed successfully.');

        return redirect()->route('platform.student-profiles');
    }
}