<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Öğretmen Panel Kontrolcüsü
 * Konum: app/Http/Controllers/OgretmenController.php
 */
class OgretmenController extends Controller
{
    /**
     * Dashboard
     * View: resources/views/ogretmen.blade.php
     */
    public function dashboard()
    {
        $ogretmen = Auth::user(); // ← Blade'de: {{ $ogretmen->name }}, {{ $ogretmen->brans }}

        return view('ogretmen', [
            'ogretmen'         => $ogretmen,
            'toplamSoru'       => 0,   // İleride: Soru::where('user_id', $ogretmen->id)->count()
            'aktifSinav'       => 0,
            'toplamOgrenci'    => 0,
            'aktifSinavlar'    => [],
            'yaklasanSinavlar' => [],
            'sorular'          => [],
            'ogrenciler'       => [],
            'dersler'          => [],
            'bugunSinavSayisi' => 0,
            'enBasariliSinif'  => '-',
            'haftaninSkor'     => '0',
            'buHaftaAktif'     => 0,
        ]);
    }

    // Soru işlemleri
    public function soruBankasi()
    {
        return view('ogretmen.soru-bankasi', ['ogretmen' => Auth::user()]);
    }

    public function soruEkle(Request $request)
    {
        $request->validate([
            'soru_metni'   => 'required|string|max:1000',
            'ders_id'      => 'required',
            'sik_a'        => 'required|string|max:255',
            'sik_b'        => 'required|string|max:255',
            'sik_c'        => 'required|string|max:255',
            'sik_d'        => 'required|string|max:255',
            'dogru_cevap'  => 'required|in:A,B,C,D',
            'zorluk'       => 'required|in:Kolay,Orta,Zor',
        ]);

        // İleride: Soru::create([...$request->validated(), 'user_id' => Auth::id()]);
        return back()->with('success', 'Soru başarıyla eklendi!');
    }

    public function soruDuzenle($id) { return back(); }
    public function soruGuncelle(Request $request, $id) { return back()->with('success', 'Soru güncellendi.'); }
    public function soruSil($id) { return back()->with('success', 'Soru silindi.'); }

    // Sınav işlemleri
    public function sinavlarim()
    {
        return view('ogretmen.sinavlarim', ['ogretmen' => Auth::user()]);
    }

    public function sinavOlustur(Request $request)
    {
        $request->validate([
            'sinav_adi'   => 'required|string|max:150',
            'sinav_ders_id' => 'required',
            'soru_sayisi' => 'required|integer|min:1|max:100',
            'sure'        => 'required|integer|min:5|max:180',
        ]);

        // İleride: $kod = 'QZ-' . strtoupper(Str::random(4));
        //          Sinav::create([..., 'kod' => $kod, 'user_id' => Auth::id()]);
        $demoKod = 'QZ-' . rand(1000, 9999);
        return back()->with('success', "✅ Sınav oluşturuldu! Kod: <strong>{$demoKod}</strong>");
    }

    public function sinavSil($id) { return back()->with('success', 'Sınav silindi.'); }

    // Raporlar
    public function ogrenciRaporlari() { return view('ogretmen.raporlar',      ['ogretmen' => Auth::user()]); }
    public function sinifListesi()     { return view('ogretmen.sinif-listesi',  ['ogretmen' => Auth::user()]); }
    public function analizOdasi()      { return view('ogretmen.analiz',         ['ogretmen' => Auth::user()]); }
    public function takvim()           { return view('ogretmen.takvim',         ['ogretmen' => Auth::user()]); }
    public function rozetler()         { return view('ogretmen.rozetler',       ['ogretmen' => Auth::user()]); }
    public function ayarlar()          { return view('ogretmen.ayarlar',        ['ogretmen' => Auth::user()]); }
}
