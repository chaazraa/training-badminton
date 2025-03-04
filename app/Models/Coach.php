<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Coach extends Model
{
    use HasFactory;

    protected $table = 'coaches'; // Pastikan tabel ini benar

    protected $fillable = [
        'name',
        'photo',
        'birth_date',
        'birth_place',
        'phone',
        'email',
        'address',
        'experience',
    ];

    // Generate slug otomatis
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($coach) {
            $coach->slug = Str::slug($coach->name) . '-' . uniqid();
        });
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
