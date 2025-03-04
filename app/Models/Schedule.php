<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal', 'waktu_mulai', 'waktu_selesai', 'user_id', 
        'coach_id', 'lokasi', 'keterangan'
    ];
    
    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}