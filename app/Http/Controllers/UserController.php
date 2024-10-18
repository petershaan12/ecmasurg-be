<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function me(Request $request)
    {
        $user = Auth::user(); // Using the Auth facade

        if (!$user) {
            return response([
                'message' => 'User not authenticated',
            ], 401);
        }

        return response([
            'message' => 'Successfully retrieved user data',
            'data' => $user
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|email',
            'gender' => 'required|string|max:255',
            'biografi' => 'required',
            'phone_number' => 'required|string|max:100',
            'dateof_birth' => 'required|date',
            'facebook' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'photo_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->dateof_birth = $request->dateof_birth;
        $user->gender = $request->gender;
        $user->biografi = $request->biografi;
        $user->phone_number = $request->phone_number;
        $user->facebook = $request->facebook;
        $user->youtube = $request->youtube;
        $user->instagram = $request->instagram;

        if ($request->hasFile('photo_profile')) {
            if ($user->photo_profile) {
                Storage::disk('public')->delete('profiles/' . $user->photo_profile);
            }
            $file = $request->file('photo_profile');
            $newName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('profiles', $file, $newName);
            $user->photo_profile = $newName;
        }

        $user->save();

        return response()->json([
            'message' => 'User updated successfully',
            'data' => $user
        ]);
    }
}
