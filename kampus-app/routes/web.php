<?php

use App\Http\Controllers\MatkulController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/matkul', [MatkulController::class, 'index'])->name('matkul.index');
Route::post('/matkul', [MatkulController::class, 'store'])->name('matkul.store');
Route::get('/matkul/{matkul}/edit', [MatkulController::class, 'edit'])->name('matkul.edit');
Route::put('/matkul/{matkul}', [MatkulController::class, 'update'])->name('matkul.update');
Route::delete('/matkul/{matkul}', [MatkulController::class, 'destroy'])->name('matkul.destroy');
