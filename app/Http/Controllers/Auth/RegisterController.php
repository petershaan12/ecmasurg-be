<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users',
            'password' => 'required|min:8|max:255',
        ]);

        $dataUser = $request->all();
        $dataUser['password'] = Hash::make($request->password);


        $user = User::create($dataUser);

        return response()->json([
            'message' => 'Succes register user',
            'user' => $user

        ], 200);
    }
}
