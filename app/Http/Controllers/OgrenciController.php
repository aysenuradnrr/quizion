<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\Kazanim;
use App\Models\TestResult;
use Carbon\Carbon;

class OgrenciController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $results = TestResult::where('user_id', $user->id)
            ->latest()
            ->get();

        $toplamSinav = $results->count();
        $ortalamaBasari = $toplamSinav > 0 ? round($results->avg('score')) : 0;
        $toplamSoru = $results->sum('total_questions');

        $haftaBaslangic = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $haftalikAktivite = [];

        for ($i = 0; $i < 7; $i++) {
            $gun = $haftaBaslangic->copy()->addDays($i);

            $haftalikAktivite[] = [
                'gun' => ['Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt', 'Paz'][$i],
                'soru' => TestResult::where('user_id', $user->id)
                    ->whereDate('created_at', $gun->toDateString())
                    ->sum('total_questions'),
            ];
        }

        $sonSinavlar = $results->take(5);

        return view('ogrenci', compact(
            'user',
            'toplamSinav',
            'ortalamaBasari',
            'toplamSoru',
            'haftalikAktivite',
            'sonSinavlar'
        ));
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
            'dersler' => 'required|array|min:1',
            'dersler.*' => 'required|string',

            'kazanimlar' => 'required|array|min:1',
            'kazanimlar.*' => 'required|string',

            'kolay_sayisi' => 'required|integer|min:0|max:20',
            'orta_sayisi' => 'required|integer|min:0|max:20',
            'zor_sayisi' => 'required|integer|min:0|max:20',
            'sure' => 'required|integer|min:1|max:180',
        ]);

        $user = Auth::user();
        $sinif = $this->kullaniciSinifi($user);

        $dersler = $request->input('dersler', []);
        $kazanimlar = $request->input('kazanimlar', []);

        $kolay = Question::where('sinif', $sinif)
            ->whereIn('ders', $dersler)
            ->whereIn('kazanim', $kazanimlar)
            ->where('zorluk', 'Kolay')
            ->inRandomOrder()
            ->limit((int) $request->kolay_sayisi)
            ->get();

        $orta = Question::where('sinif', $sinif)
            ->whereIn('ders', $dersler)
            ->whereIn('kazanim', $kazanimlar)
            ->where('zorluk', 'Orta')
            ->inRandomOrder()
            ->limit((int) $request->orta_sayisi)
            ->get();

        $zor = Question::where('sinif', $sinif)
            ->whereIn('ders', $dersler)
            ->whereIn('kazanim', $kazanimlar)
            ->where('zorluk', 'Zor')
            ->inRandomOrder()
            ->limit((int) $request->zor_sayisi)
            ->get();

        $questions = $kolay->merge($orta)->merge($zor)->shuffle()->values();

        return view('ogrenci-test-coz', [
            'user' => $user,
            'questions' => $questions,
            'ders' => implode(', ', $dersler),
            'kazanim' => implode(', ', $kazanimlar),
            'sure' => (int) $request->sure,
        ]);
    }

    public function testSonuc(Request $request)
    {
        $questionIds = $request->input('question_ids', []);

        $questions = Question::whereIn('id', $questionIds)
            ->get()
            ->sortBy(function ($question) use ($questionIds) {
                return array_search($question->id, $questionIds);
            })
            ->values();

        $dogru = 0;
        $yanlis = 0;
        $bos = 0;
        $sonuclar = [];

        foreach ($questions as $question) {
            $cevap = $request->input('soru_' . $question->id);

            if (!$cevap) {
                $bos++;
                $durum = 'Boş';
            } elseif ($cevap === $question->dogru_cevap) {
                $dogru++;
                $durum = 'Doğru';
            } else {
                $yanlis++;
                $durum = 'Yanlış';
            }

            $sonuclar[] = [
                'soru' => $question,
                'ogrenci_cevap' => $cevap,
                'dogru_cevap' => $question->dogru_cevap,
                'durum' => $durum,
            ];
        }

        $toplam = $questions->count();
        $puan = $toplam > 0 ? round(($dogru / $toplam) * 100) : 0;

        TestResult::create([
            'user_id' => Auth::id(),
            'total_questions' => $toplam,
            'correct_count' => $dogru,
            'wrong_count' => $yanlis,
            'empty_count' => $bos,
            'score' => $puan,
            'dersler' => [],
            'kazanimlar' => [],
        ]);

        $user = Auth::user();
        $user->xp = (int) $user->xp + ($dogru * 10);
        $user->save();

        return view('ogrenci-test-sonuc', compact(
            'dogru',
            'yanlis',
            'bos',
            'puan',
            'toplam',
            'sonuclar'
        ));
    }
}