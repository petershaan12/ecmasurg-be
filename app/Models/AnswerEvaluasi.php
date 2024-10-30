<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class AnswerEvaluasi extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'evaluasi_id',
        'user_id',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'answer5',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function evaluasi()
    {
        return $this->belongsTo(Evaluasi::class, 'evaluasi_id');
    }
}
