<?php

namespace App\Http\Controllers;

use App\Models\SubModul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubModulController extends Controller
{
    public function read()
    {
        $submodul = SubModul::all();

        return response()->json([
            'message' => 'Success get data submodul',
            'data' => $submodul
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'modul_id' => 'required|exists:moduls,id',
            'type' => 'required|string',
            'judul' => 'required|string',
            'description' => 'required|string',
            'link_video' => 'nullable|string',
            'ppt' => 'nullable|file|mimes:ppt,pptx',
            'pdf' => 'nullable|file|mimes:pdf',
            'word' => 'nullable|file|mimes:doc,docx',
        ]);

        $pptPath = $request->file('ppt') ? $request->file('ppt')->store('files/ppt') : null;
        $pdfPath = $request->file('pdf') ? $request->file('pdf')->store('files/pdf') : null;
        $wordPath = $request->file('word') ? $request->file('word')->store('files/word') : null;

        $subModul = SubModul::create([
            'modul_id' => $request->modul_id,
            'type' => $request->type,
            'judul' => $request->judul,
            'description' => $request->description,
            'link_video' => $request->link_video,
            'ppt' => $pptPath,
            'pdf' => $pdfPath,
            'word' => $wordPath,
        ]);

        return response()->json([
            'message' => 'SubModul created successfully',
            'data' => $subModul], 201);
    }

    // Display the specified resource.
    public function show($id)
    {
        $subModul = SubModul::findOrFail($id);
        return response()->json([
            'message' => 'Success get data detail submodul',
            'data' => $subModul
        ], 200);
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        $request->validate([
            'modul_id' => 'required|exists:moduls,id',
            'type' => 'required|string',
            'judul' => 'required|string',
            'description' => 'required|string',
            'link_video' => 'nullable|string',
            'ppt' => 'nullable|file|mimes:ppt,pptx',
            'pdf' => 'nullable|file|mimes:pdf',
            'word' => 'nullable|file|mimes:doc,docx',
        ]);

        $subModul = SubModul::findOrFail($id);

        if ($request->hasFile('ppt')) {
            if ($subModul->ppt) {
                Storage::delete($subModul->ppt);
            }
            $subModul->ppt = $request->file('ppt')->store('files/ppt');
        }

        if ($request->hasFile('pdf')) {
            if ($subModul->pdf) {
                Storage::delete($subModul->pdf);
            }
            $subModul->pdf = $request->file('pdf')->store('files/pdf');
        }

        if ($request->hasFile('word')) {
            if ($subModul->word) {
                Storage::delete($subModul->word);
            }
            $subModul->word = $request->file('word')->store('files/word');
        }

        $subModul->update([
            'modul_id' => $request->modul_id,
            'type' => $request->type,
            'judul' => $request->judul,
            'description' => $request->description,
            'link_video' => $request->link_video,
        ]);

        return response()->json([
            'message' => 'SubModul updated successfully',
            'data' => $subModul]);
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $subModul = SubModul::findOrFail($id);

        if ($subModul->ppt) {
            Storage::delete($subModul->ppt);
        }

        if ($subModul->pdf) {
            Storage::delete($subModul->pdf);
        }

        if ($subModul->word) {
            Storage::delete($subModul->word);
        }

        $subModul->delete();

        return response()->json(['message' => 'SubModul deleted successfully']);
    }
}
