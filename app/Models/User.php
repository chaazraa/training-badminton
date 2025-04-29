<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'image',
        'role',
        'email',
        'gender',
        'address',
        'birth_date',
        'birth_place',
        'experience',
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
            'birth_date' => 'date',
        ];
    }

    
public function isAdmin(): bool
{
    return $this->role === 'admin';
}   

public function isUser(): bool
{
    return $this->role === 'user';
}
public function coaches()
    {
        return $this->hasMany(Coach::class);
    }
public function participants()
    {
        return $this->hasMany(Participant::class);
    }
public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
