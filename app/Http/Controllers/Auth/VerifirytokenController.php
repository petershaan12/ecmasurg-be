<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class VerifirytokenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $token = $request->bearerToken();

                // Check if the token is valid
                if (!$token || !Auth::guard('sanctum')->check()) {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }

                // If valid, return user details or a success message
                return response()->json([
                    'message' => 'Token is valid', 'user' => Auth::user()
                ], 200);
    }
}
