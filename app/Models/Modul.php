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

    public function submodules()
    {
        return $this->hasMany(SubModul::class, 'modul_id', 'id');
    }
    public function evaluasis()
    {
        return $this->hasMany(Evaluasi::class, 'modul_id', 'id');
    }
    public function getSubmoduleCountAttribute()
    {
        return $this->submodules()->count();
    }
}
