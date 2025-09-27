<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Orchid\Attachment\Attachable;

class StudentProfile extends Model
{
    use AsSource, Filterable, Attachable;

    protected $table = 'student_profile';

    protected $fillable = [
        'user_id',
        'description',
        'description_ar',
    ];

    /**
     * Get the user associated with this profile.
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Get localized description based on current locale.
     */
    public function getLocalizedDescriptionAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'ar' && !empty($this->description_ar)) {
            return $this->description_ar;
        }
        return $this->description;
    }

    /**
     * Get profile picture attachment.
     */
    public function getProfilePictureAttribute()
    {
        return $this->attachment('profile_picture')->first();
    }

    /**
     * Get profile video attachment.
     */
    public function getProfileVideoAttribute()
    {
        return $this->attachment('profile_video')->first();
    }
}
