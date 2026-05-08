<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\OnlineExam;
use App\Models\Question;
use Illuminate\Support\Str;

class OgretmenController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $sonSinavlar = OnlineExam::where('teacher_id', $user->id)
            ->latest()
            ->take(5)
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
            'title' => 'required|string|max:255',
            'ders' => 'nullable|string|max:255',
            'grade' => 'required|string|max:50',
            'starts_at' => 'required|date',
            'duration' => 'required|integer|min:1|max:180',
            'question_ids' => 'nullable|array',
            'question_ids.*' => 'integer|exists:questions,id',
            'manual_questions' => 'nullable|array',
            'manual_questions.*.soru_metni' => 'nullable|string',
            'manual_questions.*.secenek_a' => 'nullable|string',
            'manual_questions.*.secenek_b' => 'nullable|string',
            'manual_questions.*.secenek_c' => 'nullable|string',
            'manual_questions.*.secenek_d' => 'nullable|string',
            'manual_questions.*.dogru_cevap' => 'nullable|string|in:A,B,C,D',
            'image_questions' => 'nullable|array',
            'image_questions.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $manualQuestions = collect($request->input('manual_questions', []))
            ->filter(fn ($item) => !empty($item['soru_metni']))
            ->map(fn ($item) => [
                'soru_metni' => $item['soru_metni'] ?? '',
                'secenek_a' => $item['secenek_a'] ?? '',
                'secenek_b' => $item['secenek_b'] ?? '',
                'secenek_c' => $item['secenek_c'] ?? '',
                'secenek_d' => $item['secenek_d'] ?? '',
                'dogru_cevap' => $item['dogru_cevap'] ?? '',
            ])
            ->values()
            ->toArray();

        $imageQuestions = [];

        if ($request->hasFile('image_questions')) {
            foreach ($request->file('image_questions') as $file) {
                if ($file) {
                    $imageQuestions[] = [
                        'path' => $file->store('exam-question-images', 'public'),
                        'original_name' => $file->getClientOriginalName(),
                    ];
                }
            }
        }

        OnlineExam::create([
            'teacher_id' => Auth::id(),
            'title' => $request->title,
            'ders' => $request->ders,
            'grade' => $request->grade,
            'starts_at' => $request->starts_at,
            'duration' => $request->duration,
            'exam_code' => strtoupper(Str::random(6)),
            'question_ids' => $request->input('question_ids', []),
            'manual_questions' => $manualQuestions,
            'image_questions' => $imageQuestions,
            'is_active' => true,
        ]);

        return redirect()
            ->route('ogretmen.dashboard')
            ->with('success', 'Sınav oluşturuldu.');
    }

    public function soruEkle()
    {
        $user = Auth::user();

        return view('ogretmen-soru-ekle', compact('user'));
    }

    public function soruKaydet(Request $request)
    {
        $request->validate([
            'sinif' => 'required|string|max:50',
            'ders' => 'required|string|max:255',
            'kazanim' => 'required|string|max:255',
            'zorluk' => 'required|string|in:Kolay,Orta,Zor',
            'soru_metni' => 'nullable|string',
            'gorsel' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'secenek_a' => 'required|string',
            'secenek_b' => 'required|string',
            'secenek_c' => 'required|string',
            'secenek_d' => 'required|string',
            'dogru_cevap' => 'required|string|in:A,B,C,D',
        ]);

        $gorselYolu = null;

        if ($request->hasFile('gorsel')) {
            $gorselYolu = 'storage/' . $request->file('gorsel')->store('system-question-images', 'public');
        }

        if (!$request->filled('soru_metni') && !$gorselYolu) {
            return back()
                ->withInput()
                ->withErrors(['soru_metni' => 'Soru metni yazmalı ya da görsel eklemelisiniz.']);
        }

        $dosyaYolu = base_path('system_questions.php');

        $sorular = File::exists($dosyaYolu)
            ? include $dosyaYolu
            : [];

        $sorular[] = [
            'sinif' => $request->sinif,
            'ders' => $request->ders,
            'kazanim' => $request->kazanim,
            'zorluk' => $request->zorluk,
            'soru_metni' => $request->soru_metni ?? '',
            'gorsel' => $gorselYolu,
            'secenek_a' => $request->secenek_a,
            'secenek_b' => $request->secenek_b,
            'secenek_c' => $request->secenek_c,
            'secenek_d' => $request->secenek_d,
            'dogru_cevap' => $request->dogru_cevap,
        ];

        $icerik = "<?php\n\nreturn " . var_export($sorular, true) . ";\n";

        File::put($dosyaYolu, $icerik);

        return back()->with('success', 'Soru system_questions.php dosyasına başarıyla eklendi.');
    }
}