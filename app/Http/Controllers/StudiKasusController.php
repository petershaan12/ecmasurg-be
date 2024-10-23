<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Comment;
use App\Models\StudiKasus;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudiKasusController extends Controller
{
    public function index()
    {

        $studiKasus = StudiKasus::with(['user' => function($query) {
            $query->select('id', 'name', 'roles', 'photo_profile');
        }])
        ->withCount('likes')
        ->paginate(10);

        return response()->json([
            'status' => 'success',
            'data' => $studiKasus,
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'photo_kasus' => 'nullable|image|mimes:jpg,jpeg,png|max:6144'
        ]);

        $photoKasusName = null;
        if ($request->hasFile('photo_kasus')) {
            $file = $request->file('photo_kasus');
            $newName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            // Simpan file
            Storage::disk('public')->putFileAs('studi_kasus', $file, $newName);
            $photoKasusName = $newName;
        }

        $studiKasus = StudiKasus::create([
            'user_id' => $request->user_id,
            'description' => $request->description,
            'photo_kasus' => $photoKasusName
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $studiKasus
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $studiKasus = StudiKasus::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'description' => 'required|string',
            'photo_kasus' => 'nullable|image|mimes:jpg,jpeg,png|max:6144'
        ]);

        if ($request->hasFile('photo_kasus')) {
            // Hapus file lama jika ada
            if ($studiKasus->photo_kasus) {
                Storage::disk('public')->delete('studi_kasus/' . $studiKasus->photo_kasus);
            }

            $file = $request->file('photo_kasus');
            $newName = Str::uuid() . '.' . $file->getClientOriginalExtension();

            // Simpan file
            $path = Storage::disk('public')->putFileAs('studi_kasus', $file, $newName);
            if ($path) {
                $studiKasus->photo_kasus = $newName;
            } else {
                return response()->json(['status' => 'error', 'message' => 'Failed to store file'], 500);
            }
        }

        $studiKasus->update([
            'user_id' => $request->user_id,
            'description' => $request->description,
            'photo_kasus' => $studiKasus->photo_kasus // Menggunakan nama file baru jika ada
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $studiKasus
        ], 200);
    }

    public function showStudiKasus($id)
    {
        $studiKasus = StudiKasus::with([
            'user' => function($query) {
                $query->select('id', 'name', 'roles', 'photo_profile');
            },
            'comments.user'
        ])
        ->withCount('likes')
        ->findOrFail($id);

        // Ambil komentar
        // $comments = Comment::where('studi_kasus_id', $id)->get();
        // Count like
        // $like = Like::where('studi_kasus_id', $id)->count();

        return response()->json([
            'status' => 'success',
            'data' => $studiKasus
        ]);
    }

    public function delete($id)
    {
        $studiKasus = StudiKasus::findOrFail($id);

        // Hapus file dari storage jika ada
        if ($studiKasus->photo_kasus) {
            Storage::disk('public')->delete('studi_kasus/' . $studiKasus->photo_kasus);
        }

        // Hapus data dari database
        $studiKasus->delete();

        return response()->json(['status' => 'success', 'message' => 'StudiKasus deleted successfully'], 200);
    }
}
