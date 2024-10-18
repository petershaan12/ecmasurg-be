<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Modul extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'user_id',
        'asignd_teacher',
        'judul',
        'gambar_modul',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function assignedTeacher()
    {
        return $this->belongsTo(User::class, 'asignd_teacher', 'id');
    }

}
