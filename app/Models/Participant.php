<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'phone', 'email', 'gender', 'address', 'image',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
