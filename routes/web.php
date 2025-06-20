<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;

Route::get('/', function () {
    return view('home');
});

// Obat Routes
Route::resource('obat', ObatController::class);

// Pasien Routes
Route::resource('pasien', PasienController::class);

