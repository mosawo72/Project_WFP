<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'specialization',
        'experience_years',
        'bio',
        'schedule',
    ];

    // =========================================================================
    // RELATIONSHIPS
    // =========================================================================

    /**
     * Get the user that owns this doctor profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the consultations for this doctor.
     */
    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    /**
     * Get the bookings for this doctor.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // =========================================================================
    // ACCESSORS
    // =========================================================================

    /**
     * Get the doctor's full display name with specialization.
     */
    protected function fullDisplayName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->user?->name . ' - ' . $this->specialization,
        );
    }
}
