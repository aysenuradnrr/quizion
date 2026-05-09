<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizion — {{ $sinav->title }}</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@600;700;800&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Nunito',sans-serif;background:#F4F2FF;color:#24114f;min-height:100vh;}
.topbar{height:64px;background:#3A1C71;display:flex;align-items:center;padding:0 24px;gap:16px;position:fixed;top:0;left:0;right:0;z-index:100;box-shadow:0 4px 20px rgba(58,28,113,.35);}
.logo{font-family:'Baloo 2',cursive;font-size:1.6rem;font-weight:900;color:white;text-decoration:none;}
.logo span{color:#C084FC;}
.timer-box{margin-left:auto;background:rgba(255,255,255,.15);border:1px solid rgba(255,255,255,.25);border-radius:12px;padding:8px 18px;color:white;font-weight:900;font-size:1.1rem;font-family:'Baloo 2',cursive;letter-spacing:2px;}
.timer-box.urgent{background:rgba(239,68,68,.3);border-color:rgba(239,68,68,.5);animation:pulse .8s infinite;}
@keyframes pulse{0%,100%{opacity:1}50%{opacity:.7}}
.main{margin-top:64px;padding:28px 32px;max-width:860px;margin-left:auto;margin-right:auto;}
.sinav-header{background:white;border-radius:16px;padding:20px 24px;margin-bottom:22px;box-shadow:0 1px 8px rgba(58,28,113,.08);display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;}
.sinav-header h1{font-size:18px;font-weight:800;color:#24114f;}
.sinav-header p{font-size:13px;color:#6b7280;margin-top:3px;}
.progress-wrap{background:#EDE9FF;border-radius:8px;height:8px;margin-bottom:22px;overflow:hidden;}
.progress-fill{background:linear-gradient(90deg,#6C3FC5,#9B72E8);height:100%;border-radius:8px;transition:width .4s ease;}
.question-card{background:white;border-radius:16px;padding:24px;margin-bottom:18px;box-shadow:0 1px 8px rgba(58,28,113,.08);border:2px solid transparent;transition:border-color .2s;}
.question-card.answered{border-color:#9B72E8;}
.q-num{font-size:11px;font-weight:900;text-transform:uppercase;letter-spacing:1px;color:#9ca3af;margin-bottom:10px;}
.q-text{font-size:15px;font-weight:700;color:#24114f;line-height:1.7;margin-bottom:16px;}
.q-img{max-width:100%;border-radius:10px;margin-bottom:14px;display:block;}
.options{display:flex;flex-direction:column;gap:9px;}
.option-label{display:flex;align-items:center;gap:12px;padding:12px 16px;border:1.5px solid #EDE9FF;border-radius:12px;cursor:pointer;transition:all .2s;font-weight:700;font-size:14px;color:#374151;}
.option-label:hover{border-color:#9B72E8;background:#faf8ff;}
.option-label input[type=radio]{display:none;}
.option-label input[type=radio]:checked + .opt-bubble{background:#6C3FC5;color:white;border-color:#6C3FC5;}
.option-label:has(input:checked){border-color:#6C3FC5;background:#f5f0ff;}
.opt-bubble{width:30px;height:30px;border-radius:9px;border:2px solid #EDE9FF;display:flex;align-items:center;justify-content:center;font-weight:900;font-size:13px;flex-shrink:0;transition:all .2s;color:#6C3FC5;}
.submit-area{text-align:center;margin-top:28px;}
.btn-submit{background:linear-gradient(135deg,#6C3FC5,#9B72E8);color:white;border:none;padding:16px 44px;border-radius:14px;font-size:16px;font-weight:900;cursor:pointer;font-family:'Nunito',sans-serif;box-shadow:0 8px 24px rgba(108,63,197,.3);transition:.2s;}
.btn-submit:hover{transform:translateY(-2px);box-shadow:0 12px 32px rgba(108,63,197,.4);}
.answered-count{font-size:13px;color:#6b7280;font-weight:700;margin-top:12px;}
@media(max-width:640px){.main{padding:16px;}}
</style>
</head>
<body>
<div class="topbar">
    <a href="{{ route('home') }}" class="logo">Quiz<span>ion</span></a>
    <div class="timer-box" id="timerBox">⏱ <span id="timerDisplay">--:--</span></div>
</div>

<div class="main">
    <div class="sinav-header">
        <div>
            <h1>{{ $sinav->title }}</h1>
            <p>{{ $sinav->ders ?? 'Genel' }} · {{ $sinav->grade }}. Sınıf · {{ $sinav->duration }} dakika</p>
        </div>
        <div style="font-size:13px;color:#6b7280;font-weight:700;">
            Toplam: {{ $sorular->count() + count($manuelSorular) }} soru
        </div>
    </div>

    <div class="progress-wrap">
        <div class="progress-fill" id="progressBar" style="width:0%"></div>
    </div>

    <form action="{{ route('ogrenci.test.sonuc') }}" method="POST" id="sinavForm">
        @csrf

        {{-- KRITIK: online_exam_id buradan testSonuc'a taşınıyor — Analiz Odası için şart ──}}
        <input type="hidden" name="online_exam_id" value="{{ $sinav->id }}">

        {{-- Dersler bilgisi (boş ama gerekli) --}}
        <input type="hidden" name="dersler[]" value="{{ $sinav->ders ?? '' }}">

        {{-- DB'den gelen sorular --}}
        @foreach($sorular as $index => $soru)
        <div class="question-card" id="qcard-{{ $soru->id }}">
            <div class="q-num">Soru {{ $index + 1 }}</div>

            @if($soru->gorsel)
                <img src="{{ asset($soru->gorsel) }}" class="q-img" alt="Soru görseli">
            @endif

            @if($soru->soru_metni)
                <div class="q-text">{{ $soru->soru_metni }}</div>
            @endif

            <input type="hidden" name="question_ids[]" value="{{ $soru->id }}">

            <div class="options">
                @foreach(['A' => $soru->secenek_a, 'B' => $soru->secenek_b, 'C' => $soru->secenek_c, 'D' => $soru->secenek_d] as $harf => $secenek)
                <label class="option-label" onclick="markAnswered('qcard-{{ $soru->id }}')">
                    <input type="radio" name="soru_{{ $soru->id }}" value="{{ $harf }}">
                    <div class="opt-bubble">{{ $harf }}</div>
                    {{ $secenek }}
                </label>
                @endforeach
            </div>
        </div>
        @endforeach

        {{-- Manuel (JSON) sorular — Analiz için dogru_cevap kontrolü yapılamaz, sadece gösterim --}}
        @foreach($manuelSorular as $mi => $msoru)
        @php $mIndex = $sorular->count() + $mi; @endphp
        <div class="question-card" id="qcard-manual-{{ $mi }}">
            <div class="q-num">Soru {{ $mIndex + 1 }} <span style="color:#C084FC;">(Öğretmen Sorusu)</span></div>
            <div class="q-text">{{ $msoru['soru_metni'] ?? '' }}</div>

            <div class="options">
                @foreach(['A' => ($msoru['secenek_a'] ?? ''), 'B' => ($msoru['secenek_b'] ?? ''), 'C' => ($msoru['secenek_c'] ?? ''), 'D' => ($msoru['secenek_d'] ?? '')] as $harf => $secenek)
                <label class="option-label" onclick="markAnswered('qcard-manual-{{ $mi }}')">
                    <input type="radio" name="manuel_{{ $mi }}" value="{{ $harf }}">
                    <div class="opt-bubble">{{ $harf }}</div>
                    {{ $secenek }}
                </label>
                @endforeach
            </div>
        </div>
        @endforeach

        <div class="submit-area">
            <button type="submit" class="btn-submit">✅ Sınavı Bitir ve Gönder</button>
            <div class="answered-count" id="answeredCount">0 / {{ $sorular->count() + count($manuelSorular) }} soru yanıtlandı</div>
        </div>
    </form>
</div>

<script>
const SURE_DAKIKA = {{ $sure }};
let kalan = SURE_DAKIKA * 60;
const toplam = {{ $sorular->count() + count($manuelSorular) }};

function updateTimer() {
    const d = document.getElementById('timerDisplay');
    const b = document.getElementById('timerBox');
    const dk = Math.floor(kalan / 60);
    const sn = kalan % 60;
    d.textContent = String(dk).padStart(2,'0') + ':' + String(sn).padStart(2,'0');

    if (kalan <= 60) b.classList.add('urgent');

    if (kalan <= 0) {
        document.getElementById('sinavForm').submit();
        return;
    }
    kalan--;
    setTimeout(updateTimer, 1000);
}

updateTimer();

function markAnswered(cardId) {
    document.getElementById(cardId)?.classList.add('answered');
    updateProgress();
}

function updateProgress() {
    const answered = document.querySelectorAll('.question-card.answered').length;
    const pct = toplam > 0 ? (answered / toplam * 100) : 0;
    document.getElementById('progressBar').style.width = pct + '%';
    document.getElementById('answeredCount').textContent = answered + ' / ' + toplam + ' soru yanıtlandı';
}
</script>
</body>
</html>
