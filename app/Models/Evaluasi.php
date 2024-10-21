<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Symfony\Component\Console\Question\Question;

class Evaluasi extends Model
{
    use HasApiTokens, HasFactory;

    protected $fillable = [
        'modul_id',
        'title',
        'description'
    ];

    public function questions()
    {
        return $this->hasMany(QuestionEvaluasi::class, 'evaluasi_id');
    }
}
