<?php

namespace App\Models;

use App\Models\Property;
use App\Models\User_Document;
use App\Notifications\VerifyUserEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // In your User model
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'phone',
        'street_address',
        'country',
        'state',
        'city',
        'zipcode',
        'role_id',
        'verification_token',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'email_verified_at',
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

    public function documents()
    {
        return $this->hasMany(User_Document::class);
    }

    // Add the relationship
    public function properties()
    {
        return $this->hasMany(Property::class, 'landlord_id');
    }

    // Scope to get only landlords
    public function scopeLandlords($query)
    {
        return $query->where('role_id', 2);
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyUserEmail);
    }

}
