<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\User;
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
        $points = $request->input('points'); // Mendapatkan poin yang dikirimkan dari request

        if ($user) {
            DB::table('users')
                ->where('id', $user->id)
                ->update([
                    'point' => DB::raw("point + $points"),
                    'last_quiz_taken_at' => Carbon::now()
                ]);

            return response()->json(['message' => 'Points updated successfully']);
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
