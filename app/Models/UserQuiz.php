<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuiz extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users_quizzes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'point',
        'question_id_1',
        'question_id_2',
        'question_id_3',
        'question_id_4',
        'question_id_5',
        'answer_1',
        'answer_2',
        'answer_3',
        'answer_4',
        'answer_5',
    ];

    /**
     * Get the user that owns the quiz.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

        /**
     * Get the quiz for question 1.
     */
    public function quiz1()
    {
        return $this->belongsTo(Quiz::class, 'question_id_1');
    }

    /**
     * Get the quiz for question 2.
     */
    public function quiz2()
    {
        return $this->belongsTo(Quiz::class, 'question_id_2');
    }

    /**
     * Get the quiz for question 3.
     */
    public function quiz3()
    {
        return $this->belongsTo(Quiz::class, 'question_id_3');
    }

    /**
     * Get the quiz for question 4.
     */
    public function quiz4()
    {
        return $this->belongsTo(Quiz::class, 'question_id_4');
    }

    /**
     * Get the quiz for question 5.
     */
    public function quiz5()
    {
        return $this->belongsTo(Quiz::class, 'question_id_5');
    }

}
