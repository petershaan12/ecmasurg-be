<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class TaskCollection extends Model
{
    use  HasApiTokens, HasFactory;

    protected $fillable = [
        'sub_modul_id',
        'user_id',
        'files'
    ];

    public function subModul()
    {
        return $this->belongsTo(SubModul::class, 'sub_modul_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
