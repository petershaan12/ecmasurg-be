<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Modul;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ModulController extends Controller
{
    public function read()
    {
        $allModul = Modul::with(['user'])->get();

        return response([
            'message' => 'Succesfull get all modul',
            'data' => $allModul
        ], 200);
    }

    public function create(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'asignd_teacher' => 'required|exists:users,id',
            'judul' => 'required|max:255',
            'gambar_modul' => 'nullable|mimes:jpg,bmp,png|max:2048', // Batasan ukuran file 2MB
            'description' => 'required'
        ]);

        $gambarModulPath = null;
        if ($request->hasFile('gambar_modul')) {
            $file = $request->file('gambar_modul');
            $newName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('modul', $file, $newName);
            $gambarModulPath = $newName;
        }

        $modul = Modul::create([
            'user_id' => $request->user_id,
            'asignd_teacher' => $request->asignd_teacher,
            'judul' => $request->judul,
            'gambar_modul' => $gambarModulPath,
            'description' => $request->description,
        ]);

        return response([
            'message' => 'Modul created successfully',
            'data' => $modul
        ], 201);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'asignd_teacher' => 'required|exists:users,id',
            'judul' => 'required|string',
            'gambar_modul' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
        ]);

        $modul = Modul::findOrFail($id);

        if ($request->hasFile('gambar_modul')) {
            if ($modul->gambar_modul) {
                Storage::disk('public')->delete('modul/' . $modul->gambar_modul);
            }
            $file = $request->file('gambar_modul');
            $newName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('modul', $file, $newName);
            $modul->gambar_modul = $newName;
        }


        $modul->update([
            'user_id' => $request->user_id,
            'asignd_teacher' => $request->asignd_teacher,
            'judul' => $request->judul,
            'description' => $request->description,
            'gambar_modul' => $modul->gambar_modul,
        ]);

        return response()->json([
            'message' => 'Modul updated successfully',
            'data' => $modul
        ], 201);
    }

    public function delete($id)
    {
        $modul = Modul::findOrFail($id);

        if ($modul->gambar_modul) {
            Storage::disk('public')->delete('modul/' . $modul->gambar_modul);
        }

        $modul->delete();

        return response()->json(['message' => 'Modul deleted successfully']);
    }

    // Asign teacher
    public function asignteacher()
    {
        $teachers = User::where('roles', 'teacher')->get();

        return response([
            'message' => 'Succesfull get all teachers',
            'data' => $teachers
        ], 200);
    }
}
