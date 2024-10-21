<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class StudiKasus extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'user_id',
        'description',
        'photo_kasus',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
