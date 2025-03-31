<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\PesakitController;
use Illuminate\Support\Facades\Auth;

// Authentication
Auth::routes();

// Laman utama
Route::get('/', function () {
    return view('home'); // Tukar ke view yang kita buat tadi
})->middleware('auth')->name('home');

// Modality CRUD
Route::resource('modalities', ModalityController::class);

// Examination (nested under modality)
Route::get('modalities/{modality}/examinations', [ExaminationController::class, 'index'])->name('modalities.examinations.index');
Route::get('modalities/{modality}/examinations/create', [ExaminationController::class, 'create'])->name('modalities.examinations.create');
Route::post('modalities/{modality}/examinations', [ExaminationController::class, 'store'])->name('modalities.examinations.store');
Route::get('examinations/{examination}/edit', [ExaminationController::class, 'edit'])->name('examinations.edit');
Route::put('examinations/{examination}', [ExaminationController::class, 'update'])->name('examinations.update');
Route::delete('examinations/{examination}', [ExaminationController::class, 'destroy'])->name('examinations.destroy');

// Pesakit (Contoh awal)
Route::resource('pesakit', PesakitController::class)->middleware('auth');
