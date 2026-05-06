<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\OgrenciController;
use App\Http\Controllers\OgretmenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WelcomeController;

// Yorumlar
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');

// Ana sayfa
Route::get('/', [WelcomeController::class, 'index'])->name('home');

// Kayıt & Giriş
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('/login',    [AuthenticatedSessionController::class, 'store'])->name('login');
Route::post('/logout',   [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')->name('logout');

// Öğrenci paneli
Route::middleware(['auth', 'ogrenci'])->group(function () {
    Route::get('/ogrenci/dashboard', [OgrenciController::class, 'dashboard'])
        ->name('ogrenci.dashboard');
});

// Öğretmen paneli
Route::middleware(['auth', 'ogretmen'])->group(function () {
    Route::get('/ogretmen/dashboard', [OgretmenController::class, 'dashboard'])
        ->name('ogretmen.dashboard');
});

// Profil
Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});