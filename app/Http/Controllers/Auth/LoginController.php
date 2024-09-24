<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:255',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){

            $user = Auth::user();

            // buat api token
            $token = $user->createToken('api-token')->plainTextToken;

            return response()->json([
                'message' => 'Loggin Succesfull',
                'token' => $token,
                'name' => $user->name,
                'email' => $user->email
            ], 200);
        }

            // Jika autentikasi gagal, kembalikan error
        return response()->json([
            'message' => 'Invalid credentials. Please check your email and password.'
        ], 401); // Status 401 Unauthorized
    }
}
