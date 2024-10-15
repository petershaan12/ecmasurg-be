<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            // hapus token pengguna
            $user->tokens()->delete();

            return response([
                'message' => 'Logout successfull'
            ], 200);
        }else {
            // Tangani kasuks dimana pengguna tidak terautentikasi
            return response(['message' => 'User not authenticated'], 401);
        }
    }
}
