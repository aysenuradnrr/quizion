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
            ->get()
            ->unique('exam_code')
            ->values();

        return view('ogretmen', compact('user', 'sonSinavlar'));
    }

    public function sinavOlustur()
    {
        $user = Auth::user();

        $questions = Question::query()
            ->when($user->branch, fn($q) => $q->where('ders', $user->branch))
            ->latest()
            ->take(80)
            ->get();

        $kazanimlar = Question::query()
            ->when($user->branch, fn($q) => $q->where('ders', $user->branch))
            ->whereNotNull('kazanim')
            ->pluck('kazanim')
            ->unique()
            ->values();

        return view('ogretmen-sinav-olustur', compact('user', 'questions', 'kazanimlar'));
    }

    public function sinavKaydet(Request $request)
    {
        $request->validate([
            'title'                               => 'required|string|max:255',
            'ders'                                => 'nullable|string|max:255',
            'grade'                               => 'required|string|max:50',
            'starts_at'                           => 'required|date',
            'duration'                            => 'required|integer|min:1|max:300',
            'question_count'                      => 'nullable|integer|min:1|max:200',
            'question_ids'                        => 'nullable|array',
            'question_ids.*'                      => 'integer|exists:questions,id',

            'manual_questions'                    => 'nullable|array',
            'manual_questions.*.soru_metni'       => 'nullable|string',
            'manual_questions.*.secenek_a'        => 'nullable|string',
            'manual_questions.*.secenek_b'        => 'nullable|string',
            'manual_questions.*.secenek_c'        => 'nullable|string',
            'manual_questions.*.secenek_d'        => 'nullable|string',
            'manual_questions.*.dogru_cevap'      => 'nullable|string|in:A,B,C,D',
            'manual_questions.*.kazanim'          => 'nullable|string|max:255',

            'image_questions'                     => 'nullable|array',
            'image_questions.*.gorsel'            => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'image_questions.*.soru_metni'        => 'nullable|string',
            'image_questions.*.secenek_a'         => 'nullable|string',
            'image_questions.*.secenek_b'         => 'nullable|string',
            'image_questions.*.secenek_c'         => 'nullable|string',
            'image_questions.*.secenek_d'         => 'nullable|string',
            'image_questions.*.dogru_cevap'       => 'nullable|string|in:A,B,C,D',
            'image_questions.*.kazanim'           => 'nullable|string|max:255',
        ]);

        $manualQuestions = collect($request->input('manual_questions', []))
            ->filter(fn($item) => !empty($item['soru_metni']))
            ->map(fn($item) => [
                'soru_metni'  => $item['soru_metni']  ?? '',
                'secenek_a'   => $item['secenek_a']   ?? '',
                'secenek_b'   => $item['secenek_b']   ?? '',
                'secenek_c'   => $item['secenek_c']   ?? '',
                'secenek_d'   => $item['secenek_d']   ?? '',
                'dogru_cevap' => $item['dogru_cevap'] ?? '',
                'kazanim'     => $item['kazanim']     ?? '',
            ])
            ->values()
            ->toArray();

        $imageQuestions = [];
        $imageInputs = $request->input('image_questions', []);

        foreach ($imageInputs as $index => $item) {
            $file = $request->file("image_questions.$index.gorsel");

            if (!$file && empty($item['existing_path'] ?? null)) {
                continue;
            }

            $path = $item['existing_path'] ?? null;
            $originalName = $item['original_name'] ?? null;

            if ($file) {
                $path = $file->store('exam-question-images', 'public');
                $originalName = $file->getClientOriginalName();
            }

            $imageQuestions[] = [
                'path'          => $path,
                'original_name' => $originalName,
                'soru_metni'    => $item['soru_metni']  ?? '',
                'secenek_a'     => $item['secenek_a']   ?? '',
                'secenek_b'     => $item['secenek_b']   ?? '',
                'secenek_c'     => $item['secenek_c']   ?? '',
                'secenek_d'     => $item['secenek_d']   ?? '',
                'dogru_cevap'   => $item['dogru_cevap'] ?? '',
                'kazanim'       => $item['kazanim']     ?? '',
            ];
        }

        OnlineExam::create([
            'teacher_id'       => Auth::id(),
            'title'            => $request->title,
            'ders'             => $request->ders ?: Auth::user()->branch,
            'grade'            => $request->grade,
            'starts_at'        => $request->starts_at,
            'duration'         => (int) $request->duration,
            'exam_code'        => strtoupper(Str::random(6)),
            'question_ids'     => $request->input('question_ids', []),
            'manual_questions' => $manualQuestions,
            'image_questions'  => $imageQuestions,
            'is_active'        => false,
            'started_at'       => null,
        ]);

        return redirect()
            ->route('ogretmen.dashboard')
            ->with('success', 'Sınav oluşturuldu! Sınav saati gelince başlatabilirsin.');
    }

    public function sinavBaslat(Request $request, OnlineExam $sinav)
    {
        if (!$sinav->teacher_id) {
            $sinav->teacher_id = Auth::id();
            $sinav->save();
        }

        abort_if((int) $sinav->teacher_id !== (int) Auth::id(), 403);

        if ($sinav->starts_at && now()->lt($sinav->starts_at)) {
            return redirect()
                ->route('ogretmen.dashboard')
                ->with('error', 'Sınav saati gelmeden sınavı başlatamazsınız. Başlangıç: ' . $sinav->starts_at->format('d.m.Y H:i'));
        }

        $sinav->update([
            'is_active'  => true,
            'started_at' => now(),
        ]);

        return redirect()
            ->route('ogretmen.dashboard')
            ->with('success', 'Sınav başlatıldı! Öğrenciler artık girebilir.');
    }

    public function sinavDurdur(Request $request, OnlineExam $sinav)
    {
        if (!$sinav->teacher_id) {
            $sinav->teacher_id = Auth::id();
            $sinav->save();
        }

        abort_if($sinav->teacher_id != Auth::id(), 403);

        $sinav->update([
            'is_active' => false,
        ]);

        return redirect()
            ->route('ogretmen.dashboard')
            ->with('success', 'Sınav durduruldu.');
    }

    public function soruEkle()
    {
        return view('ogretmen-soru-ekle', ['user' => Auth::user()]);
    }

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

    public function analizOdasi()
    {
        $user = Auth::user();
        $sinavlar = OnlineExam::where('teacher_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get()
            ->unique('exam_code')
            ->values();

        $ozet = [];
        foreach ($sinavlar as $s) {
            $sonuclar = TestResult::where('online_exam_id', $s->id)
                ->with('user')
                ->get();

            $liderler = $sonuclar->sortByDesc('score')->take(3)->values()
                ->map(fn($r, $i) => [
                    'sira'   => $i + 1,
                    'isim'   => optional($r->user)->fullName() ?? 'Bilinmiyor',
                    'puan'   => $r->score,
                    'dogru'  => $r->correct_count,
                    'yanlis' => $r->wrong_count,
                    'bos'    => $r->empty_count,
                ]);

            $ozet[$s->id] = [
                'katilimci' => $sonuclar->count(),
                'ortalama'  => $sonuclar->count() > 0 ? round($sonuclar->avg('score'), 1) : 0,
                'en_yuksek' => $sonuclar->max('score') ?? 0,
                'liderler'  => $liderler,
                'detay'     => $sonuclar->sortByDesc('score')->map(fn($r) => [
                    'isim'   => optional($r->user)->fullName() ?? 'Bilinmiyor',
                    'dogru'  => $r->correct_count,
                    'yanlis' => $r->wrong_count,
                    'bos'    => $r->empty_count,
                    'puan'   => $r->score,
                    'tarih'  => $r->created_at->format('d.m.Y H:i'),
                ])->toArray(),
            ];
        }

        return view('ogretmen-analiz', compact('user', 'sinavlar', 'ozet'));
    }

    public function sinifYonetimi()
    {
        $user = Auth::user();

        $sinavlar = OnlineExam::where('teacher_id', $user->id)
            ->orderBy('grade')
            ->orderBy('starts_at')
            ->get()
            ->unique('exam_code')
            ->values()
            ->groupBy('grade');

        $ogrenciler = User::where('role', 'ogrenci')
            ->where('teacher_id', $user->id)
            ->orderBy('grade')
            ->orderBy('name')
            ->get()
            ->groupBy('grade');

        return view('ogretmen-sinif', compact('user', 'sinavlar', 'ogrenciler'));
    }

    public function profil()
    {
        return view('ogretmen-profil', ['user' => Auth::user()]);
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
