<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class AnswerEvaluasi extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'question_evaluasi_id',
        'answer',
        'is_correct'
    ];

    public function question()
    {
        return $this->belongsTo(QuestionEvaluasi::class, 'question_evaluasi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function evaluasi()
    {
        return $this->belongsTo(Evaluasi::class, 'evaluasi_id');
    }
}
