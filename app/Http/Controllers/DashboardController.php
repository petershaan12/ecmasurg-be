<?php

namespace App\Http\Controllers;

use App\Models\Modul;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        
        //All Modul
        $countModul = Modul::count();

        $usersSortedByPoints = User::orderBy('point', 'desc')->get();
        $rank = $usersSortedByPoints->search(function ($userInList) use ($user) {
            return $userInList->id === $user->id;
        }) + 1;

        return response()->json([
            'modul' => $countModul,
            'rank' => $rank,
        ]);
    }
}
