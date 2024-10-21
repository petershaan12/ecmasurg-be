<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Modul extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'asignd_teacher',
        'judul',
        'gambar_modul',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function asignd_teacher()
    {
        return $this->belongsTo(User::class, 'asignd_teacher', 'id');
    }

}
