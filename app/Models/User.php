<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        // 'password',
        'role', // Menambahkan role
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Scope for checking if the user is a coach
     */
    public function isCoach()
    {
        return $this->role === 'coach';
    }

    /**
     * Scope for checking if the user is a participant
     */
    public function isParticipant()
    {
        return $this->role === 'participant';
    }
    // app/Models/User.php

    // Relasi ke model Coach
    public function coach()
    {
        return $this->hasOne(Coach::class);
    }

}
