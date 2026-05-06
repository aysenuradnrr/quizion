<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Test Çözmeye Başla</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@600;700;800&display=swap" rel="stylesheet">

<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{
  --pu:#3d1a8e;--pm:#6c35de;--pl:#9b6dff;
  --or:#f5a623;--gr:#3acaaa;--bg:#f4f0ff;
  --td:#1e0e4b;--tm:#5a4a7a;--bd:#ede7ff;
}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--td)}
.nav{height:64px;background:#280864;color:white;display:flex;align-items:center;justify-content:space-between;padding:0 28px;box-shadow:0 4px 25px rgba(20,0,60,.35)}
.logo{font-family:'Baloo 2';font-size:1.6rem;font-weight:800;text-decoration:none;color:white}
.logo span{color:var(--or)}
.back{color:white;text-decoration:none;background:rgba(255,255,255,.12);padding:9px 14px;border-radius:12px;font-weight:800}
.page{max-width:1200px;margin:0 auto;padding:34px 24px}
.hero{background:linear-gradient(135deg,#fff,#f8f4ff);border:1px solid var(--bd);border-radius:24px;padding:28px;box-shadow:0 10px 35px rgba(61,26,142,.12);margin-bottom:24px}
.hero h1{font-family:'Baloo 2';font-size:2rem;color:var(--pu)}
.hero p{color:var(--tm);font-weight:700;margin-top:4px}
.step{background:white;border:1px solid var(--bd);border-radius:22px;padding:24px;margin-bottom:22px;box-shadow:0 8px 25px rgba(61,26,142,.08)}
.step-title{font-family:'Baloo 2';font-size:1.35rem;margin-bottom:16px;color:var(--td)}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.card{border:2px solid var(--bd);background:#fff;border-radius:18px;padding:18px;cursor:pointer;transition:.25s;min-height:110px}
.card:hover{transform:translateY(-3px);border-color:var(--pl);box-shadow:0 10px 24px rgba(108,53,222,.13)}
.card.active{border-color:var(--pm);background:linear-gradient(135deg,rgba(108,53,222,.12),rgba(155,109,255,.06))}
.icon{font-size:2rem;margin-bottom:8px}
.card h3{font-weight:900;font-size:1rem}
.card p{font-size:.78rem;color:var(--tm);font-weight:700;margin-top:4px}
.level-count{width:100%;margin-top:12px;padding:13px;border-radius:12px;border:1.5px solid var(--bd);font-weight:900;font-size:1rem;color:var(--td)}
.submit-area{display:flex;justify-content:space-between;align-items:center;gap:16px;background:white;border:1px solid var(--bd);border-radius:22px;padding:20px;box-shadow:0 8px 25px rgba(61,26,142,.08)}
.summary{font-weight:800;color:var(--tm)}
.btn{border:none;background:linear-gradient(135deg,var(--pm),var(--pu));color:white;border-radius:15px;padding:14px 28px;font-weight:900;cursor:pointer;font-size:1rem;box-shadow:0 8px 22px rgba(108,53,222,.28)}
.btn:disabled{opacity:.45;cursor:not-allowed}
.hidden{display:none}
.alert{background:#fff7e8;border:1px solid #ffd89a;color:#7a4b00;border-radius:14px;padding:12px 15px;font-weight:800;margin-top:12px}
@media(max-width:800px){.grid{grid-template-columns:1fr}.submit-area{flex-direction:column;align-items:stretch}.btn{width:100%}}
</style>
</head>

<body>

<nav class="nav">
  <a href="{{ route('ogrenci.dashboard') }}" class="logo">Quiz<span>ion</span></a>
  <a href="{{ route('ogrenci.dashboard') }}" class="back">← Panele Dön</a>
</nav>

<div class="page">

  <div class="hero">
    <h1>🚀 Test Çözmeye Başla</h1>
    <p>Dersini, kazanımını ve soru dağılımını seç. Sistem sana uygun testi oluştursun.</p>
  </div>

  <form method="POST" action="{{ route('ogrenci.test.olustur') }}" id="testForm">
    @csrf

    <input type="hidden" name="ders" id="dersInput">
    <input type="hidden" name="kazanim" id="kazanimInput">
    <input type="hidden" name="kolay_sayisi" id="kolayInput" value="2">
    <input type="hidden" name="orta_sayisi" id="ortaInput" value="2">
    <input type="hidden" name="zor_sayisi" id="zorInput" value="1">

    <div class="step">
      <div class="step-title">1. Ders Seç</div>

      <div class="grid">
        @foreach($dersler as $ders)
          @php
            $icons = [
              'Matematik' => '📐',
              'Fen Bilimleri' => '🧬',
              'Türkçe' => '📖',
              'Sosyal Bilgiler' => '🌍',
              'İngilizce' => '🇬🇧'
            ];
          @endphp

          <div class="card ders-card" data-ders="{{ $ders }}">
            <div class="icon">{{ $icons[$ders] ?? '📚' }}</div>
            <h3>{{ $ders }}</h3>
            <p>Bu derse ait kazanımları gör</p>
          </div>
        @endforeach
      </div>
    </div>

    <div class="step hidden" id="kazanimStep">
      <div class="step-title">2. Kazanım Seç</div>

      <div class="grid">
        @foreach($kazanimlar as $item)
          <div class="card kazanim-card" data-ders="{{ $item->ders }}" data-kazanim="{{ $item->kazanim_adi }}" >
            <div class="icon">🎯</div>
            <h3>{{ $item->kazanim_adi }}</h3>
            <p>{{ $item->ders }}</p>
          </div>
        @endforeach
      </div>
    </div>

    <div class="step hidden" id="soruDagilimStep">
      <div class="step-title">3. Kaç Kolay / Orta / Zor Soru Olsun?</div>

      <div class="grid">
        <div class="card">
          <div class="icon">🟢</div>
          <h3>Kolay Sorular</h3>
          <p>Kaç kolay soru gelsin?</p>
          <input type="number" min="0" max="20" value="2" class="level-count" id="kolayCount">
        </div>

        <div class="card">
          <div class="icon">🟡</div>
          <h3>Orta Sorular</h3>
          <p>Kaç orta soru gelsin?</p>
          <input type="number" min="0" max="20" value="2" class="level-count" id="ortaCount">
        </div>

        <div class="card">
          <div class="icon">🔴</div>
          <h3>Zor Sorular</h3>
          <p>Kaç zor soru gelsin?</p>
          <input type="number" min="0" max="20" value="1" class="level-count" id="zorCount">
        </div>
      </div>

      <div class="alert" id="totalAlert">
        Toplam: 5 soru
      </div>
    </div>

    <div class="submit-area">
      <div class="summary" id="summaryText">
        Önce ders seçmelisin.
      </div>

      <button type="submit" class="btn" id="submitBtn" disabled>
        Test Oluştur →
      </button>
    </div>

  </form>
</div>

<script>
let selectedDers = '';
let selectedKazanim = '';

const dersInput = document.getElementById('dersInput');
const kazanimInput = document.getElementById('kazanimInput');

const kolayInput = document.getElementById('kolayInput');
const ortaInput = document.getElementById('ortaInput');
const zorInput = document.getElementById('zorInput');

const kolayCount = document.getElementById('kolayCount');
const ortaCount = document.getElementById('ortaCount');
const zorCount = document.getElementById('zorCount');

const totalAlert = document.getElementById('totalAlert');
const summaryText = document.getElementById('summaryText');
const submitBtn = document.getElementById('submitBtn');

function updateTotal(){
  const kolay = parseInt(kolayCount.value || 0);
  const orta = parseInt(ortaCount.value || 0);
  const zor = parseInt(zorCount.value || 0);
  const toplam = kolay + orta + zor;

  kolayInput.value = kolay;
  ortaInput.value = orta;
  zorInput.value = zor;

  totalAlert.innerText = 'Toplam: ' + toplam + ' soru';
  updateSummary();
}

function updateSummary(){
  const kolay = parseInt(kolayInput.value || 0);
  const orta = parseInt(ortaInput.value || 0);
  const zor = parseInt(zorInput.value || 0);
  const toplam = kolay + orta + zor;

  if(!selectedDers){
    summaryText.innerText = 'Önce ders seçmelisin.';
    submitBtn.disabled = true;
    return;
  }

  if(!selectedKazanim){
    summaryText.innerText = selectedDers + ' seçildi. Şimdi kazanım seç.';
    submitBtn.disabled = true;
    return;
  }

  if(toplam <= 0){
    summaryText.innerText = 'En az 1 soru seçmelisin.';
    submitBtn.disabled = true;
    return;
  }

  summaryText.innerText =
    selectedDers + ' / ' +
    selectedKazanim + ' / ' +
    kolay + ' kolay, ' +
    orta + ' orta, ' +
    zor + ' zor soru';

  submitBtn.disabled = false;
}

document.querySelectorAll('.ders-card').forEach(card => {
  card.addEventListener('click', () => {
    selectedDers = card.dataset.ders;
    selectedKazanim = '';

    dersInput.value = selectedDers;
    kazanimInput.value = '';

    document.querySelectorAll('.ders-card').forEach(c => c.classList.remove('active'));
    card.classList.add('active');

    document.querySelectorAll('.kazanim-card').forEach(k => {
      k.classList.remove('active');
      k.style.display = k.dataset.ders === selectedDers ? 'block' : 'none';
    });

    document.getElementById('kazanimStep').classList.remove('hidden');
    document.getElementById('soruDagilimStep').classList.add('hidden');

    updateSummary();
  });
});

document.querySelectorAll('.kazanim-card').forEach(card => {
  card.addEventListener('click', () => {
    selectedKazanim = card.dataset.kazanim;
    kazanimInput.value = selectedKazanim;

    document.querySelectorAll('.kazanim-card').forEach(c => c.classList.remove('active'));
    card.classList.add('active');

    document.getElementById('soruDagilimStep').classList.remove('hidden');

    updateTotal();
  });
});

[kolayCount, ortaCount, zorCount].forEach(input => {
  input.addEventListener('input', updateTotal);
});

updateSummary();
</script>

</body>
</html>