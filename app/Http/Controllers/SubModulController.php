<?php

namespace App\Http\Controllers;

use App\Models\SubModul;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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

        $pptPath = null;
        if ($request->hasFile('ppt')) {
            $file = $request->file('ppt');
            $newName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('submodul')->putFileAs('ppt', $file, $newName);
            $pptPath = $newName;
        }

        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $file = $request->file('pdf');
            $newName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('submodul')->putFileAs('pdf', $file, $newName);
            $pdfPath = $newName;
        }

        $wordPath = null;
        if ($request->hasFile('word')) {
            $file = $request->file('word');
            $newName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('submodul')->putFileAs('word', $file, $newName);
            $wordPath = $newName;
        }

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
                Storage::disk('submodul')->delete('ppt/' . $subModul->ppt);
            }
            $file = $request->file('ppt');
            $newName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('submodul')->putFileAs('ppt', $file, $newName);
            $subModul->ppt = $newName;
        }

        if ($request->hasFile('pdf')) {
            if ($subModul->pdf) {
                Storage::disk('submodul')->delete('pdf/' . $subModul->pdf);
            }
            $file = $request->file('pdf');
            $newName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('submodul')->putFileAs('pdf', $file, $newName);
            $subModul->pdf = $newName;
        }

        if ($request->hasFile('word')) {
            if ($subModul->word) {
                Storage::disk('submodul')->delete('word/' . $subModul->word);
            }
            $file = $request->file('word');
            $newName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            Storage::disk('submodul')->putFileAs('word', $file, $newName);
            $subModul->word = $newName;
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
    public function delete($id)
    {
        $subModul = SubModul::findOrFail($id);

        if ($subModul->ppt) {
            Storage::disk('submodul')->delete('ppt/' . $subModul->ppt);
        }

        if ($subModul->pdf) {
            Storage::disk('submodul')->delete('pdf/' . $subModul->pdf);
        }

        if ($subModul->word) {
            Storage::disk('submodul')->delete('word/' . $subModul->word);
        }

        $subModul->delete();

        return response()->json(['message' => 'SubModul deleted successfully']);
    }
}
