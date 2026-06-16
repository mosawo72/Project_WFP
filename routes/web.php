<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterDataController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Authentication routes (login, register, logout, password reset)
Auth::routes();

// Redirect /home to dashboard
Route::get('/home', function () {
    return redirect()->route('dashboard');
})->name('home');

// All routes below require authentication
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/', [MasterDataController::class, 'dashboard'])->name('dashboard');

    // Resource routes for all master data (CRUD)
    Route::resource('users', UserController::class);
    Route::resource('doctors', DoctorController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('consultations', ConsultationController::class);
    Route::resource('bookings', BookingController::class);
});

