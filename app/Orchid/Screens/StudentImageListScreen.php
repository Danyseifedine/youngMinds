<?php

namespace App\Orchid\Screens;

use App\Models\StudentImage;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;

class StudentImageListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     */
    public function query(): iterable
    {
        return [
            'student_images' => StudentImage::ordered()->paginate()
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Student Gallery';
    }

    /**
     * The screen's action buttons.
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Add Student Image')
                ->icon('bs.plus-circle')
                ->route('platform.student-images.create')
        ];
    }

    /**
     * The screen's layout elements.
     */
    public function layout(): iterable
    {
        return [
            Layout::table('student_images', [
                TD::make('image', 'Image')
                    ->render(function (StudentImage $studentImage) {
                        $attachment = $studentImage->attachment()->first();
                        if ($attachment) {
                            return "<img src='{$attachment->url()}' alt='Student Image' style='width: 80px; height: 60px; object-fit: cover; border-radius: 8px;' onerror=\"this.style.display='none'; this.nextSibling.style.display='inline';\">";
                        }
                        return '<span class="badge bg-secondary">No Image</span>';
                    })
                    ->cantHide()
                    ->width('120px'),

                TD::make('title', 'Title')
                    ->render(function (StudentImage $studentImage) {
                        return Link::make($studentImage->title ?: 'Untitled')
                            ->route('platform.student-images.edit', $studentImage->id);
                    }),

                TD::make('description', 'Description')
                    ->render(function (StudentImage $studentImage) {
                        if (!$studentImage->description) {
                            return '<span class="text-muted">No description</span>';
                        }
                        return strlen($studentImage->description) > 50 ? 
                            substr($studentImage->description, 0, 50) . '...' : 
                            $studentImage->description;
                    }),

                TD::make('sort_order', 'Order')
                    ->width('80px'),

                TD::make('is_active', 'Status')
                    ->render(function (StudentImage $studentImage) {
                        return $studentImage->is_active ? 
                            '<span class="badge bg-success">Active</span>' : 
                            '<span class="badge bg-secondary">Inactive</span>';
                    })
                    ->width('100px'),

                TD::make('actions', 'Actions')
                    ->cantHide()
                    ->render(function (StudentImage $studentImage) {
                        return DropDown::make()
                            ->icon('bs.three-dots-vertical')
                            ->list([
                                Link::make('Edit')
                                    ->route('platform.student-images.edit', $studentImage->id)
                                    ->icon('bs.pencil'),
                                
                                Button::make('Delete')
                                    ->icon('bs.trash3')
                                    ->confirm('Are you sure you want to delete this image?')
                                    ->method('remove')
                                    ->parameters(['id' => $studentImage->id])
                                    ->class('btn btn-link dropdown-item text-danger')
                            ]);
                    })
                    ->width('60px'),
            ])
        ];
    }

    /**
     * Remove the student image.
     */
    public function remove(Request $request)
    {
        $studentImage = StudentImage::findOrFail($request->get('id'));
        $studentImage->delete();

        Alert::info('Student image was removed successfully.');

        return redirect()->route('platform.student-images');
    }
}