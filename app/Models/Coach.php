<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    /** @use HasFactory<\Database\Factories\CoachFactory> */
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'phone',
        'email',
        'address',
        'date',
        'time',
    ];
}
