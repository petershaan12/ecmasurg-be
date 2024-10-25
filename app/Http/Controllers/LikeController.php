<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function index($studikasus_id)
    {
        $user = Auth::user();
        $like = Like::where(['studi_kasus_id' => $studikasus_id,  'user_id' => $user->id, ])->first();

        return response()->json([
            'status' => 'success',
            'data' => $like
        ]);
    }

    public function create($studikasus_id)
    {
        try {
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User not authenticated'
                ], 401);
            }

            $userid = $user->id;

            //cek jika sudah pernah like atau blm kalau pernah dia hapuus kalau ga dia buat
            $like = Like::where(['studi_kasus_id' => $studikasus_id,  'user_id' => $user->id, ])->first();
            if ($like) {
                $like->delete();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Like deleted'
                ], 200);
            }

            $like = Like::create([
                'studi_kasus_id' => $studikasus_id,
                'user_id' => $userid,
            ]);

            return response()->json([
                'status' => 'success',
                'data' => $like
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

}
