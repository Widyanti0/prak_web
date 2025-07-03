<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/services', [ServicesController::class, 'index']);
Route::get('/blog', [BlogController::class, 'index']);
Route::get('/biodata', [BiodataController::class, 'index']);

Route::prefix('mahasiswa')->name('mahasiswa.')->group(function() {
    Route::get('trash', [MahasiswaController::class, 'trash'])->name('trash');
    Route::put('{id}/restore', [MahasiswaController::class, 'restore'])->name('restore');
    Route::delete('{id}/force-delete', [MahasiswaController::class, 'forceDelete'])->name('forceDelete');
});
Route::resource('/mahasiswa', MahasiswaController::class);
