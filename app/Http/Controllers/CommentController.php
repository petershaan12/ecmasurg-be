<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function create(Request $request, $studikasus_id)
    {

        $user = Auth::user();
        $request->validate([
            'comment' => 'required|string'
        ]);

        $comment = Comment::create([
            'studi_kasus_id' => $studikasus_id,
            'user_id' => $user->id,
            'comment' => $request->comment
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $comment
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        $request->validate([
            'studi_kasus_id' => 'required|exists:studi_kasuses,id',
            'user_id' => 'required|exists:users,id',
            'comment' => 'required|string'
        ]);

        $comment->studi_kasus_id = $request->studi_kasus_id;
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->save();

        return response()->json([
            'status' => 'success',
            'data' => $comment
        ]);
    }

    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Comment deleted'
        ]);
    }
}
