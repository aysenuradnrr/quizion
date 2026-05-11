<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Test Sonucu</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@600;700;800&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}
:root{--pu:#3d1a8e;--pm:#6c35de;--pl:#9b6dff;--or:#f5a623;--bg:#f5f2ff;--td:#1e0e4b;--tm:#6b5b88;--bd:#e8defd;}
body{font-family:'Nunito',sans-serif;background:linear-gradient(135deg,#f7f3ff,#fff7ea);color:var(--td);}
.nav{height:66px;background:#280864;color:white;display:flex;align-items:center;justify-content:space-between;padding:0 34px;box-shadow:0 8px 28px rgba(20,0,60,.3);}
.logo{font-family:'Baloo 2';font-size:1.7rem;font-weight:800;text-decoration:none;color:white;}
.logo span{color:var(--or)}
.back{color:white;text-decoration:none;background:rgba(255,255,255,.14);padding:10px 15px;border-radius:14px;font-weight:900;}
.page{max-width:1100px;margin:0 auto;padding:34px 24px 60px;}
.hero{background:white;border:1px solid var(--bd);border-radius:30px;padding:30px;box-shadow:0 14px 35px rgba(61,26,142,.12);margin-bottom:24px;}
.hero h1{font-family:'Baloo 2';color:var(--pu);font-size:2.2rem;}
.hero p{color:var(--tm);font-weight:800;margin-top:4px;}
.stats{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-top:22px;}
.stat{background:#f7f2ff;border:1px solid var(--bd);border-radius:22px;padding:20px;text-align:center;}
.stat h2{font-size:2rem;color:var(--pm);}
.stat p{font-weight:900;color:var(--tm);}
.result-list{display:grid;gap:16px;}
.question{background:white;border:1px solid var(--bd);border-radius:24px;padding:22px;box-shadow:0 10px 28px rgba(61,26,142,.08);}
.q-head{display:flex;justify-content:space-between;gap:12px;align-items:center;margin-bottom:12px;}
.q-head h3{font-size:1.05rem;line-height:1.5;}
.badge{padding:8px 12px;border-radius:999px;font-weight:900;white-space:nowrap;}
.badge.ok{background:#dcfff0;color:#08784d}.badge.wrong{background:#ffe0e0;color:#a10000}.badge.empty{background:#fff3d8;color:#8a5b00}
.answers{display:grid;grid-template-columns:repeat(2,1fr);gap:12px;margin-top:14px;}
.answer-box{background:#faf8ff;border:1px solid var(--bd);border-radius:16px;padding:14px;font-weight:800;color:var(--tm);}
.answer-box strong{display:block;color:var(--td);margin-bottom:5px;}
.actions{margin-top:24px;display:flex;gap:12px;flex-wrap:wrap;}
.btn{text-decoration:none;border:none;border-radius:16px;padding:14px 22px;font-weight:900;cursor:pointer;}
.btn-main{background:linear-gradient(135deg,var(--pm),var(--pu));color:white;box-shadow:0 10px 24px rgba(108,53,222,.28);}
.btn-soft{background:#f3eeff;color:var(--pm);}
@media(max-width:800px){.stats,.answers{grid-template-columns:1fr}.q-head{flex-direction:column;align-items:flex-start}}
</style>
</head>
<body>
<nav class="nav">
  <a href="{{ route('ogrenci.dashboard') }}" class="logo">Quiz<span>ion</span></a>
  <a href="{{ route('ogrenci.dashboard') }}" class="back">← Panele Dön</a>
</nav>

<div class="page">
  <div class="hero">
    <h1>Test Sonucun</h1>
    <p>Test tamamlandı. Doğru, yanlış ve boş cevaplarını aşağıda görebilirsin.</p>

    <div class="stats">
      <div class="stat"><h2>{{ $puan }}</h2><p>Puan</p></div>
      <div class="stat"><h2>{{ $dogru }}</h2><p>Doğru</p></div>
      <div class="stat"><h2>{{ $yanlis }}</h2><p>Yanlış</p></div>
      <div class="stat"><h2>{{ $bos }}</h2><p>Boş</p></div>
    </div>

    <div class="actions">
      <a href="{{ route('ogrenci.dashboard') }}" class="btn btn-main">Panele Dön</a>
    </div>
  </div>

  @if(!empty($yanlisKazanimlar) && count($yanlisKazanimlar) > 0)
    <div class="hero" style="margin-top:24px;">
      <h1 style="font-size:1.6rem;">📌 Yanlış Yapılan Kazanımlar</h1>
      <p>Yanlış cevapların en çok bu kazanımlardan geldi.</p>

      <div class="result-list" style="margin-top:18px;">
        @foreach($yanlisKazanimlar as $kazanimAdi => $adet)
          <div class="question">
            <div class="q-head">
              <h3>{{ $kazanimAdi }}</h3>
              <span class="badge wrong">{{ $adet }} yanlış</span>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  @endif

  <div class="result-list">
    @foreach($sonuclar as $index => $item)
      @php
        $durumClass = $item['durum'] === 'Doğru' ? 'ok' : ($item['durum'] === 'Yanlış' ? 'wrong' : 'empty');
        $soru = $item['soru'] ?? null;

        $soruMetni = $item['soru_metni']
          ?? ($soru->soru_metni ?? 'Görsel soru');

        $secenekler = [
          'A' => $item['secenek_a'] ?? ($soru->secenek_a ?? ''),
          'B' => $item['secenek_b'] ?? ($soru->secenek_b ?? ''),
          'C' => $item['secenek_c'] ?? ($soru->secenek_c ?? ''),
          'D' => $item['secenek_d'] ?? ($soru->secenek_d ?? ''),
        ];

        $ogrenciCevapMetni = !empty($item['ogrenci_cevap'])
          ? $item['ogrenci_cevap'] . ' - ' . ($secenekler[$item['ogrenci_cevap']] ?? '')
          : 'Boş';

        $dogruCevapMetni = !empty($item['dogru_cevap'])
          ? $item['dogru_cevap'] . ' - ' . ($secenekler[$item['dogru_cevap']] ?? '')
          : 'Belirtilmemiş';

        $kazanim = $item['kazanim'] ?? ($soru->kazanim ?? '');
      @endphp

      <div class="question">
        <div class="q-head">
          <h3>{{ $index + 1 }}. {{ $soruMetni }}</h3>
          <span class="badge {{ $durumClass }}">{{ $item['durum'] }}</span>
        </div>
        <div class="answers">
          <div class="answer-box"><strong>Senin cevabın</strong>{{ $ogrenciCevapMetni }}</div>
          <div class="answer-box"><strong>Doğru cevap</strong>{{ $dogruCevapMetni }}</div>
        </div>

        @if(!empty($kazanim))
          <div class="answer-box" style="margin-top:12px;">
            <strong>Kazanım</strong>{{ $kazanim }}
          </div>
        @endif
      </div>
    @endforeach
  </div>
</div>
</body>
</html>
