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
            ->limit(10)
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

            // Cek apakah kuis terakhir diambil dalam minggu ini
            if ($lastQuizDate->greaterThanOrEqualTo(Carbon::now()->startOfWeek()) && $lastQuizDate->lessThanOrEqualTo(Carbon::now()->endOfWeek())) {
                return response()->json(['canStart' => false], 200);
            }
        }
        return response()->json(['canStart' => true], 200);
    }
}
