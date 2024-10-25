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
        'question1',
        'type1',
        'question2',
        'type2',
        'question3',
        'type3',
        'question4',
        'type4',
        'question5',
        'type5',
        'deadline',
        'time'
    ];


}
