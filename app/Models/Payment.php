<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use App\Orchid\Filters\PaymentFilter;

class Payment extends Model
{
    use AsSource, Filterable;

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        PaymentFilter::class,
    ];

    protected $fillable = [
        'user_id',
        'course_id',
        'level',
        'amount_paid',
        'payment_status',
        'owe_to_student',
        'owe_from_student',
        'payment_date',
        'full_payment_date',
        'refund_date',
        'notes',
    ];

    protected $casts = [
        'amount_paid' => 'decimal:2',
        'owe_to_student' => 'decimal:2',
        'owe_from_student' => 'decimal:2',
        'payment_date' => 'date',
        'full_payment_date' => 'date',
        'refund_date' => 'date',
    ];

    /**
     * Get the user that owns the payment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the course for this payment.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Get the student record for this payment.
     */
    public function student()
    {
        return $this->hasOneThrough(Student::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }

    /**
     * Get formatted payment status.
     */
    public function getFormattedStatusAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->payment_status));
    }

    /**
     * Get status badge color.
     */
    public function getStatusBadgeColorAttribute()
    {
        return match($this->payment_status) {
            'full' => 'success',
            'partial' => 'warning',
            'overpaid' => 'info',
            'refunded' => 'danger',
            default => 'secondary'
        };
    }

    /**
     * Get balance (what we owe vs what they owe).
     */
    public function getBalanceAttribute()
    {
        return $this->owe_to_student - $this->owe_from_student;
    }

    /**
     * Auto-calculate payment status based on owe fields.
     */
    public function getAutoStatusAttribute()
    {
        if ($this->owe_to_student > 0 && $this->owe_from_student == 0) {
            return 'overpaid';
        } elseif ($this->owe_from_student > 0 && $this->owe_to_student == 0) {
            return 'partial';
        } elseif ($this->owe_to_student == 0 && $this->owe_from_student == 0) {
            return 'full';
        } else {
            return 'partial';
        }
    }

    /**
     * Boot the model and auto-update status.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($payment) {
            $payment->payment_status = $payment->auto_status;

            if ($payment->payment_status === 'full' && !$payment->full_payment_date) {
                $payment->full_payment_date = $payment->payment_date;
            }
        });
    }
}
