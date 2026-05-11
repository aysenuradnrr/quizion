<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\OgrenciController;
use App\Http\Controllers\OgretmenController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdminController;
Route::post('/review', [ReviewController::class, 'store'])->name('review.store');

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::post('/register', [RegisteredUserController::class, 'store'])->name('register');
Route::post('/login',    [AuthenticatedSessionController::class, 'store'])->name('login');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// ── ÖĞRENCİ ROUTE'LARI ──────────────────────────────────
Route::middleware(['auth', 'ogrenci'])->group(function () {

    Route::get('/ogrenci/dashboard', [OgrenciController::class, 'dashboard'])
        ->name('ogrenci.dashboard');

    Route::get('/ogrenci/test-baslat', [OgrenciController::class, 'testBaslat'])
        ->name('ogrenci.test.baslat');

    Route::post('/ogrenci/test-olustur', [OgrenciController::class, 'testOlustur'])
        ->name('ogrenci.test.olustur');

    Route::post('/ogrenci/test-sonuc', [OgrenciController::class, 'testSonuc'])
        ->name('ogrenci.test.sonuc');

    Route::get('/ogrenci/yaklasan-sinavlar', [OgrenciController::class, 'yaklasanSinavlar'])
        ->name('ogrenci.yaklasan.sinavlar');

    Route::get('/ogrenci/bildirimler', [OgrenciController::class, 'bildirimler'])
        ->name('ogrenci.bildirimler');

    // Sınav kodu sistemi
    Route::get('/ogrenci/sinav-kodu', [OgrenciController::class, 'sinavKoduGir'])
        ->name('ogrenci.sinav.kodu');

    Route::post('/ogrenci/sinav-kodu/dogrula', [OgrenciController::class, 'sinavKoduDogrula'])
        ->name('ogrenci.sinav.kodu.dogrula');

    // DÜZELTME: PIN doğrulandıktan sonra buraya yönlendiriliyor
    // Eski: ogrenci.test.baslat (genel sayfaya düşüyordu)
    // Yeni: ogrenci.sinav.baslat (sınava özgü soruları yükler)
    Route::get('/ogrenci/sinav/{sinav}/baslat', [OgrenciController::class, 'sinavBaslat'])
        ->name('ogrenci.sinav.baslat');
});

// ── ÖĞRETMEN ROUTE'LARI ─────────────────────────────────
Route::middleware(['auth', 'ogretmen'])->group(function () {

    Route::get('/ogretmen/dashboard', [OgretmenController::class, 'dashboard'])
        ->name('ogretmen.dashboard');

    Route::get('/ogretmen/sinav-olustur', [OgretmenController::class, 'sinavOlustur'])
        ->name('ogretmen.sinav.olustur');

    Route::post('/ogretmen/sinav-kaydet', [OgretmenController::class, 'sinavKaydet'])
        ->name('ogretmen.sinav.kaydet');

    Route::get('/ogretmen/sinav/{sinav}/duzenle', [OgretmenController::class, 'sinavDuzenle'])
        ->name('ogretmen.sinav.duzenle');

    Route::post('/ogretmen/sinav/{sinav}/guncelle', [OgretmenController::class, 'sinavGuncelle'])
        ->name('ogretmen.sinav.guncelle');

    Route::get('/ogretmen/soru-ekle', [OgretmenController::class, 'soruEkle'])
        ->name('ogretmen.soru.ekle');

    Route::post('/ogretmen/soru-kaydet', [OgretmenController::class, 'soruKaydet'])
        ->name('ogretmen.soru.kaydet');

    Route::get('/ogretmen/analiz', [OgretmenController::class, 'analizOdasi'])
        ->name('ogretmen.analiz');

    Route::get('/ogretmen/sinif', [OgretmenController::class, 'sinifYonetimi'])
        ->name('ogretmen.sinif');

    Route::get('/ogretmen/profil', [OgretmenController::class, 'profil'])
        ->name('ogretmen.profil');

    Route::post('/ogretmen/profil', [OgretmenController::class, 'profilGuncelle'])
        ->name('ogretmen.profil.guncelle');

    Route::post('/ogretmen/sinav/{sinav}/baslat', [OgretmenController::class, 'sinavBaslat'])
            ->name('ogretmen.sinav.baslat');

    Route::get('/ogretmen/sinav/{sinav}/baslat', [OgretmenController::class, 'sinavBaslat'])
            ->name('ogretmen.sinav.baslat.get');        

    Route::post('/ogretmen/sinav/{sinav}/durdur', [OgretmenController::class, 'sinavDurdur'])
            ->name('ogretmen.sinav.durdur');
});

// ── GENEL PROFİL ─────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::get('/',                         [AdminController::class,'index'])->name('admin.index');
    Route::delete('/review/{id}',           [AdminController::class,'deleteReview'])->name('admin.review.delete');
    Route::patch('/review/{id}/toggle',     [AdminController::class,'toggleReview'])->name('admin.review.toggle');
    Route::delete('/user/{id}',             [AdminController::class,'deleteUser'])->name('admin.user.delete');
    Route::patch('/user/{id}/toggle-admin', [AdminController::class,'toggleAdmin'])->name('admin.user.toggle');
    Route::patch('/user/{id}/role',         [AdminController::class,'updateRole'])->name('admin.user.role');
    Route::delete('/exam/{id}',             [AdminController::class,'deleteExam'])->name('admin.exam.delete');
});
