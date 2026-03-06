<?php

use App\Http\Controllers\MatkulController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/matkul', [MatkulController::class, 'index'])->name('matkul.index');
Route::post('/matkul', [MatkulController::class, 'store'])->name('matkul.store');
