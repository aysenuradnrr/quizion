<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Test Çöz</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@600;700;800&display=swap" rel="stylesheet">

<style>
*{margin:0;padding:0;box-sizing:border-box}
:root{
  --pu:#3d1a8e;--pm:#6c35de;--pl:#9b6dff;--bg:#f4f0ff;
  --td:#1e0e4b;--tm:#5a4a7a;--bd:#ede7ff;--or:#f5a623;
  --ok:#36c98f;--red:#f04848;
}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--td)}
.nav{height:70px;background:#2b0a69;display:flex;align-items:center;justify-content:space-between;padding:0 30px;box-shadow:0 4px 25px rgba(0,0,0,.2)}
.logo{font-family:'Baloo 2';font-size:2rem;color:white;text-decoration:none;font-weight:800}
.logo span{color:var(--or)}
.back{background:rgba(255,255,255,.13);color:white;text-decoration:none;padding:11px 16px;border-radius:14px;font-weight:800}
.page{max-width:1100px;margin:auto;padding:30px 24px 60px}
.hero{background:linear-gradient(135deg,#fff,#f7f2ff);border-radius:28px;padding:28px;border:1px solid var(--bd);box-shadow:0 12px 35px rgba(61,26,142,.1);margin-bottom:24px}
.hero-top{display:flex;justify-content:space-between;align-items:center;gap:20px}
.hero h1{font-family:'Baloo 2';font-size:2.1rem;color:var(--pu)}
.hero p{margin-top:6px;color:var(--tm);font-weight:800}
.badge{padding:8px 14px;border-radius:999px;font-weight:900;font-size:.85rem}
.easy{background:#dcfff0;color:#007847}.medium{background:#fff5d9;color:#8a5b00}.hard{background:#ffe0e0;color:#9b0000}
.progress-wrap{margin-top:22px}
.progress-info{display:flex;justify-content:space-between;font-weight:900;color:var(--tm);margin-bottom:8px}
.progress-line{height:10px;background:#ece3ff;border-radius:99px;overflow:hidden}
.progress-fill{height:100%;width:0%;background:linear-gradient(90deg,var(--pm),var(--pl));border-radius:99px;transition:.3s}

.question-card{background:white;border-radius:28px;border:1px solid var(--bd);padding:30px;box-shadow:0 12px 35px rgba(61,26,142,.1);min-height:430px}
.q-slide{display:none}
.q-slide.active{display:block}
.q-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:24px}
.q-number{background:linear-gradient(135deg,var(--pm),var(--pu));color:white;width:58px;height:58px;border-radius:18px;display:flex;align-items:center;justify-content:center;font-weight:900;font-size:1.35rem}
.question-text{font-size:1.25rem;line-height:1.7;font-weight:900;margin-bottom:24px}
.options{display:grid;gap:14px}
.option input{display:none}
.option label{display:flex;align-items:center;gap:14px;padding:18px;border:2px solid var(--bd);border-radius:18px;cursor:pointer;transition:.25s;background:white;font-weight:800}
.option label:hover{border-color:var(--pl);transform:translateY(-2px)}
.option input:checked + label{border-color:var(--pm);background:rgba(108,53,222,.09)}
.choice{width:40px;height:40px;border-radius:13px;background:#f3eeff;display:flex;align-items:center;justify-content:center;font-weight:900;color:var(--pm);flex-shrink:0}

.navigator{background:white;border:1px solid var(--bd);border-radius:24px;padding:18px;margin-top:20px;display:flex;align-items:center;justify-content:space-between;gap:14px;box-shadow:0 14px 35px rgba(61,26,142,.12)}
.nav-left,.nav-right{display:flex;gap:10px;align-items:center;flex-wrap:wrap}
.btn{border:none;border-radius:15px;padding:13px 20px;font-weight:900;cursor:pointer;font-size:.95rem}
.btn-soft{background:#f3eeff;color:var(--pm)}
.btn-main{background:linear-gradient(135deg,var(--pm),var(--pu));color:white;box-shadow:0 10px 25px rgba(108,53,222,.3)}
.btn-warn{background:#fff3d8;color:#8a5b00}
.btn:disabled{opacity:.45;cursor:not-allowed}
.counter{font-weight:900;color:var(--tm)}
.dots{display:flex;gap:7px;justify-content:center;margin-top:18px;flex-wrap:wrap}
.dot{width:34px;height:34px;border-radius:10px;border:2px solid var(--bd);display:flex;align-items:center;justify-content:center;font-weight:900;color:var(--tm);cursor:pointer;background:white}
.dot.active{border-color:var(--pm);background:rgba(108,53,222,.12);color:var(--pm)}
.dot.answered{background:#dcfff0;border-color:#9beac9;color:#007847}

.empty{background:white;border-radius:30px;padding:70px 30px;text-align:center;border:1px solid var(--bd)}
.empty h2{color:var(--pu);margin-bottom:10px;font-size:2rem}
.empty p{color:var(--tm);font-weight:700;margin-bottom:20px}
.empty a{display:inline-block;text-decoration:none;background:linear-gradient(135deg,var(--pm),var(--pu));color:white;padding:14px 22px;border-radius:14px;font-weight:900}

.modal-bg{display:none;position:fixed;inset:0;background:rgba(20,0,60,.55);z-index:999;align-items:center;justify-content:center;padding:20px}
.modal{background:white;border-radius:26px;padding:28px;max-width:460px;width:100%;box-shadow:0 25px 70px rgba(0,0,0,.25)}
.modal h2{font-family:'Baloo 2';color:var(--pu);font-size:1.8rem}
.modal p{color:var(--tm);font-weight:800;margin:10px 0 20px;line-height:1.6}
.modal-actions{display:flex;gap:10px;justify-content:flex-end}

@media(max-width:800px){
  .hero-top,.navigator{flex-direction:column;align-items:stretch}
  .nav-left,.nav-right{justify-content:center}
}
</style>
</head>

<body>

<nav class="nav">
  <a href="{{ route('ogrenci.dashboard') }}" class="logo">Quiz<span>ion</span></a>
  <a href="{{ route('ogrenci.dashboard') }}" class="back">← Panele Dön</a>
</nav>

<div class="page">

@if($questions->count() == 0)

<div class="empty">
  <h2>😕 Soru Bulunamadı</h2>
  <p>Bu ders, kazanım veya zorluk dağılımı için sistemde yeterli soru yok.</p>
  <a href="{{ route('ogrenci.test.baslat') }}">Yeni Test Oluştur</a>
</div>

@else

<div class="hero">
  <div class="hero-top">
    <div>
      <h1>🚀 {{ $ders }} Testi</h1>
      <p>Kazanım: <strong>{{ $kazanim }}</strong></p>
    </div>
    <div class="badge easy">{{ $questions->count() }} Soru</div>
  </div>

  <div class="progress-wrap">
    <div class="progress-info">
      <span id="progressText">Soru 1 / {{ $questions->count() }}</span>
      <span id="answeredText">0 cevaplandı</span>
    </div>
    <div class="progress-line">
      <div class="progress-fill" id="progressFill"></div>
    </div>
  </div>
</div>

<form id="quizForm">

  <div class="question-card">

    @foreach($questions as $index => $question)
    <div class="q-slide {{ $index == 0 ? 'active' : '' }}" data-index="{{ $index }}">

      <div class="q-top">
        <div class="q-number">{{ $index + 1 }}</div>

        @if($question->zorluk == 'Kolay')
          <div class="badge easy">🟢 Kolay</div>
        @elseif($question->zorluk == 'Orta')
          <div class="badge medium">🟡 Orta</div>
        @else
          <div class="badge hard">🔴 Zor</div>
        @endif
      </div>

      <div class="question-text">
        {{ $question->soru_metni }}
      </div>

      <div class="options">
        <div class="option">
          <input type="radio" id="a{{ $question->id }}" name="soru_{{ $question->id }}" value="A">
          <label for="a{{ $question->id }}"><div class="choice">A</div>{{ $question->secenek_a }}</label>
        </div>

        <div class="option">
          <input type="radio" id="b{{ $question->id }}" name="soru_{{ $question->id }}" value="B">
          <label for="b{{ $question->id }}"><div class="choice">B</div>{{ $question->secenek_b }}</label>
        </div>

        <div class="option">
          <input type="radio" id="c{{ $question->id }}" name="soru_{{ $question->id }}" value="C">
          <label for="c{{ $question->id }}"><div class="choice">C</div>{{ $question->secenek_c }}</label>
        </div>

        <div class="option">
          <input type="radio" id="d{{ $question->id }}" name="soru_{{ $question->id }}" value="D">
          <label for="d{{ $question->id }}"><div class="choice">D</div>{{ $question->secenek_d }}</label>
        </div>
      </div>

    </div>
    @endforeach

  </div>

  <div class="dots" id="dots">
    @foreach($questions as $index => $question)
      <div class="dot {{ $index == 0 ? 'active' : '' }}" data-go="{{ $index }}">{{ $index + 1 }}</div>
    @endforeach
  </div>

  <div class="navigator">
    <div class="nav-left">
      <button type="button" class="btn btn-soft" id="prevBtn">← Önceki</button>
      <button type="button" class="btn btn-warn" id="skipBtn">Atla</button>
    </div>

    <div class="counter" id="counterText">1. sorudasın</div>

    <div class="nav-right">
      <button type="button" class="btn btn-soft" id="nextBtn">Sonraki →</button>
      <button type="button" class="btn btn-main" id="finishBtn">Testi Bitir</button>
    </div>
  </div>

</form>

@endif

</div>

<div class="modal-bg" id="finishModal">
  <div class="modal">
    <h2>Testi bitirmek istiyor musun?</h2>
    <p id="modalText">Cevap durumun burada görünecek.</p>
    <div class="modal-actions">
      <button type="button" class="btn btn-soft" onclick="closeModal()">Devam Et</button>
      <button type="button" class="btn btn-main" onclick="alert('Sonuç hesaplama kısmını sonraki adımda veritabanına bağlayacağız.')">Bitir</button>
    </div>
  </div>
</div>

<script>
const total = {{ $questions->count() }};
let current = 0;

const slides = document.querySelectorAll('.q-slide');
const dots = document.querySelectorAll('.dot');
const progressFill = document.getElementById('progressFill');
const progressText = document.getElementById('progressText');
const answeredText = document.getElementById('answeredText');
const counterText = document.getElementById('counterText');
const prevBtn = document.getElementById('prevBtn');
const nextBtn = document.getElementById('nextBtn');
const skipBtn = document.getElementById('skipBtn');
const finishModal = document.getElementById('finishModal');
const modalText = document.getElementById('modalText');

function answeredCount(){
  let count = 0;
  slides.forEach(slide => {
    if(slide.querySelector('input[type="radio"]:checked')) count++;
  });
  return count;
}

function refresh(){
  slides.forEach(s => s.classList.remove('active'));
  dots.forEach(d => d.classList.remove('active'));

  slides[current].classList.add('active');
  dots[current].classList.add('active');

  slides.forEach((slide, i) => {
    if(slide.querySelector('input[type="radio"]:checked')){
      dots[i].classList.add('answered');
    }else{
      dots[i].classList.remove('answered');
    }
  });

  const percent = ((current + 1) / total) * 100;
  progressFill.style.width = percent + '%';
  progressText.innerText = 'Soru ' + (current + 1) + ' / ' + total;
  answeredText.innerText = answeredCount() + ' cevaplandı';
  counterText.innerText = (current + 1) + '. sorudasın';

  prevBtn.disabled = current === 0;
  nextBtn.disabled = current === total - 1;
}

prevBtn.addEventListener('click', () => {
  if(current > 0){
    current--;
    refresh();
  }
});

nextBtn.addEventListener('click', () => {
  if(current < total - 1){
    current++;
    refresh();
  }
});

skipBtn.addEventListener('click', () => {
  if(current < total - 1){
    current++;
  }
  refresh();
});

dots.forEach(dot => {
  dot.addEventListener('click', () => {
    current = parseInt(dot.dataset.go);
    refresh();
  });
});

document.querySelectorAll('input[type="radio"]').forEach(input => {
  input.addEventListener('change', refresh);
});

document.getElementById('finishBtn')?.addEventListener('click', () => {
  const answered = answeredCount();
  const empty = total - answered;
  modalText.innerText = answered + ' soru cevapladın, ' + empty + ' soru boş. Testi bitirmek istediğine emin misin?';
  finishModal.style.display = 'flex';
});

function closeModal(){
  finishModal.style.display = 'none';
}

refresh();
</script>

</body>
</html>