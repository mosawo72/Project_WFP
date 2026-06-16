<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'address',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // =========================================================================
    // RELATIONSHIPS
    // =========================================================================

    /**
     * Get the doctor profile associated with this user.
     */
    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    /**
     * Get the consultations where this user is the member.
     */
    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'member_id');
    }

    /**
     * Get the bookings where this user is the member.
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'member_id');
    }

    /**
     * Get the articles written by this user.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    /**
     * Get the consultation messages sent by this user.
     */
    public function sentMessages()
    {
        return $this->hasMany(ConsultationMessage::class, 'sender_id');
    }

    // =========================================================================
    // SCOPES
    // =========================================================================

    /**
     * Scope a query to only include admin users.
     */
    public function scopeAdmin($query)
    {
        return $query->where('role', 'admin');
    }

    /**
     * Scope a query to only include dokter users.
     */
    public function scopeDokter($query)
    {
        return $query->where('role', 'dokter');
    }

    /**
     * Scope a query to only include member users.
     */
    public function scopeMember($query)
    {
        return $query->where('role', 'member');
    }
}
