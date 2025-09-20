<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Student extends Model
{
    use AsSource, Filterable;

    protected $fillable = [
        'user_id',
        'child_age',
        'parent_phone',
        'preferred_time_slot',
        'status',
    ];

    protected $casts = [
        'child_age' => 'integer',
    ];

    /**
     * Get the user that owns the student.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'accepted');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }
}
