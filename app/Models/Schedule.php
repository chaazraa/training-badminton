<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'time',
        'coach_id',
        'participant_id',
        'duration',
        'notes'
    ];

    /**
     * Relasi dengan model Coach.
     */
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    /**
     * Relasi dengan model Participant.
     */
    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }
}