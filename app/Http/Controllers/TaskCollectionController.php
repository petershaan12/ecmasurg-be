<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskCollection;
use Illuminate\Support\Facades\Storage;

class TaskCollectionController extends Controller
{
    public function index($modul_id, $submodul_id)
    {
        $taskCollection = TaskCollection::where('sub_modul_id', $submodul_id)
                                        ->with('user:id,name') // Eager load user with only id and name
                                        ->get();

        return response()->json([
            'message' => 'Success get data task collection',
            'data' => $taskCollection
        ]);
    }
    public function show($modul_id, $submodul_id, $user_id)
    {
        $taskCollection = TaskCollection::where('sub_modul_id', $submodul_id)
                                        ->where('user_id', $user_id)
                                        ->get();

        return response()->json([
            'message' => 'Success get data task collection',
            'data' => $taskCollection
        ]);
    }

    public function create(Request $request, $modul_id, $sub_bmodul_id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'files' => 'required|array|max:5', // Validasi untuk maksimal 5 file
            'files.*' => 'required|file|mimes:ppt,pptx,pdf,doc,docx,jpg,jpeg,png|max:61440', // Validasi untuk banyak file dengan maksimal 60
        ]);

        $filePaths = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $newName = $originalName . '.' . $extension;

                // Cek apakah file dengan nama yang sama sudah ada
                while (Storage::disk('public')->exists('task_collection/' . $newName)) {
                    do {
                        $newName = $originalName . '_' . rand(100, 999) . '.' . $extension;
                    } while (Storage::disk('public')->exists('task_collection/' . $newName));
                }

                // Simpan file dan tambahkan path ke array
                $path = Storage::disk('public')->putFileAs('task_collection', $file, $newName);
                if ($path) {
                    $filePaths[] = $newName;
                } else {
                    // Tambahkan pesan debug jika penyimpanan file gagal
                    return response()->json(['message' => 'Failed to store file: ' . $newName], 500);
                }
            }
        }

        $taskCollection = TaskCollection::create([
            'sub_modul_id' => $sub_bmodul_id,
            'user_id' => $request->user_id,
            'files' => json_encode($filePaths), // Simpan array file paths sebagai
            'submited' => true,
        ]);

        return response()->json([
            'message' => 'Success create task collection',
            'data' => $taskCollection
        ], 201);
    }

    public function update(Request $request, $submodul_id, $user_id, $task_id)
    {
        $taskCollection = TaskCollection::find($task_id);

        if (!$taskCollection) {
            return response()->json(['message' => 'Task collection not found'], 404);
        }

        $request->validate([
            'files' => 'required|array|max:5', // Validasi untuk maksimal 5 file
            'files.*' => 'required|file|mimes:ppt,pptx,pdf,doc,docx,jpg,jpeg,png|max:61440', // Validasi untuk banyak file dengan maksimal 60 MB
        ]);

        // Hapus file lama dari storage
        $oldFilePaths = json_decode($taskCollection->files, true) ?? [];
        foreach ($oldFilePaths as $oldFilePath) {
            Storage::disk('public')->delete('task_collection/' . $oldFilePath);
        }

        $filePaths = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $file->getClientOriginalExtension();
                $newName = $originalName . '.' . $extension;

                // Cek apakah file dengan nama yang sama sudah ada
                while (Storage::disk('public')->exists('task_collection/' . $newName)) {
                    do {
                        $newName = $originalName . '_' . rand(100, 999) . '.' . $extension;
                    } while (Storage::disk('public')->exists('task_collection/' . $newName));
                }

                // Simpan file dan tambahkan path ke array
                $path = Storage::disk('public')->putFileAs('task_collection', $file, $newName);
                if ($path) {
                    $filePaths[] = $newName;
                } else {
                    // Tambahkan pesan debug jika penyimpanan file gagal
                    return response()->json(['message' => 'Failed to store file: ' . $newName], 500);
                }
            }
        }

        $taskCollection->update([
            'files' => json_encode($filePaths), // Simpan array file paths sebagai JSON
        ]);

        return response()->json([
            'message' => 'Success update task collection',
            'data' => $taskCollection
        ], 200);
    }

    public function delete($modul_id, $sub_bmodul_id, $task_id)
    {
        $taskCollection = TaskCollection::findOrFail($task_id);

        // Decode JSON file paths
        $filePaths = json_decode($taskCollection->files, true) ?? [];

        // Delete each file from storage
        foreach ($filePaths as $filePath) {
            Storage::disk('public')->delete('task_collection/' . $filePath);
        }

        // Delete the task collection record
        $taskCollection->delete();

        return response()->json(['message' => 'Task collection deleted successfully']);
    }

    public function grade(Request $request, $task_id)
    {
        $request->validate([
            'grade' => 'required|integer|min:0|max:100',
            'feedback' => 'nullable|string',
        ]);

        $taskCollection = TaskCollection::find($task_id);

        if (!$taskCollection) {
            return response()->json(['message' => 'Task collection not found'], 404);
        }

        $taskCollection->update([
            'grade' => $request->grade,
            'feedback' => $request->feedback,
        ]);

        return response()->json([
            'message' => 'Task collection graded successfully',
            'data' => $taskCollection
        ]);
    }

    public function submited(Request $request, $modul_id , $submodul_id, $task_id)
    {
        $request->validate([
            'subbmited' => 'required|boolean',
        ]);

        $taskCollection = TaskCollection::find($task_id);

        if (!$taskCollection) {
            return response()->json(['message' => 'Task collection not found'], 404);
        }

        $taskCollection->update([
            'subbmited' => $request->subbmited,
        ]);

        return response()->json([
            'message' => 'Task collection subbmited status updated successfully',
            'data' => $taskCollection
        ]);
    }
}
