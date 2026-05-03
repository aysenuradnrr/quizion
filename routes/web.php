<?php

use Illuminate\Support\Facades\Route;

// Ana Sayfa (Senin hazırladığın mor giriş sayfası)
Route::get('/', function () {
    return view('welcome');
});

// Öğretmen Paneli (Yeni oluşturduğumuz dosya)
Route::get('/ogretmen-paneli', function () {
    return view('ogretmen');
});

// Öğrenci Paneli (Arkadaşının hazırladığı sayfa)
Route::get('/ogrenci-paneli', function () {
    return view('ogrenci');
});