<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\SubModulController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerifirytokenController;


Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);
Route::get('/logout', LogoutController::class)->middleware('auth:sanctum');
Route::get('/verifytoken', VerifirytokenController::class)->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function () {

    // profile
    Route::get('/profile/me', [UserController::class, 'me']);

    // modul
    Route::prefix('modul')->group(function() {
        // route for asign teacher
        Route::get('/asignteacher', [ModulController::class, 'asignteacher']);

        Route::get('/read', [ModulController::class, 'read']);
        Route::post('/create', [ModulController::class, 'create']);
        Route::patch('/update', [ModulController::class, 'update']);
        Route::delete('/delete', [ModulController::class, 'delete']);
    });

    // sub modul
    Route::prefix('submodul')->group(function() {
        Route::get('/read', [SubModulController::class, 'read']);
        Route::post('/create', [SubModulController::class, 'create']);
        Route::patch('/update', [SubModulController::class, 'update']);
        Route::delete('/delete', [SubModulController::class, 'delete']);
    });

});
