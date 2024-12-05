<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserQuiz;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserQuizController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->has('all')) {
            $validated = $request->validate([
                'startDate' => 'required|date',
                'endDate' => 'required|date|after_or_equal:startDate',
            ]);
        }

        $user = Auth::user(); // Using the Auth facade

        if (!$user) {
            return response([
                'message' => 'User not authenticated',
            ], 401);
        }

        if ($request->has('all') && $request->all === 'all') {
            $users = User::select('name', 'email', 'point')->orderBy('point', 'desc')->get();

            if($users->isEmpty()) {
                return response()->json([
                    'message' => 'Error Fetch User All',
                    'data' => [],
                ], 200);
            }

            return response([
                'message' => 'Successfully retrieved user data',
                'data' => $users
            ], 200);
        } else {
            $userQuizzes = UserQuiz::with('user')  // Eager load the 'user' relationship
            ->whereBetween('created_at', [$validated['startDate'], $validated['endDate']])
                ->get();

            if ($userQuizzes->isEmpty()) {
                return response()->json([
                    'message' => 'No quizzes found for the given date range',
                    'data' => [],
                ], 200);
            }

            $userQuizzesWithNames = $userQuizzes->map(function ($quiz) {
                return [
                    'id' => $quiz->id,
                    'name' => $quiz->user->name,
                    'email' => $quiz->user->email,
                    'point' => $quiz->point,
                    'created_at' => $quiz->created_at,
                    'updated_at' => $quiz->updated_at,
                ];
            });

            return response([
                'message' => 'Successfully retrieved user data',
                'data' => $userQuizzesWithNames
            ], 200);
        }
    }

}
