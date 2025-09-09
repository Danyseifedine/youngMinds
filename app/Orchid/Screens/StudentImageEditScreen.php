<?php

namespace App\Orchid\Screens;

use App\Models\StudentImage;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class StudentImageEditScreen extends Screen
{
    /**
     * @var StudentImage
     */
    public $studentImage;

    /**
     * Fetch data to be displayed on the screen.
     */
    public function query(StudentImage $studentImage): iterable
    {
        $studentImage->load('attachment');

        return [
            'studentImage' => $studentImage
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return $this->studentImage->exists ? 'Edit Student Image' : 'Add Student Image';
    }

    /**
     * The screen's action buttons.
     */
    public function commandBar(): iterable
    {
        return [
            Button::make('Save Image')
                ->icon('bs.check-circle')
                ->method('save'),

            Button::make('Remove')
                ->icon('bs.trash3')
                ->method('remove')
                ->canSee($this->studentImage->exists)
                ->confirm('Are you sure you want to delete this image?'),
        ];
    }

    /**
     * The screen's layout elements.
     */
    public function layout(): iterable
    {
        return [
            Layout::rows([
                Picture::make('attachment.')
                    ->title('Student Image')
                    ->storage('public')
                    ->acceptedFiles('image/*')
                    ->help('Upload a high-quality image of students in action (optional - leave empty to keep current image)')
                    ->targetId()
                    ->required(false),

                Input::make('studentImage.title')
                    ->title('Title (Optional)')
                    ->placeholder('Arduino Workshop - Group Photo')
                    ->help('Give this image a descriptive title'),


                Input::make('studentImage.sort_order')
                    ->title('Sort Order')
                    ->type('number')
                    ->value($this->studentImage->sort_order ?? 0)
                    ->help('Lower numbers appear first in the gallery'),

                Switcher::make('studentImage.is_active')
                    ->title('Active')
                    ->help('Show this image in the gallery')
                    ->sendTrueOrFalse()
                    ->value($this->studentImage->is_active ?? true),
            ])
        ];
    }

    /**
     * Save the student image.
     */
    public function save(Request $request, StudentImage $studentImage)
    {
        $studentImage->fill($request->get('studentImage', []))->save();

        // Only sync attachments if new ones are provided and not empty
        $attachments = $request->input('attachment', []);

        // Filter out empty values and ensure we have valid attachment IDs
        $validAttachments = array_filter($attachments, function ($attachmentId) {
            return !empty($attachmentId) && is_numeric($attachmentId);
        });

        // Only sync if we have valid attachments
        if (!empty($validAttachments)) {
            $studentImage->attachment()->sync($validAttachments);
        }

        Alert::info('Student image was saved successfully.');

        return redirect()->route('platform.student-images');
    }

    /**
     * Remove the student image.
     */
    public function remove(StudentImage $studentImage)
    {
        $studentImage->delete();

        Alert::info('Student image was removed successfully.');

        return redirect()->route('platform.student-images');
    }
}
