<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = ['question', 'options', 'correct_option', 'points', 'category'];

    protected $casts = [
        'options' => 'array', // Cast options to array
    ];
}
