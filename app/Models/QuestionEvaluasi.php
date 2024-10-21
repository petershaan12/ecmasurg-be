<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class QuestionEvaluasi extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'evaluasi_id',
        'question'
    ];

    public function evaluasi()
    {
        return $this->belongsTo(Evaluasi::class, 'evaluasi_id');
    }

    public function answers()
    {
        return $this->hasMany(AnswerEvaluasi::class, 'question_evaluasi_id');
    }
}
