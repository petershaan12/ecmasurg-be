<?php

namespace App\Http\Controllers;

use App\Models\Evaluasi;
use Illuminate\Http\Request;

class EvaluasiController extends Controller
{
    public function index()
    {
        $evaluasi = Evaluasi::get();

        return response()->json([
            'message' => 'success',
            'data' => $evaluasi
        ]);
    }

    public function show($id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        return response()->json([
            'message' => 'success',
            'data' => $evaluasi
        ]);
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'modul_id' => 'required|exists:moduls,id',
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
            'time' => 'requied|date',
        ]);

        $evaluasi = Evaluasi::create($validatedData);

        return response()->json([
            'message' => 'success',
            'data' => $evaluasi
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        $validatedData = $request->validate([
            'modul_id' => 'required|exists:moduls,id',
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
            'time' => 'requied|date',
        ]);

        $evaluasi->update($validatedData);

        return response()->json([
            'message' => 'success',
            'data' => $evaluasi
        ], 200);
    }

    public function delete($id)
    {
        $evaluasi = Evaluasi::findOrFail($id);

        $evaluasi->delete();

        return response()->json([
            'message' => 'Evaluasi deleted successfully'
        ], 200);
    }

}
