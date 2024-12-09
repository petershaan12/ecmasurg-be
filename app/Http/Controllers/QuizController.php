<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
use App\Models\UserQuiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class QuizController extends Controller
{
    public function getQuestion($category)
    {
        $questions = Quiz::where('category', $category)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        return response()->json(['questions' => $questions]);
    }

    public function updatePointQuiz(Request $request)
    {
        $user = Auth::user(); // Using the Auth facade
        $points = $request->input('points'); 
        $questionIds = $request->input('questionIds'); 
        $answers = $request->input('answers');

        // Pastikan semua data valid
        if (!$questionIds || !$answers || count($questionIds) != 5 || count($answers) != 5) {
            return response()->json(['error' => 'Invalid data provided'], 400);
        }

        if ($user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'point' => DB::raw("point + $points"),
                    'last_quiz_taken_at' => Carbon::now()
                ]);

            UserQuiz::create([
                'user_id' => $user->id,
                'point' => $points, // Save the points awarded in this quiz attempt
                'question_id_1' => $questionIds[0],
                'question_id_2' => $questionIds[1],
                'question_id_3' => $questionIds[2],
                'question_id_4' => $questionIds[3],
                'question_id_5' => $questionIds[4],
                'answer_1' => $answers[0],
                'answer_2' => $answers[1],
                'answer_3' => $answers[2],
                'answer_4' => $answers[3],
                'answer_5' => $answers[4],
            ]);

            return response()->json(['message' => 'Points and Quiz updated successfully']);
        }

        return response()->json(['error' => 'User not authenticated'], 401);
    }

    public function startQuiz()
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $lastQuizTakenAt = $user->last_quiz_taken_at;

        if ($lastQuizTakenAt) {
            $lastQuizDate = Carbon::parse($lastQuizTakenAt);

            $quizAvailableAfter = $lastQuizDate->addDays(7);

            if (Carbon::now()->lessThanOrEqualTo($quizAvailableAfter)) {
                return response()->json([
                    'canStart' => false,
                    'last_quiz_taken_at' => $lastQuizTakenAt,
                    "last_quiz_taken_at_carbon" => Carbon::parse($lastQuizTakenAt),
                    "7Days" => $quizAvailableAfter,
                ], 200);
            }
        }
        return response()->json([
            'canStart' => true,
            'now' => Carbon::now(),
            'last_quiz_taken_at' => $lastQuizTakenAt
        ], 200);
    }
}
