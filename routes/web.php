<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\GalleriController;
use App\Http\Controllers\ProfilAlumniController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\UserController;

// Auth
Route::post('/login', [UserController::class, 'login'])->name('login');

// Hanya Admin
Route::middleware(['role:admin '])->group(function () {
    // User management
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::post('users/create', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// Admin & Staff
Route::middleware(['role:admin,staff'])->group(function () {
    // Profil Alumni
    Route::get('profil-alumni', [ProfilAlumniController::class, 'index'])->name('profil-alumni.index');
    Route::post('profil-alumni/create', [ProfilAlumniController::class, 'store'])->name('profil-alumni.store');
    Route::get('profil-alumni/{id}', [ProfilAlumniController::class, 'show'])->name('profil-alumni.show');
    Route::put('profil-alumni/{id}', [ProfilAlumniController::class, 'update'])->name('profil-alumni.update');
    Route::delete('profil-alumni/{id}', [ProfilAlumniController::class, 'destroy'])->name('profil-alumni.destroy');

    // News
    Route::get('news', [NewsController::class, 'index'])->name('news.index');
    Route::post('news/create', [NewsController::class, 'store'])->name('news.store');
    Route::get('news/{id}', [NewsController::class, 'show'])->name('news.show');
    Route::put('news/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('news/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Prestasi
    Route::get('prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
    Route::post('prestasi/create', [PrestasiController::class, 'store'])->name('prestasi.store');
    Route::get('prestasi/{id}', [PrestasiController::class, 'show'])->name('prestasi.show');
    Route::put('prestasi/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');
    Route::delete('prestasi/{id}', [PrestasiController::class, 'destroy'])->name('prestasi.destroy');

    // Galleri
    Route::get('galleri', [GalleriController::class, 'index'])->name('galleri.index');
    Route::post('galleri/create', [GalleriController::class, 'store'])->name('galleri.store');
    Route::get('galleri/{id}', [GalleriController::class, 'show'])->name('galleri.show');
    Route::put('galleri/{id}', [GalleriController::class, 'update'])->name('galleri.update');
    Route::delete('galleri/{id}', [GalleriController::class, 'destroy'])->name('galleri.destroy');

    // Testimoni
    Route::get('testimoni', [TestimoniController::class, 'index'])->name('testimoni.index');
    Route::post('testimoni/create', [TestimoniController::class, 'store'])->name('testimoni.store');
    Route::get('testimoni/{id}', [TestimoniController::class, 'show'])->name('testimoni.show');
    Route::put('testimoni/{id}', [TestimoniController::class, 'update'])->name('testimoni.update');
    Route::delete('testimoni/{id}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');
});

