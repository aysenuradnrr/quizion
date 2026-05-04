<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\OgrenciController;
use App\Http\Controllers\OgretmenController;
use Illuminate\Support\Facades\Route;

/**
 * Rotalar
 * Konum: routes/web.php
 * Mevcut web.php dosyanızdaki rota bloklarını bu içerikle değiştirin.
 */

// ── Ana Sayfa ────────────────────────────────────────────
Route::get('/', function () {
    return view('welcome');
})->name('home');

// ── Auth Rotaları (giriş yapmamış kullanıcılar) ──────────
Route::middleware('guest')->group(function () {

    // Kayıt
    Route::get('/kayit',   [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/kayit',  [RegisteredUserController::class, 'store']);

    // Giriş
    Route::get('/giris',   [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/giris',  [AuthenticatedSessionController::class, 'store']);
});

// Çıkış (giriş yapmış kullanıcılar)
Route::post('/cikis', [AuthenticatedSessionController::class, 'destroy'])
     ->middleware('auth')
     ->name('logout');

// ── Öğrenci Paneli Rotaları ───────────────────────────────
// Middleware: auth + ogrenci (yalnızca öğrenciler)
Route::middleware(['auth', 'ogrenci'])->prefix('ogrenci-paneli')->name('ogrenci.')->group(function () {

    Route::get('/',           [OgrenciController::class, 'dashboard'])->name('dashboard');
    Route::get('/dersler',    [OgrenciController::class, 'dersler'])->name('dersler');
    Route::get('/sinavlarim', [OgrenciController::class, 'sinavlarim'])->name('sinavlarim');
    Route::get('/rozetlerim', [OgrenciController::class, 'rozetlerim'])->name('rozetlerim');
    Route::get('/basarim',    [OgrenciController::class, 'basarim'])->name('basarim');
    Route::get('/ayarlar',    [OgrenciController::class, 'ayarlar'])->name('ayarlar');

    // Online sınava katıl
    Route::post('/sinava-katil', [OgrenciController::class, 'sinavaKatil'])->name('sinava-katil');
});

// ── Öğretmen Paneli Rotaları ─────────────────────────────
// Middleware: auth + ogretmen (yalnızca öğretmenler)
Route::middleware(['auth', 'ogretmen'])->prefix('ogretmen-paneli')->name('ogretmen.')->group(function () {

    Route::get('/',                  [OgretmenController::class, 'dashboard'])->name('dashboard');

    // Soru bankası
    Route::get('/soru-bankasi',      [OgretmenController::class, 'soruBankasi'])->name('soru-bankasi');
    Route::post('/soru/ekle',        [OgretmenController::class, 'soruEkle'])->name('soru.ekle');
    Route::get('/soru/{id}/duzenle', [OgretmenController::class, 'soruDuzenle'])->name('soru.duzenle');
    Route::put('/soru/{id}',         [OgretmenController::class, 'soruGuncelle'])->name('soru.guncelle');
    Route::delete('/soru/{id}',      [OgretmenController::class, 'soruSil'])->name('soru.sil');

    // Sınavlar
    Route::get('/sinavlarim',        [OgretmenController::class, 'sinavlarim'])->name('sinavlarim');
    Route::post('/sinav/olustur',    [OgretmenController::class, 'sinavOlustur'])->name('sinav.olustur');
    Route::delete('/sinav/{id}',     [OgretmenController::class, 'sinavSil'])->name('sinav.sil');

    // Raporlar
    Route::get('/ogrenci-raporlari', [OgretmenController::class, 'ogrenciRaporlari'])->name('ogrenci-raporlari');
    Route::get('/sinif-listesi',     [OgretmenController::class, 'sinifListesi'])->name('sinif-listesi');
    Route::get('/analiz-odasi',      [OgretmenController::class, 'analizOdasi'])->name('analiz-odasi');

    // Diğer
    Route::get('/takvim',            [OgretmenController::class, 'takvim'])->name('takvim');
    Route::get('/rozetler',          [OgretmenController::class, 'rozetler'])->name('rozetler');
    Route::get('/ayarlar',           [OgretmenController::class, 'ayarlar'])->name('ayarlar');
});
