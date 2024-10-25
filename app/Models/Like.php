<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Like extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'studi_kasus_id',
        'user_id',
    ];

    public function studi_kasus()
    {
        return $this->belongsTo(StudiKasus::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
