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
  --or:#f5a623;--gr:#3acaaa;--bg:#f5f2ff;
  --td:#1e0e4b;--tm:#6b5b88;--bd:#e8defd;
}
body{font-family:'Nunito',sans-serif;background:linear-gradient(135deg,#f7f3ff,#fff7ea);color:var(--td)}
.nav{height:66px;background:#280864;color:white;display:flex;align-items:center;justify-content:space-between;padding:0 34px;box-shadow:0 8px 28px rgba(20,0,60,.3)}
.logo{font-family:'Baloo 2';font-size:1.7rem;font-weight:800;text-decoration:none;color:white}
.logo span{color:var(--or)}
.back{color:white;text-decoration:none;background:rgba(255,255,255,.14);padding:10px 15px;border-radius:14px;font-weight:900}
.page{max-width:1280px;margin:0 auto;padding:34px 24px}
.hero{display:flex;justify-content:space-between;gap:20px;align-items:center;background:white;border:1px solid var(--bd);border-radius:28px;padding:26px 30px;box-shadow:0 12px 35px rgba(61,26,142,.11);margin-bottom:24px}
.hero h1{font-family:'Baloo 2';font-size:2rem;color:var(--pu)}
.hero p{color:var(--tm);font-weight:800;margin-top:3px}
.hero-badge{background:linear-gradient(135deg,var(--or),#ffcf6b);padding:12px 16px;border-radius:18px;font-weight:900;color:#4d2c00;white-space:nowrap}

.layout{display:grid;grid-template-columns:1fr 330px;gap:22px;align-items:start}
.step{background:rgba(255,255,255,.9);backdrop-filter:blur(10px);border:1px solid var(--bd);border-radius:26px;padding:22px;margin-bottom:18px;box-shadow:0 10px 30px rgba(61,26,142,.08)}
.step-head{display:flex;align-items:center;gap:12px;margin-bottom:16px}
.step-no{width:34px;height:34px;border-radius:12px;background:linear-gradient(135deg,var(--pm),var(--pu));color:white;display:flex;align-items:center;justify-content:center;font-weight:900}
.step-title{font-family:'Baloo 2';font-size:1.3rem;color:var(--td)}
.step-desc{font-size:.9rem;color:var(--tm);font-weight:800;margin-left:46px;margin-top:-8px;margin-bottom:16px}

.grid{display:grid;grid-template-columns:repeat(5,1fr);gap:12px}
.card{border:2px solid var(--bd);background:#fff;border-radius:20px;padding:15px;cursor:pointer;transition:.22s;min-height:102px;display:block;position:relative}
.card:hover{transform:translateY(-3px);border-color:var(--pl);box-shadow:0 12px 24px rgba(108,53,222,.13)}
.card.active{border-color:var(--pm);background:linear-gradient(135deg,rgba(108,53,222,.13),rgba(245,166,35,.08))}
.card.active:after{content:"✓";position:absolute;top:10px;right:10px;background:var(--pm);color:white;width:24px;height:24px;border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:900}
.icon{font-size:1.8rem;margin-bottom:6px}
.card h3{font-weight:900;font-size:.95rem;line-height:1.2}
.card p{font-size:.76rem;color:var(--tm);font-weight:800;margin-top:4px}

.kazanim-group{margin-top:16px}
.kazanim-title{font-family:'Baloo 2';font-size:1.12rem;color:var(--pu);margin:8px 0 10px}
.kazanim-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px}
.kazanim-card{min-height:88px}

.level-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px}
.level-card{background:#fff;border:1px solid var(--bd);border-radius:20px;padding:18px}
.level-card h3{font-weight:900;font-size:1rem}
.level-card p{font-size:.8rem;color:var(--tm);font-weight:800;margin-top:3px}
.level-count{width:100%;margin-top:12px;padding:13px;border-radius:14px;border:1.5px solid var(--bd);font-weight:900;font-size:1rem;color:var(--td)}

.time-box{
  margin-top:14px;
  background:linear-gradient(135deg,#fff,#f7f2ff);
  border:1px solid var(--bd);
  border-radius:20px;
  padding:18px;
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:16px;
}
.time-box h3{font-weight:900;font-size:1rem}
.time-box p{font-size:.82rem;color:var(--tm);font-weight:800;margin-top:4px}
.time-input{
  width:130px;
  padding:13px;
  border-radius:14px;
  border:1.5px solid var(--bd);
  font-weight:900;
  font-size:1rem;
  color:var(--td);
}

.side{position:sticky;top:86px;background:#fff;border:1px solid var(--bd);border-radius:28px;padding:22px;box-shadow:0 14px 35px rgba(61,26,142,.13)}
.side h2{font-family:'Baloo 2';font-size:1.45rem;color:var(--pu);margin-bottom:8px}
.summary{font-weight:900;color:var(--tm);line-height:1.45;margin-bottom:14px}
.total{background:#fff7e8;border:1px solid #ffd89a;color:#7a4b00;border-radius:16px;padding:12px 14px;font-weight:900;margin-bottom:14px}
.btn{width:100%;border:none;background:linear-gradient(135deg,var(--pm),var(--pu));color:white;border-radius:17px;padding:15px 22px;font-weight:900;cursor:pointer;font-size:1rem;box-shadow:0 10px 24px rgba(108,53,222,.28)}
.btn:disabled{opacity:.45;cursor:not-allowed}
.hidden{display:none!important}
.hidden-check{display:none}

@media(max-width:1050px){
  .layout{grid-template-columns:1fr}
  .side{position:static}
  .grid{grid-template-columns:repeat(2,1fr)}
  .kazanim-grid{grid-template-columns:repeat(2,1fr)}
}
@media(max-width:650px){
  .hero{flex-direction:column;align-items:flex-start}
  .grid,.kazanim-grid,.level-grid{grid-template-columns:1fr}
  .time-box{flex-direction:column;align-items:stretch}
  .time-input{width:100%}
  .nav{padding:0 18px}
}
</style>
</head>

<body>

<nav class="nav">
  <a href="{{ route('ogrenci.dashboard') }}" class="logo">Quiz<span>ion</span></a>
  <a href="{{ route('ogrenci.dashboard') }}" class="back">← Panele Dön</a>
</nav>

<div class="page">

  <div class="hero">
    <div>
      <h1>🚀 Test Çözmeye Başla</h1>
      <p>Birden fazla ders ve kazanım seçerek sana özel test oluştur.</p>
    </div>
    <div class="hero-badge">Akıllı test oluşturucu</div>
  </div>

  <form method="POST" action="{{ route('ogrenci.test.olustur') }}" id="testForm">
    @csrf

    <input type="hidden" name="kolay_sayisi" id="kolayInput" value="2">
    <input type="hidden" name="orta_sayisi" id="ortaInput" value="2">
    <input type="hidden" name="zor_sayisi" id="zorInput" value="1">
    <input type="hidden" name="sure" id="sureInput" value="20">

    <div class="layout">

      <div class="main">

        <div class="step">
          <div class="step-head">
            <div class="step-no">1</div>
            <div class="step-title">Ders Seç</div>
          </div>
          <div class="step-desc">İstersen birden fazla ders seçebilirsin.</div>

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

              <label class="card ders-card" data-ders="{{ $ders }}">
                <input type="checkbox" name="dersler[]" value="{{ $ders }}" class="hidden-check ders-check">
                <div class="icon">{{ $icons[$ders] ?? '📚' }}</div>
                <h3>{{ $ders }}</h3>
                <p>Kazanımlarını göster</p>
              </label>
            @endforeach
          </div>
        </div>

        <div class="step hidden" id="kazanimStep">
          <div class="step-head">
            <div class="step-no">2</div>
            <div class="step-title">Kazanım Seç</div>
          </div>
          <div class="step-desc">Seçtiğin her dersin kazanımları ayrı ayrı listelenir.</div>

          @foreach($kazanimlar->groupBy('ders') as $dersAdi => $items)
            <div class="kazanim-group hidden" data-group-ders="{{ $dersAdi }}">
              <div class="kazanim-title">{{ $dersAdi }}</div>

              <div class="kazanim-grid">
                @foreach($items as $item)
                  <label class="card kazanim-card" data-ders="{{ $item->ders }}" data-kazanim="{{ $item->kazanim_adi }}">
                    <input type="checkbox" name="kazanimlar[]" value="{{ $item->kazanim_adi }}" class="hidden-check kazanim-check">
                    <div class="icon">🎯</div>
                    <h3>{{ $item->kazanim_adi }}</h3>
                    <p>{{ $item->ders }}</p>
                  </label>
                @endforeach
              </div>
            </div>
          @endforeach
        </div>

        <div class="step hidden" id="soruDagilimStep">
          <div class="step-head">
            <div class="step-no">3</div>
            <div class="step-title">Zorluk ve Süre</div>
          </div>
          <div class="step-desc">Testte kaç soru olacağını ve süreni belirle.</div>

          <div class="level-grid">
            <div class="level-card">
              <div class="icon">🟢</div>
              <h3>Kolay</h3>
              <p>Temel seviye sorular</p>
              <input type="number" min="0" max="20" value="2" class="level-count" id="kolayCount">
            </div>

            <div class="level-card">
              <div class="icon">🟡</div>
              <h3>Orta</h3>
              <p>Normal seviye sorular</p>
              <input type="number" min="0" max="20" value="2" class="level-count" id="ortaCount">
            </div>

            <div class="level-card">
              <div class="icon">🔴</div>
              <h3>Zor</h3>
              <p>Seçici sorular</p>
              <input type="number" min="0" max="20" value="1" class="level-count" id="zorCount">
            </div>
          </div>

          <div class="time-box">
            <div>
              <h3>⏱️ Test Süresi</h3>
              <p>Test için dakika cinsinden süre belirle.</p>
            </div>

            <input type="number" min="1" max="180" value="20" id="sureCount" class="time-input">
          </div>
        </div>

      </div>

      <aside class="side">
        <h2>Test Özeti</h2>
        <div class="summary" id="summaryText">Önce en az 1 ders seçmelisin.</div>
        <div class="total" id="totalAlert">Toplam: 5 soru</div>

        <button type="submit" class="btn" id="submitBtn" disabled>
          Test Oluştur →
        </button>
      </aside>

    </div>
  </form>
</div>

<script>
let selectedDersler = [];
let selectedKazanimlar = [];

const kolayInput = document.getElementById('kolayInput');
const ortaInput = document.getElementById('ortaInput');
const zorInput = document.getElementById('zorInput');
const sureInput = document.getElementById('sureInput');

const kolayCount = document.getElementById('kolayCount');
const ortaCount = document.getElementById('ortaCount');
const zorCount = document.getElementById('zorCount');
const sureCount = document.getElementById('sureCount');

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
  const sure = parseInt(sureInput.value || 20);

  if(selectedDersler.length === 0){
    summaryText.innerText = 'Önce en az 1 ders seçmelisin.';
    submitBtn.disabled = true;
    return;
  }

  if(selectedKazanimlar.length === 0){
    summaryText.innerText = selectedDersler.length + ' ders seçildi. Şimdi kazanım seç.';
    submitBtn.disabled = true;
    return;
  }

  if(toplam <= 0){
    summaryText.innerText = 'En az 1 soru seçmelisin.';
    submitBtn.disabled = true;
    return;
  }

  if(sure <= 0){
    summaryText.innerText = 'Test süresi en az 1 dakika olmalı.';
    submitBtn.disabled = true;
    return;
  }

  summaryText.innerText =
    selectedDersler.length + ' ders, ' +
    selectedKazanimlar.length + ' kazanım seçildi. ' +
    kolay + ' kolay, ' +
    orta + ' orta, ' +
    zor + ' zor soru. ' +
    'Süre: ' + sure + ' dakika.';

  submitBtn.disabled = false;
}

function filterKazanims(){
  document.querySelectorAll('.kazanim-group').forEach(group => {
    const ders = group.dataset.groupDers;

    if(selectedDersler.includes(ders)){
      group.classList.remove('hidden');
    } else {
      group.classList.add('hidden');

      group.querySelectorAll('.kazanim-card').forEach(card => {
        card.classList.remove('active');
        card.querySelector('.kazanim-check').checked = false;
      });
    }
  });

  selectedKazanimlar = Array.from(document.querySelectorAll('.kazanim-check:checked'))
    .map(input => input.value);

  if(selectedDersler.length > 0){
    document.getElementById('kazanimStep').classList.remove('hidden');
  } else {
    document.getElementById('kazanimStep').classList.add('hidden');
    document.getElementById('soruDagilimStep').classList.add('hidden');
  }

  if(selectedKazanimlar.length === 0){
    document.getElementById('soruDagilimStep').classList.add('hidden');
  }
}

document.querySelectorAll('.ders-card').forEach(card => {
  card.addEventListener('click', () => {
    setTimeout(() => {
      selectedDersler = Array.from(document.querySelectorAll('.ders-check:checked'))
        .map(input => input.value);

      if(card.querySelector('.ders-check').checked){
        card.classList.add('active');
      } else {
        card.classList.remove('active');
      }

      filterKazanims();
      updateSummary();
    }, 0);
  });
});

document.querySelectorAll('.kazanim-card').forEach(card => {
  card.addEventListener('click', () => {
    setTimeout(() => {
      selectedKazanimlar = Array.from(document.querySelectorAll('.kazanim-check:checked'))
        .map(input => input.value);

      if(card.querySelector('.kazanim-check').checked){
        card.classList.add('active');
      } else {
        card.classList.remove('active');
      }

      if(selectedKazanimlar.length > 0){
        document.getElementById('soruDagilimStep').classList.remove('hidden');
      } else {
        document.getElementById('soruDagilimStep').classList.add('hidden');
      }

      updateTotal();
    }, 0);
  });
});

[kolayCount, ortaCount, zorCount].forEach(input => {
  input.addEventListener('input', updateTotal);
});

sureCount.addEventListener('input', () => {
  sureInput.value = sureCount.value || 20;
  updateSummary();
});

filterKazanims();
updateSummary();
</script>

</body>
</html>