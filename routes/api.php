<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Middleware\EnsureisTeacher;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\SubModulController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TaskCollectionController;
use App\Http\Controllers\Auth\VerifirytokenController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\StudiKasusController;

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::get('/logout', LogoutController::class)->middleware('auth:sanctum');
Route::get('/verifytoken', VerifirytokenController::class)->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {

    // profile
    Route::prefix('profile')->group(function () {
        Route::get('/', [UserController::class, 'index']);
        Route::patch('/update/{id}', [UserController::class, 'update']);
    });

    // modul
    Route::prefix('modul')->group(function () {
        // route for asign teacher
        Route::get('/asignteacher', [ModulController::class, 'asignteacher'])->middleware([EnsureisTeacher::class]);
        Route::get('/getmymodul/{id}', [ModulController::class, 'getmymodul'])->middleware([EnsureisTeacher::class]);
        Route::get('/isowner/{id}', [ModulController::class, 'isowner'])->middleware([EnsureisTeacher::class]);

        Route::get('/', [ModulController::class, 'index']);
        Route::post('/create', [ModulController::class, 'create'])->middleware([EnsureisTeacher::class]);
        Route::patch('/update/{id}', [ModulController::class, 'update'])->middleware([EnsureisTeacher::class]);
        Route::delete('/delete/{id}', [ModulController::class, 'delete'])->middleware([EnsureisTeacher::class]);
        Route::get('/show/{id}', [ModulController::class, 'showDetail']);

        // get judul modul

        // sub modul
        Route::prefix('{modul_id}')->group(function () {
            Route::get('/', [SubModulController::class, 'index']);
            Route::get('/show/{submodul_id}', [SubModulController::class, 'show']);
            Route::post('/create', [SubModulController::class, 'create'])->middleware([EnsureisTeacher::class]);
            Route::patch('/update/{submodul_id}', [SubModulController::class, 'update'])->middleware([EnsureisTeacher::class]);
            Route::delete('/delete/{submodul_id}', [SubModulController::class, 'delete'])->middleware([EnsureisTeacher::class]);

            // task collection
            Route::prefix('task/{submodul_id}')->group(function () {
                Route::get('/', [TaskCollectionController::class, 'index']);
                Route::get('/show/{user_id}', [TaskCollectionController::class, 'show']);
                Route::post('/create', [TaskCollectionController::class, 'create']);
                Route::patch('/update/{task_id}', [TaskCollectionController::class, 'update']);
                Route::delete('/delete/{task_id}', [TaskCollectionController::class, 'delete']);
            });
        });

        // evaluasi
        Route::prefix('evaluasi/{modul_id}')->group(function () {
            Route::get('/', [EvaluasiController::class, 'index']);
            Route::get('/show/{evaluasi_id}', [EvaluasiController::class, 'showEvaluasi']);
            Route::post('/create', [EvaluasiController::class, 'createEvaluasi'])->middleware([EnsureisTeacher::class]);
            Route::patch('/update/{evaluasi_id}', [EvaluasiController::class, 'updateEvaluasi'])->middleware([EnsureisTeacher::class]);
            Route::delete('/delete/{evaluasi_id}', [EvaluasiController::class, 'deleteEvaluasi'])->middleware([EnsureisTeacher::class]);
        });
    });


    // studi kasus
    Route::prefix('studikasus')->group(function () {
        Route::get('/', [StudiKasusController::class, 'index']);
        Route::get('/show/{id}', [StudiKasusController::class, 'showStudiKasus']);
        Route::post('/create', [StudiKasusController::class, 'create']);
        Route::patch('/update/{id}', [StudiKasusController::class, 'update']);
        Route::delete('/delete/{id}', [StudiKasusController::class, 'delete']);
    });

    // comment
    Route::prefix('comment/{studikasus_id}')->group(function () {
        Route::post('/', [CommentController::class, 'create']);
        Route::patch('/update/{comment_id}', [CommentController::class, 'update']);
        Route::delete('/delete/{comment_id}', [CommentController::class, 'delete']);
    });

    // like
    Route::prefix('like/{studikasus_id}')->group(function () {
        Route::get('/', [LikeController::class, 'index']);
        Route::post('/', [LikeController::class, 'create']);
    });
});
