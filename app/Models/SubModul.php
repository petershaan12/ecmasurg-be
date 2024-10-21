<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubModul extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'modul_id',
        'type',
        'judul',
        'description',
        'deadline',
        'link_video',
        'files',
        'time',
    ];

    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}
