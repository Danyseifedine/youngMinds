<?php

namespace App\Orchid\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Field;

class PaymentFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @return string
     */
    public function name(): string
    {
        return 'Payment Filters';
    }

    /**
     * The array of matched parameters.
     *
     * @return array|null
     */
    public function parameters(): ?array
    {
        return ['filter'];
    }

    /**
     * Apply filter to the query.
     *
     * @param Builder $builder
     *
     * @return Builder
     */
    public function run(Builder $builder): Builder
    {
        $filters = $this->request->get('filter', []);

        // Filter by date range
        if (!empty($filters['start_date'])) {
            $builder->whereDate('payment_date', '>=', $filters['start_date']);
        }

        if (!empty($filters['end_date'])) {
            $builder->whereDate('payment_date', '<=', $filters['end_date']);
        }

        // Filter by student
        if (!empty($filters['user_id'])) {
            $builder->where('user_id', $filters['user_id']);
        }

        // Filter by course
        if (!empty($filters['course_id'])) {
            $builder->where('course_id', $filters['course_id']);
        }

        // Filter by status
        if (!empty($filters['payment_status'])) {
            $builder->where('payment_status', $filters['payment_status']);
        }

        return $builder;
    }

    /**
     * The displayable fields.
     *
     * @return Field[]
     */
    public function display(): iterable
    {
        return [];
    }
}