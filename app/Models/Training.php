<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    /** @use HasFactory<\Database\Factories\BadmintonTrainingFactory> */
    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */
    protected $fillable = [
        'date',         // Tanggal pelatihan
        'time',         // Waktu pelatihan
        'participant',  // Peserta pelatihan
        'instructor',   // Nama instruktur
        'duration',     // Durasi pelatihan
        'notes'         // Catatan tambahan
    ];
}
