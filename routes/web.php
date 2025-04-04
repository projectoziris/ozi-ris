<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModalityController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\PesakitController;
use App\Http\Controllers\AppointmentController;
use App\Helpers\SlotHelper;

// Dashboard
Route::get('/', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Auth
Auth::routes();

// 👑 Admin Sahaja
Route::middleware(['auth', 'role:admin'])->group(function () {
Route::resource('users', UserController::class);
Route::resource('modalities', ModalityController::class);
});

// 📦 Pemeriksaan – Admin + Radiographer
Route::middleware(['auth', 'role:admin|radiographer'])->group(function () {
Route::get('modalities/{modality}/examinations', [ExaminationController::class, 'index'])->name('modalities.examinations.index');
Route::get('modalities/{modality}/examinations/create', [ExaminationController::class, 'create'])->name('modalities.examinations.create');
Route::post('modalities/{modality}/examinations', [ExaminationController::class, 'store'])->name('modalities.examinations.store');
Route::get('examinations/{examination}/edit', [ExaminationController::class, 'edit'])->name('examinations.edit');
Route::put('examinations/{examination}', [ExaminationController::class, 'update'])->name('examinations.update');
Route::delete('examinations/{examination}', [ExaminationController::class, 'destroy'])->name('examinations.destroy');
});

// Pesakit (Contoh awal)
Route::resource('pesakit', PesakitController::class)->middleware('auth');
