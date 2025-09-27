<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class StudentStatistic extends Model
{
    use AsSource, Filterable;

    protected $fillable = [
        'user_id',
        'category_id',
        'percentage',
    ];

    protected $casts = [
        'percentage' => 'integer',
    ];

    /**
     * Get the user that owns the statistic.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category for this statistic.
     */
    public function category()
    {
        return $this->belongsTo(StudentStatisticCategory::class, 'category_id');
    }

    /**
     * Get formatted percentage.
     */
    public function getFormattedPercentageAttribute()
    {
        return $this->percentage . '%';
    }

    /**
     * Scope for a specific category.
     */
    public function scopeForCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Scope for a specific user.
     */
    public function scopeForUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
