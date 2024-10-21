<?php

namespace App\Http\Controllers;

use App\Models\SubModul;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SubModulController extends Controller
{
    public function index($modul_id)
    {
        $submodul = SubModul::where('modul_id', $modul_id)->get();

        return response()->json([
            'message' => 'Success get data submodul',
            'data' => $submodul
        ]);
    }

    public function create(Request $request, $modul_id)
    {
        $request->validate([
            // 'modul_id' => 'required|exists:moduls,id',
            'type' => 'required|string',
            'judul' => 'required|string',
            'description' => 'required|string',
            'link_video' => 'nullable|string',
            'files.*' => 'nullable|file|mimes:ppt,pptx,pdf,doc,docx,jpg,jpeg,png|max:61440', // Validasi untuk banyak file dengan maksimal 60 MB
        ]);

        $filePaths = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $newName = $originalName . '.' . $extension;

                // Cek apakah file dengan nama yang sama sudah ada
                while (Storage::disk('public')->exists('files/' . $newName)) {
                    do {
                        $newName = $originalName . '_' . rand(100, 999) . '.' . $extension;
                    } while (Storage::disk('public')->exists('files/' . $newName));
                }

                // Simpan file dan tambahkan path ke array
                $path = Storage::disk('public')->putFileAs('files', $file, $newName);
                if ($path) {
                    $filePaths[] = $newName;
                } else {
                    // Tambahkan pesan debug jika penyimpanan file gagal
                    return response()->json(['message' => 'Failed to store file: ' . $newName], 500);
                }
            }
        }

        $subModul = SubModul::create([
            'modul_id' => $modul_id,
            'type' => $request->type,
            'judul' => $request->judul,
            'description' => $request->description,
            'link_video' => $request->link_video,
            'files' => json_encode($filePaths), // Konversi array ke JSON sebelum disimpan
        ]);

        return response()->json([
            'message' => 'SubModul created successfully',
            'data' => $subModul], 201);
    }

    // Update the specified resource in storage.
    public function update(Request $request,  $modul_id, $id)
    {
        $request->validate([
            // 'modul_id' => 'required|exists:moduls,id',
            'type' => 'required|string',
            'judul' => 'required|string',
            'description' => 'required|string',
            'link_video' => 'nullable|string',
            'files.*' => 'nullable|file|mimes:ppt,pptx,pdf,doc,docx,jpg,jpeg,png|max:61440', // Validasi untuk banyak file dengan maksimal 60 MB
        ]);

        $subModul = SubModul::findOrFail($id);

        $filePaths = json_decode($subModul->files, true) ?? [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $newName = $originalName . '.' . $extension;

                // Cek apakah file dengan nama yang sama sudah ada
                while (Storage::disk('public')->exists('files/' . $newName)) {
                    do {
                        $newName = $originalName . '_' . rand(100, 999) . '.' . $extension;
                    } while (Storage::disk('public')->exists('files/' . $newName));
                }


                Storage::disk('public')->putFileAs('files', $file, $newName);
                $filePaths[] = $newName;
            }
        }

        $subModul->update([
            'modul_id' =>$modul_id,
            'type' => $request->type,
            'judul' => $request->judul,
            'description' => $request->description,
            'link_video' => $request->link_video,
            'files' => json_encode($filePaths) // Menyimpan path file sebagai JSON
        ]);

        return response()->json([
            'message' => 'SubModul updated successfully',
            'data' => $subModul
        ]);
    }

    // Display the specified resource.
    public function show($modul_id, $submodul_id)
    {
        $subModul = SubModul::with(['modul' => function ($query) {
            $query->select('id', 'judul'); // Mengambil hanya atribut 'judul' dan 'id' untuk join
        }])->findOrFail($submodul_id);

        // Mengubah struktur data untuk hanya mengembalikan judul dari modul
        $subModul->modul_judul = $subModul->modul->judul;
        unset($subModul->modul);

        return response()->json([
            'message' => 'Success get data detail submodul',
            'data' => $subModul
        ], 200);
    }

    // Remove the specified resource from storage.
    public function delete($modul_id, $id)
    {
        $subModul = SubModul::findOrFail($id);

        $filePaths = json_decode($subModul->files, true) ?? [];
        foreach ($filePaths as $filePath) {
            Storage::disk('public')->delete('files/' . $filePath);
        }

        $subModul->delete();

        return response()->json(['message' => 'SubModul deleted successfully']);
    }
}
