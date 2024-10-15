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
        'link_video',
        'ppt',
        'pdf',
        'word'
    ];

    public function modul()
    {
        return $this->belongsTo(Modul::class);
    }
}
