<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Öğrenci Panel Kontrolcüsü
 * Konum: app/Http/Controllers/OgrenciController.php
 */
class OgrenciController extends Controller
{
    /**
     * Dashboard
     * View: resources/views/ogrenci.blade.php
     * Panel içinde {{ Auth::user()->name }} veya {{ $ogrenci->name }} ile isim gösterilir.
     */
    public function dashboard()
    {
        $ogrenci = Auth::user(); // ← Blade'de: {{ $ogrenci->name }}

        return view('ogrenci', [
            'ogrenci'         => $ogrenci,
            'toplamPuan'      => 0,    // İleride: $ogrenci->puanlar()->sum('puan')
            'testCozdu'       => 0,    // İleride: $ogrenci->sinavSonuclari()->count()
            'basariOrani'     => 0,
            'gunlukSeri'      => 0,
            'sonTestler'      => [],
            'rozetler'        => [],
            'yaklasanSinavlar'=> [],
        ]);
    }

    public function dersler()    { return view('ogrenci.dersler');    }
    public function sinavlarim() { return view('ogrenci.sinavlarim'); }
    public function rozetlerim() { return view('ogrenci.rozetlerim'); }
    public function basarim()    { return view('ogrenci.basarim');    }
    public function ayarlar()    { return view('ogrenci.ayarlar');    }

    public function sinavaKatil(Request $request)
    {
        $request->validate(['sinav_kodu' => 'required|string|max:20']);
        // İleride: Sinav::where('kod', $request->sinav_kodu)->firstOrFail();
        return back()->with('info', 'Sınav kodu doğrulanıyor...');
    }
}

