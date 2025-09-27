<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class StudentStatisticCategory extends Model
{
    use AsSource, Filterable;

    protected $table = 'student_statistic_categories';

    protected $fillable = [
        'title',
        'title_ar',
        'chart_type',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Available chart types.
     */
    const CHART_TYPES = [
        'pie' => 'Pie Chart',
        'donut' => 'Donut Chart',
        'circular' => 'Circular Chart',
    ];

    /**
     * Get the statistics for this category.
     */
    public function statistics()
    {
        return $this->hasMany(StudentStatistic::class, 'category_id');
    }

    /**
     * Scope for active categories only.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get formatted chart type.
     */
    public function getFormattedChartTypeAttribute()
    {
        return ucfirst($this->chart_type);
    }

    /**
     * Get localized title based on current locale.
     */
    public function getLocalizedTitleAttribute()
    {
        $locale = app()->getLocale();
        if ($locale === 'ar' && !empty($this->title_ar)) {
            return $this->title_ar;
        }
        return $this->title;
    }
}
