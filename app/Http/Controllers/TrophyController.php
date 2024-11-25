<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TrophyController extends Controller
{
    public function index()
    {
        $users = User::select('name', 'email', 'point')->orderBy('point', 'desc')->get();
        return response()->json($users);
    }
}
