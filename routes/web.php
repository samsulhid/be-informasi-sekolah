<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfilAlumniController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UserController;


Route::middleware('auth')->group(function () {
    // Auth
    Route::post('/login', [UserController::class, 'login'])->name('login');

    // User
    Route::post('users/create', [UserController::class, 'store'])->name('users.store');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // News
    // Route::apiResource('news', NewsController::class);
    // Route::apiResource('prestasi', PrestasiController::class);
    // Route::apiResource('galleries', GalleryController::class);
    // Route::apiResource('profil-alumni', ProfilAlumniController::class);
    // Route::apiResource('testimoni', TestimoniController::class);
});
