<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal', 'waktu_mulai', 'waktu_selesai', 'id_peserta', 
        'id_pelatih', 'lokasi', 'keterangan'
    ];
}
