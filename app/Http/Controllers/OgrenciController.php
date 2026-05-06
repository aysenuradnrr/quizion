<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Kazanim;

class OgrenciController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('ogrenci', compact('user'));
    }

    private function kullaniciSinifi($user): string
    {
        $sinif = trim((string) $user->grade);

        if (is_numeric($sinif)) {
            return $sinif . '. Sınıf';
        }

        return $sinif;
    }

    public function testBaslat()
    {
        $user = Auth::user();
        $sinif = $this->kullaniciSinifi($user);

        // Bütün sınıflarda bütün dersler görünsün
        $dersler = collect([
            'Matematik',
            'Fen Bilimleri',
            'Türkçe',
            'Sosyal Bilgiler',
            'İngilizce',
        ]);

        $kazanimlar = Kazanim::select('ders', 'kazanim_adi')
            ->where('sinif', $sinif)
            ->distinct()
            ->orderBy('ders')
            ->orderBy('kazanim_adi')
            ->get();

        return view('ogrenci-test-baslat', compact('user', 'dersler', 'kazanimlar'));
    }

    public function testOlustur(Request $request)
    {
        $request->validate([
            'ders' => 'required|string',
            'kazanim' => 'required|string',
            'kolay_sayisi' => 'required|integer|min:0|max:20',
            'orta_sayisi' => 'required|integer|min:0|max:20',
            'zor_sayisi' => 'required|integer|min:0|max:20',
        ]);

        $user = Auth::user();
        $sinif = $this->kullaniciSinifi($user);

        $kolay = Question::where('sinif', $sinif)
            ->where('ders', $request->ders)
            ->where('kazanim', $request->kazanim)
            ->where('zorluk', 'Kolay')
            ->inRandomOrder()
            ->limit((int) $request->kolay_sayisi)
            ->get();

        $orta = Question::where('sinif', $sinif)
            ->where('ders', $request->ders)
            ->where('kazanim', $request->kazanim)
            ->where('zorluk', 'Orta')
            ->inRandomOrder()
            ->limit((int) $request->orta_sayisi)
            ->get();

        $zor = Question::where('sinif', $sinif)
            ->where('ders', $request->ders)
            ->where('kazanim', $request->kazanim)
            ->where('zorluk', 'Zor')
            ->inRandomOrder()
            ->limit((int) $request->zor_sayisi)
            ->get();

        $questions = $kolay->merge($orta)->merge($zor)->shuffle();

        return view('ogrenci-test-coz', [
            'user' => $user,
            'questions' => $questions,
            'ders' => $request->ders,
            'kazanim' => $request->kazanim,
        ]);
    }
}