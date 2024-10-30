<?php

namespace App\Http\Controllers;

use App\Models\AnswerEvaluasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AnswerEvaluasiController extends Controller
{
    public function index($evaluasi_id)
    {
        $data = AnswerEvaluasi::where('evaluasi_id', $evaluasi_id)
            ->with(['user' => function($query) {
            $query->select('id', 'name');
            }])
            ->get();

        return response()->json([
            'message' => 'success',
            'data' => $data
        ]);
    }

    public function create(Request $request, $evaluasi_id)
    {
        $request->validate([
            'answer1' => 'required|string',
            'answer2' => 'nullable|string',
            'answer3' => 'nullable|string',
            'answer4' => 'nullable|string',
            'answer5' => 'nullable|string',
        ]);

        $id_user = Auth::id();

        $data = [
            'evaluasi_id' => $evaluasi_id,
            'user_id' => $id_user,
            'answer1' => $request->input('answer1'),
            'answer2' => $request->input('answer2'),
            'answer3' => $request->input('answer3'),
            'answer4' => $request->input('answer4'),
            'answer5' => $request->input('answer5'),
        ];


        $answerEvaluasi = AnswerEvaluasi::create($data);

        return response()->json([
            'message' => 'success',
            'data' => $answerEvaluasi
        ]);
    }

    public function delete($evaluasi_id, $id)
    {
        $data = AnswerEvaluasi::findOrfail($id);

        if ($data) {
            $data->delete();
            return response()->json([
                'message' => 'success',
                'data' => $data
            ]);
        } else {
            return response()->json([
                'message' => 'data not found',
            ], 404);
        }
    }
}
