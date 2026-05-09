<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\OnlineExam;
use App\Models\Question;
use App\Models\User;
use App\Models\TestResult;
use Illuminate\Support\Str;

class OgretmenController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $sonSinavlar = OnlineExam::where('teacher_id', $user->id)
            ->latest()
            ->take(10)
            ->get();

        return view('ogretmen', compact('user', 'sonSinavlar'));
    }

    public function sinavOlustur()
    {
        $user = Auth::user();

        $questions = Question::query()
            ->when($user->branch, function ($query) use ($user) {
                $query->where('ders', $user->branch);
            })
            ->latest()
            ->take(80)
            ->get();

        return view('ogretmen-sinav-olustur', compact('user', 'questions'));
    }

    public function sinavKaydet(Request $request)
    {
        $request->validate([
            'title'                           => 'required|string|max:255',
            'ders'                            => 'nullable|string|max:255',
            'grade'                           => 'required|string|max:50',
            'starts_at'                       => 'required|date',
            'duration'                        => 'required|integer|min:1|max:180',
            'question_ids'                    => 'nullable|array',
            'question_ids.*'                  => 'integer|exists:questions,id',
            'manual_questions'                => 'nullable|array',
            'manual_questions.*.soru_metni'   => 'nullable|string',
            'manual_questions.*.secenek_a'    => 'nullable|string',
            'manual_questions.*.secenek_b'    => 'nullable|string',
            'manual_questions.*.secenek_c'    => 'nullable|string',
            'manual_questions.*.secenek_d'    => 'nullable|string',
            'manual_questions.*.dogru_cevap'  => 'nullable|string|in:A,B,C,D',
            'image_questions'                 => 'nullable|array',
            'image_questions.*'               => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $manualQuestions = collect($request->input('manual_questions', []))
            ->filter(fn ($item) => !empty($item['soru_metni']))
            ->map(fn ($item) => [
                'soru_metni'  => $item['soru_metni']  ?? '',
                'secenek_a'   => $item['secenek_a']   ?? '',
                'secenek_b'   => $item['secenek_b']   ?? '',
                'secenek_c'   => $item['secenek_c']   ?? '',
                'secenek_d'   => $item['secenek_d']   ?? '',
                'dogru_cevap' => $item['dogru_cevap'] ?? '',
            ])
            ->values()->toArray();

        $imageQuestions = [];
        if ($request->hasFile('image_questions')) {
            foreach ($request->file('image_questions') as $file) {
                if ($file) {
                    $imageQuestions[] = [
                        'path'          => $file->store('exam-question-images', 'public'),
                        'original_name' => $file->getClientOriginalName(),
                    ];
                }
            }
        }

        OnlineExam::create([
            'teacher_id'        => Auth::id(),
            'title'             => $request->title,
            'ders'              => $request->ders,
            'grade'             => $request->grade,
            'starts_at'         => $request->starts_at,
            'duration'          => $request->duration,
            'exam_code'         => strtoupper(Str::random(6)),
            'question_ids'      => $request->input('question_ids', []),
            'manual_questions'  => $manualQuestions,
            'image_questions'   => $imageQuestions,
            'is_active'         => true,
        ]);

        return redirect()
            ->route('ogretmen.dashboard')
            ->with('success', 'Sınav oluşturuldu! Kod panelde görünüyor.');
    }

    public function soruEkle()
    {
        $user = Auth::user();
        return view('ogretmen-soru-ekle', compact('user'));
    }

    // ── DÜZELTME: Artık DB'ye yazıyor, PHP dosyasına değil ──
    public function soruKaydet(Request $request)
    {
        $request->validate([
            'sinif'       => 'required|string|max:50',
            'ders'        => 'required|string|max:255',
            'kazanim'     => 'required|string|max:255',
            'zorluk'      => 'required|string|in:Kolay,Orta,Zor',
            'soru_metni'  => 'nullable|string',
            'gorsel'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'secenek_a'   => 'required|string',
            'secenek_b'   => 'required|string',
            'secenek_c'   => 'required|string',
            'secenek_d'   => 'required|string',
            'dogru_cevap' => 'required|string|in:A,B,C,D',
        ]);

        $gorselYolu = null;
        if ($request->hasFile('gorsel')) {
            $gorselYolu = 'storage/' . $request->file('gorsel')->store('system-question-images', 'public');
        }

        if (!$request->filled('soru_metni') && !$gorselYolu) {
            return back()->withInput()
                ->withErrors(['soru_metni' => 'Soru metni yazmalı ya da görsel eklemelisiniz.']);
        }

        // ── DB'ye kaydet (eskiden PHP dosyasına yazıyordu — KALDIRILDI) ──
        Question::create([
            'sinif'       => $request->sinif,
            'teacher_id'  => Auth::id(),
            'ders'        => $request->ders,
            'kazanim'     => $request->kazanim,
            'zorluk'      => $request->zorluk,
            'soru_metni'  => $request->soru_metni ?? '',
            'gorsel'      => $gorselYolu,
            'secenek_a'   => $request->secenek_a,
            'secenek_b'   => $request->secenek_b,
            'secenek_c'   => $request->secenek_c,
            'secenek_d'   => $request->secenek_d,
            'dogru_cevap' => $request->dogru_cevap,
        ]);

        return back()->with('success', 'Soru başarıyla eklendi.');
    }

    // ── ANALİZ ODASI — online_exam_id ile gerçek veriler ──
    public function analizOdasi()
    {
        $user    = Auth::user();
        $sinavlar = OnlineExam::where('teacher_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $ozet = [];
        foreach ($sinavlar as $s) {
            $sonuclar = TestResult::where('online_exam_id', $s->id)->get();
            $ozet[$s->id] = [
                'katilimci'  => $sonuclar->count(),
                'ortalama'   => $sonuclar->count() > 0 ? round($sonuclar->avg('score'), 1) : 0,
                'en_yuksek'  => $sonuclar->max('score') ?? 0,
                'dogru_ort'  => $sonuclar->count() > 0 ? round($sonuclar->avg('correct_count'), 1) : 0,
                'yanlis_ort' => $sonuclar->count() > 0 ? round($sonuclar->avg('wrong_count'), 1) : 0,
                'bos_ort'    => $sonuclar->count() > 0 ? round($sonuclar->avg('empty_count'), 1) : 0,
                // Bireysel öğrenci detayları (blade'de foreach için)
                'detay'      => $sonuclar->map(function ($r) {
                    return [
                        'isim'         => optional($r->user)->fullName() ?? 'Bilinmiyor',
                        'dogru'        => $r->correct_count,
                        'yanlis'       => $r->wrong_count,
                        'bos'          => $r->empty_count,
                        'puan'         => $r->score,
                        'tarih'        => $r->created_at->format('d.m.Y H:i'),
                    ];
                })->toArray(),
            ];
        }

        return view('ogretmen-analiz', compact('user', 'sinavlar', 'ozet'));
    }

    // ── SINIF YÖNETİMİ — öğretmene bağlı öğrenciler ──
    public function sinifYonetimi()
    {
        $user = Auth::user();

        // Öğretmenin oluşturduğu sınavlar (grade'e göre gruplu)
        $sinavlar = OnlineExam::where('teacher_id', $user->id)
            ->orderBy('grade')
            ->orderBy('starts_at')
            ->get()
            ->groupBy('grade');

        // Bu öğretmene atanmış öğrenciler (users.teacher_id = $user->id)
        $ogrenciler = User::where('role', 'ogrenci')
            ->where('teacher_id', $user->id)
            ->orderBy('grade')
            ->orderBy('name')
            ->get()
            ->groupBy('grade');

        return view('ogretmen-sinif', compact('user', 'sinavlar', 'ogrenciler'));
    }

    // ── PROFİL ──
    public function profil()
    {
        $user = Auth::user();
        return view('ogretmen-profil', compact('user'));
    }

    public function profilGuncelle(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:100',
            'branch' => 'nullable|string|max:100',
            'email'  => 'required|email|max:255',
        ]);

        $user         = Auth::user();
        $user->name   = $request->name;
        $user->branch = $request->branch;
        $user->email  = $request->email;
        $user->save();

        return back()->with('success', 'Profil güncellendi.');
    }
}
