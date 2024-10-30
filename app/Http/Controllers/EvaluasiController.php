<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    public function index($modul_id)
    {
        $evaluasi = Evaluasi::where('modul_id', $modul_id)->get(['id', 'title', 'time']);

        return response()->json([
            'message' => 'success',
            'data' => $evaluasi
        ]);
    }

    public function show($modul_id, $id)
    {
        $evaluasi = Evaluasi::with(['modul' => function($query) {
            $query->select('id', 'asignd_teacher', 'judul'); // Memilih kolom 'id' dan 'asignd_teacher'
        }])
        ->where('modul_id', $modul_id)
        ->where('id', $id)
        ->firstOrFail();

        return response()->json([
            'message' => 'success',
            'data' => $evaluasi
        ]);
    }

    public function create(Request $request, $modul_id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'question1' => 'required|string|max:255',
            'type1' => 'required|string|max:255',
            'question2' => 'nullable|string|max:255',
            'type2' => 'nullable|string|max:255',
            'question3' => 'nullable|string|max:255',
            'type3' => 'nullable|string|max:255',
            'question4' => 'nullable|string|max:255',
            'type4' => 'nullable|string|max:255',
            'question5' => 'nullable|string|max:255',
            'type5' => 'nullable|string|max:255',
            'deadline' => 'required|date',
            'time' => 'required|date',
        ]);

        $validatedData['modul_id'] = $modul_id;

        $evaluasi = Evaluasi::create($validatedData);

        return response()->json([
            'message' => 'success',
            'data' => $evaluasi
        ], 201);
    }

    public function update(Request $request, $modul_id, $id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'question1' => 'required|string|max:255',
            'type1' => 'required|string|max:255',
            'question2' => 'nullable|string|max:255',
            'type2' => 'nullable|string|max:255',
            'question3' => 'nullable|string|max:255',
            'type3' => 'nullable|string|max:255',
            'question4' => 'nullable|string|max:255',
            'type4' => 'nullable|string|max:255',
            'question5' => 'nullable|string|max:255',
            'type5' => 'nullable|string|max:255',
            'deadline' => 'required|date',
            'time' => 'required|date',
        ]);

        $validatedData['modul_id'] = $modul_id;

        $evaluasi->update($validatedData);

        return response()->json([
            'message' => 'success',
            'data' => $evaluasi
        ], 200);
    }

    public function delete($modul_id, $id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        $evaluasi->delete();

        return response()->json([
            'message' => 'Evaluasi deleted successfully'
        ], 200);
    }

}
