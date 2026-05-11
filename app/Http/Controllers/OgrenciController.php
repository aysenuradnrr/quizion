<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Models\TestResult;
use App\Models\OnlineExam;
use Carbon\Carbon;

class OgrenciController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $results = TestResult::where('user_id', $user->id)
            ->latest()
            ->get();

        $toplamSinav    = $results->count();
        $ortalamaBasari = $toplamSinav > 0 ? round($results->avg('score')) : 0;
        $toplamSoru     = $results->sum('total_questions');

        $haftaBaslangic = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $haftalikAktivite = [];

        for ($i = 0; $i < 7; $i++) {
            $gun = $haftaBaslangic->copy()->addDays($i);
            $haftalikAktivite[] = [
                'gun'  => ['Pzt', 'Sal', 'Çar', 'Per', 'Cum', 'Cmt', 'Paz'][$i],
                'soru' => TestResult::where('user_id', $user->id)
                    ->whereDate('created_at', $gun->toDateString())
                    ->sum('total_questions'),
            ];
        }

        $sonSinavlar = $results->take(5);

        $dersBasariIzlencesi = $this->dersBasariIzlencesi($results);

        $yaklasanSinavlar = OnlineExam::where('grade', (string) $user->grade)
            ->where(function ($q) {
                $q->where('is_active', true)
                  ->orWhere('starts_at', '>=', now());
            })
            ->orderBy('starts_at')
            ->get();

        $bildirimler = $this->bildirimleriHazirla($yaklasanSinavlar);

        return view('ogrenci', compact(
            'user',
            'toplamSinav',
            'ortalamaBasari',
            'toplamSoru',
            'haftalikAktivite',
            'sonSinavlar',
            'dersBasariIzlencesi',
            'yaklasanSinavlar',
            'bildirimler'
        ));
    }

    private function dersBasariIzlencesi($results)
    {
        $dersler = [
            'Matematik'       => '📐',
            'Fen Bilimleri'   => '🧬',
            'Türkçe'          => '📖',
            'Sosyal Bilgiler' => '🌍',
            'İngilizce'       => '🇬🇧',
        ];

        return collect($dersler)->map(function ($icon, $ders) use ($results) {
            $ilgiliSonuclar = $results->filter(function ($result) use ($ders) {
                return is_array($result->dersler) && in_array($ders, $result->dersler);
            });

            return [
                'icon'  => $icon,
                'name'  => $ders,
                'score' => $ilgiliSonuclar->count() > 0 ? round($ilgiliSonuclar->avg('score')) : 0,
            ];
        })->values();
    }

    private function bildirimleriHazirla($yaklasanSinavlar)
    {
        return $yaklasanSinavlar->map(function ($sinav) {
            $saatFarki = now()->diffInHours($sinav->starts_at, false);

            $mesaj = $saatFarki <= 24
                ? $sinav->title . ' sınavı yaklaşıyor.'
                : $sinav->title . ' sınavı sınıfına tanımlandı.';

            return [
                'title'   => 'Yeni Sınav Bildirimi',
                'message' => $mesaj,
                'time'    => $sinav->starts_at->format('d.m.Y H:i'),
            ];
        });
    }

    public function yaklasanSinavlar()
    {
        $user = Auth::user();

        $yaklasanSinavlar = OnlineExam::where('grade', (string) $user->grade)
            ->where(function ($q) {
                $q->where('is_active', true)
                  ->orWhere('starts_at', '>=', now());
            })
            ->orderBy('starts_at')
            ->get();

        return view('ogrenci-yaklasan-sinavlar', compact('user', 'yaklasanSinavlar'));
    }

    public function bildirimler()
    {
        $user = Auth::user();

        $yaklasanSinavlar = OnlineExam::where('grade', (string) $user->grade)
            ->where(function ($q) {
                $q->where('is_active', true)
                  ->orWhere('starts_at', '>=', now());
            })
            ->orderBy('starts_at')
            ->get();

        $bildirimler = $this->bildirimleriHazirla($yaklasanSinavlar);

        return view('ogrenci-bildirimler', compact('user', 'bildirimler'));
    }

    // ── YARDIMCI: Kullanıcı sınıf etiketini üret ──
    private function kullaniciSinifi($user): string
    {
        $sinif = trim((string) $user->grade);
        return is_numeric($sinif) ? $sinif . '. Sınıf' : $sinif;
    }

    // ── SERBEST TEST BAŞLAT (genel havuzdan) ──
    public function testBaslat()
    {
        $user  = Auth::user();
        $sinif = $this->kullaniciSinifi($user);

        $dersler = collect([
            'Matematik', 'Fen Bilimleri', 'Türkçe', 'Sosyal Bilgiler', 'İngilizce',
        ]);

        $kazanimlar = Question::where('sinif', $sinif)
            ->select('ders', 'kazanim')
            ->distinct()
            ->orderBy('ders')
            ->orderBy('kazanim')
            ->get();

        return view('ogrenci-test-baslat', compact('user', 'dersler', 'kazanimlar'));
    }

    public function testOlustur(Request $request)
    {
        $request->validate([
            'dersler'      => 'required|array|min:1',
            'dersler.*'    => 'required|string',
            'kazanimlar'   => 'required|array|min:1',
            'kazanimlar.*' => 'required|string',
            'kolay_sayisi' => 'required|integer|min:0|max:20',
            'orta_sayisi'  => 'required|integer|min:0|max:20',
            'zor_sayisi'   => 'required|integer|min:0|max:20',
            'sure'         => 'required|integer|min:1|max:180',
        ]);

        $user  = Auth::user();
        $sinif = $this->kullaniciSinifi($user);

        $dersler    = $request->input('dersler', []);
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
            'user'       => $user,
            'questions'  => $questions,
            'dersler'    => $dersler,
            'kazanimlar' => $kazanimlar,
            'ders'       => implode(', ', $dersler),
            'kazanim'    => implode(', ', $kazanimlar),
            'sure'       => (int) $request->sure,
            'sinav_id'   => null,
        ]);
    }

    // ── TEST SONUÇ ──
    public function testSonuc(Request $request)
    {
        $questionIds = $request->input('question_ids', []);

        $questions = Question::whereIn('id', $questionIds)
            ->get()
            ->sortBy(function ($question) use ($questionIds) {
                return array_search($question->id, $questionIds);
            })
            ->values();

        $dogru  = 0;
        $yanlis = 0;
        $bos    = 0;
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
                'soru'          => $question,
                'ogrenci_cevap' => $cevap,
                'dogru_cevap'   => $question->dogru_cevap,
                'durum'         => $durum,
            ];
        }

        $toplam = $questions->count();
        $puan   = $toplam > 0 ? round(($dogru / $toplam) * 100) : 0;

        TestResult::create([
            'user_id'         => Auth::id(),
            'online_exam_id'  => $request->input('online_exam_id') ?: null,
            'total_questions' => $toplam,
            'correct_count'   => $dogru,
            'wrong_count'     => $yanlis,
            'empty_count'     => $bos,
            'score'           => $puan,
            'dersler'         => array_filter($request->input('dersler', []), fn($d) => !empty($d)),
            'kazanimlar'      => $request->input('kazanimlar', []),
        ]);

        $user     = Auth::user();
        $user->xp = (int) $user->xp + ($dogru * 10);
        $user->save();

        return view('ogrenci-test-sonuc', compact(
            'dogru', 'yanlis', 'bos', 'puan', 'toplam', 'sonuclar'
        ));
    }

    // ── SINAV KODU GİRİŞ SAYFASI (GET) ──
    public function sinavKoduGir()
    {
        return view('ogrenci-sinav-kodu');
    }

    // ── SINAV KODU DOĞRULA (POST) ──
    public function sinavKoduDogrula(Request $request)
    {
        $request->validate([
            'exam_code' => 'required|string|min:4|max:10',
        ]);

        $sinav = OnlineExam::where('exam_code', strtoupper(trim($request->exam_code)))->first();

        if (!$sinav) {
            return back()->withErrors(['exam_code' => 'Geçersiz kod. Lütfen tekrar deneyin.'])->withInput();
        }

        if (!$sinav->is_active) {
            return back()->withErrors(['exam_code' => 'Sınav henüz başlatılmadı. Öğretmenini bekle.'])->withInput();
        }

        if ($sinav->isFinished()) {
            return back()->withErrors(['exam_code' => 'Bu sınavın süresi doldu.'])->withInput();
        }

        // ── Sınıf kontrolü: string karşılaştırması (tip uyuşmazlığını önler) ──
        $user = Auth::user();
        if ($sinav->grade !== null && (string) $sinav->grade !== (string) $user->grade) {
            return back()->withErrors(['exam_code' => 'Bu sınav senin sınıfına ait değil. (Sınıfın: ' . $user->grade . ', Sınav sınıfı: ' . $sinav->grade . ')'])->withInput();
        }

        return redirect()->route('ogrenci.sinav.baslat', ['sinav' => $sinav->id]);
    }

    // ── SINAVA ÖZGÜ BAŞLATMA (PIN ile girildi) ──
    public function sinavBaslat(OnlineExam $sinav)
    {
        $user = Auth::user();

        if (!$sinav->is_active) {
            return redirect()->route('ogrenci.sinav.kodu')
                ->withErrors(['exam_code' => 'Sınav henüz başlatılmadı. Öğretmenini bekle.']);
        }

        if ($sinav->isFinished()) {
            return redirect()->route('ogrenci.sinav.kodu')
                ->withErrors(['exam_code' => 'Bu sınavın süresi doldu.']);
        }

        // ── 1. DB soruları (question_ids) ──
        $sorular     = collect();
        $questionIds = $sinav->question_ids ?? [];
        if (!empty($questionIds)) {
            $sorular = Question::whereIn('id', $questionIds)
                ->get()
                ->sortBy(fn($q) => array_search($q->id, $questionIds))
                ->values();
        }

        // ── 2. Manuel sorular ──
        $manuelSorular = is_array($sinav->manual_questions)
            ? array_filter($sinav->manual_questions, fn($s) => !empty($s['soru_metni']))
            : [];

        // ── 3. Görsel sorular ──
        $gorselSorular = is_array($sinav->image_questions)
            ? $sinav->image_questions
            : [];

        // ── Kalan süre ──
        $kalanSaniye = $sinav->remainingSeconds();

        return view('ogrenci-sinav-coz', [
            'user'          => $user,
            'sinav'         => $sinav,
            'sorular'       => $sorular,
            'manuelSorular' => $manuelSorular,
            'gorselSorular' => $gorselSorular,
            'sure'          => $sinav->duration,
            'kalanSaniye'   => $kalanSaniye,
        ]);
    }
}