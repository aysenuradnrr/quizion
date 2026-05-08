<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Quizion – Öğretmen Paneli</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@400;600;700;800&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --pu:#3d1a8e;--pm:#6c35de;--pl:#9b6dff;--pp:#ede7ff;
  --or:#f5a623;--gr:#3acaaa;--re:#f04848;--bl:#3b82f6;
  --td:#1e0e4b;--tm:#5a4a7a;--tl:#8878aa;
  --bg:#f4f0ff;--bs:#f8f4ff;--bd:#ede7ff;
  --nh:64px;--sw:290px;
  --tr:.3s cubic-bezier(.4,0,.2,1);
  --gb:rgba(255,255,255,.12);--gbd:rgba(255,255,255,.22);
  --s1:0 2px 12px rgba(61,26,142,.07);
  --s2:0 8px 28px rgba(61,26,142,.13);
  --s3:0 20px 60px rgba(61,26,142,.22);
}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--td);overflow-x:hidden;margin:0}
a{text-decoration:none;color:inherit}

/* NAV */
.nav{
  position:fixed;top:0;left:0;right:0;height:var(--nh);
  background:rgba(20,80,60,.96);
  backdrop-filter:blur(22px);
  border-bottom:1px solid rgba(90,200,160,.2);
  display:flex;align-items:center;padding:0 28px;gap:12px;
  z-index:1000;box-shadow:0 4px 28px rgba(0,40,20,.45)
}
.nav-logo{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.6rem;color:#fff;letter-spacing:-.5px;flex-shrink:0;cursor:pointer;text-decoration:none}
.nav-logo span{color:var(--or)}
.nav-right{display:flex;align-items:center;gap:10px;margin-left:auto;flex-shrink:0}
.notif-btn{background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.22);color:#fff;width:36px;height:36px;border-radius:10px;font-size:15px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:var(--tr);position:relative}
.notif-btn:hover{background:rgba(255,255,255,.2)}
.notif-dot{position:absolute;top:6px;right:6px;width:8px;height:8px;border-radius:50%;background:var(--re);border:2px solid rgba(20,80,60,.96)}
.dash-user-chip{display:flex;align-items:center;gap:8px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);border-radius:10px;padding:5px 12px 5px 7px;cursor:pointer;transition:var(--tr)}
.dash-user-chip:hover{background:rgba(255,255,255,.18)}
.duc-av{width:28px;height:28px;border-radius:8px;background:linear-gradient(135deg,#5cc8a8,#1da18a);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:.85rem;color:#fff}
.duc-name{font-size:.8rem;font-weight:700;color:#fff}
.btn-exit{background:rgba(255,100,100,.2);border:1px solid rgba(255,100,100,.3);color:#ffb3b3;font-family:'Nunito',sans-serif;font-weight:700;font-size:.8rem;padding:6px 13px;border-radius:9px;cursor:pointer;transition:var(--tr)}
.btn-exit:hover{background:rgba(255,100,100,.3)}

/* LAYOUT */
#vDash{padding-top:var(--nh);background:var(--bg);min-height:100vh}
.dl{display:grid;grid-template-columns:var(--sw) 1fr;min-height:calc(100vh - var(--nh))}

/* SIDEBAR */
.ds{
  background:linear-gradient(180deg,#0d4a38 0%,#1a6b52 100%);
  border-right:1px solid rgba(90,200,160,.12);
  padding:20px 0;
  position:sticky;top:var(--nh);
  height:calc(100vh - var(--nh));
  overflow-y:auto;
  display:flex;flex-direction:column
}
.ds::-webkit-scrollbar{width:3px}
.ds::-webkit-scrollbar-thumb{background:rgba(255,255,255,.14);border-radius:3px}
.ds-uc{margin:0 14px 16px;padding:14px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);border-radius:15px}
.ds-top{display:flex;align-items:center;gap:11px;margin-bottom:12px}
.ds-av{width:46px;height:46px;border-radius:13px;background:linear-gradient(135deg,#5cc8a8,#1da18a);display:flex;align-items:center;justify-content:center;font-size:1.3rem;font-weight:900;color:#fff;flex-shrink:0}
.ds-name{font-weight:800;font-size:.92rem;color:#fff}
.ds-grade{font-size:.72rem;color:rgba(255,255,255,.58);font-weight:600;margin-top:2px}
.ds-xp-r{display:flex;justify-content:space-between;font-size:.7rem;font-weight:700;color:rgba(255,255,255,.52);margin-bottom:5px}
.ds-xp-b{background:rgba(255,255,255,.13);border-radius:8px;height:6px;overflow:hidden}
.ds-xp-f{height:100%;border-radius:8px;background:linear-gradient(90deg,#5cc8a8,#1da18a)}
.ds-lbl{font-size:.66rem;font-weight:800;letter-spacing:1.1px;text-transform:uppercase;color:rgba(255,255,255,.33);padding:10px 18px 5px}
.ds-ni{display:flex;align-items:center;gap:10px;padding:10px 16px;color:rgba(255,255,255,.75);text-decoration:none;font-weight:700;font-size:.88rem;cursor:pointer;transition:var(--tr);margin:1px 10px;border-radius:11px;position:relative}
.ds-ni:hover{background:rgba(255,255,255,.1);color:#fff}
.ds-ni.ac{background:linear-gradient(135deg,rgba(92,200,168,.2),rgba(29,161,138,.1));color:#fff;border:1px solid rgba(92,200,168,.3)}
.ds-ni.ac::before{content:'';position:absolute;left:0;top:20%;bottom:20%;width:3px;background:#5cc8a8;border-radius:2px}
.ds-nicon{width:32px;height:32px;border-radius:8px;background:rgba(255,255,255,.08);display:flex;align-items:center;justify-content:center;font-size:1rem;flex-shrink:0;transition:var(--tr)}
.ds-ni:hover .ds-nicon,.ds-ni.ac .ds-nicon{background:rgba(255,255,255,.16)}
.ds-nbdg{background:#5cc8a8;color:#fff;font-size:.65rem;font-weight:800;min-width:18px;height:18px;border-radius:9px;display:flex;align-items:center;justify-content:center;padding:0 4px;margin-left:auto}
.ds-nd{height:1px;background:rgba(255,255,255,.07);margin:8px 14px}
.ds-bot{margin-top:auto;padding:14px}
.ds-qbtn{width:100%;background:linear-gradient(135deg,#5cc8a8,#1da18a);border:none;color:#fff;font-family:'Nunito',sans-serif;font-weight:800;font-size:.88rem;padding:11px;border-radius:12px;cursor:pointer;transition:var(--tr);box-shadow:0 4px 14px rgba(29,161,138,.34)}
.ds-qbtn:hover{transform:translateY(-1px);box-shadow:0 6px 20px rgba(29,161,138,.5)}
.ds-logout-btn{display:flex;align-items:center;gap:10px;padding:10px 16px;color:rgba(255,255,255,.75);font-family:'Nunito',sans-serif;font-weight:700;font-size:.88rem;cursor:pointer;transition:var(--tr);margin:1px 10px;border-radius:11px;background:none;border:none;width:calc(100% - 20px);text-align:left}
.ds-logout-btn:hover{background:rgba(255,100,100,.15);color:#ffb3b3}

/* MAIN */
.dm{padding:28px 30px;overflow-y:auto}
.alert-ok{background:rgba(58,202,170,.12);border:1px solid rgba(58,202,170,.35);color:#0f7a66;border-radius:14px;padding:13px 16px;font-weight:800;margin-bottom:18px}
.dm-wel{display:flex;justify-content:space-between;align-items:center;margin-bottom:22px;flex-wrap:wrap;gap:14px}
.dm-wel h2{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.55rem;color:var(--td)}
.dm-wel p{color:var(--tm);font-size:.87rem;margin-top:3px}
.dm-acts{display:flex;gap:10px}
.btn-dp{background:linear-gradient(135deg,#3acaaa,#1da18a);border:none;color:#fff;font-family:'Nunito',sans-serif;font-weight:800;font-size:.87rem;padding:10px 20px;border-radius:11px;cursor:pointer;transition:var(--tr);box-shadow:0 4px 14px rgba(58,202,170,.28)}
.btn-dp:hover{transform:translateY(-1px);box-shadow:0 6px 20px rgba(58,202,170,.4)}
.btn-ds{background:#fff;border:1.5px solid var(--bd);color:var(--tm);font-family:'Nunito',sans-serif;font-weight:700;font-size:.87rem;padding:10px 20px;border-radius:11px;cursor:pointer;transition:var(--tr)}
.btn-ds:hover{border-color:#3acaaa;color:#1da18a}

/* TEACHER BAR */
.teacher-bar{background:linear-gradient(135deg,rgba(58,202,170,.1),rgba(29,161,138,.05));border:1px solid rgba(58,202,170,.2);border-radius:14px;padding:14px 18px;margin-bottom:20px;display:flex;align-items:center;gap:12px}
.teacher-bar-icon{font-size:1.6rem;flex-shrink:0}
.teacher-bar-t{font-weight:800;font-size:.95rem;color:#0f7a66}
.teacher-bar-d{font-size:.82rem;color:var(--tm);margin-top:2px}

/* STAT CARDS */
.dsr{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:20px}
.dsc{background:#fff;border-radius:16px;padding:18px;border:1px solid var(--bd);box-shadow:var(--s1);transition:var(--tr);position:relative;overflow:hidden}
.dsc:hover{transform:translateY(-3px);box-shadow:var(--s2)}
.dsc::after{content:'';position:absolute;top:-20px;right:-20px;width:70px;height:70px;border-radius:50%;opacity:.11}
.dsc.c1::after{background:#3acaaa}.dsc.c2::after{background:var(--or)}.dsc.c3::after{background:var(--pm)}.dsc.c4::after{background:var(--bl)}
.dsc-ico{width:42px;height:42px;border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:1.25rem;margin-bottom:12px}
.dsc.c1 .dsc-ico{background:rgba(58,202,170,.1);color:#1da18a}
.dsc.c2 .dsc-ico{background:rgba(245,166,35,.1);color:var(--or)}
.dsc.c3 .dsc-ico{background:rgba(108,53,222,.1);color:var(--pm)}
.dsc.c4 .dsc-ico{background:rgba(59,130,246,.1);color:var(--bl)}
.dsc-val{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.65rem;color:var(--td);line-height:1}
.dsc-lbl{font-size:.78rem;color:var(--tm);font-weight:600;margin-top:4px}
.dsc-chg{font-size:.72rem;font-weight:700;margin-top:5px}
.dsc-chg.up{color:var(--gr)}.dsc-chg.nu{color:var(--tl)}

/* CLASS GRID */
.class-section{margin-bottom:20px}
.class-section-hd{display:flex;justify-content:space-between;align-items:center;margin-bottom:14px}
.class-section-title{font-family:'Baloo 2',cursive;font-weight:700;font-size:1rem;color:var(--td)}
.dc-lnk{font-size:.78rem;font-weight:700;color:#1da18a;cursor:pointer;text-decoration:none}
.dc-lnk:hover{text-decoration:underline}
.class-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:12px}
.class-card{background:#fff;border:1px solid var(--bd);border-radius:14px;padding:16px;transition:var(--tr);cursor:pointer}
.class-card:hover{transform:translateY(-2px);box-shadow:var(--s2);border-color:#3acaaa}
.cc-head{display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:10px}
.cc-name{font-weight:800;font-size:.95rem;color:var(--td)}
.cc-cnt{font-size:.75rem;font-weight:700;background:rgba(58,202,170,.1);color:#1da18a;padding:2px 8px;border-radius:8px}
.cc-sub{font-size:.78rem;color:var(--tl);font-weight:600;margin-bottom:10px}
.cc-prog{background:var(--bd);border-radius:8px;height:5px;overflow:hidden}
.cc-fill{height:100%;border-radius:8px;background:linear-gradient(90deg,#5cc8a8,#1da18a)}
.cc-meta{font-size:.72rem;color:var(--tm);font-weight:600;margin-top:6px}
.cc-empty{text-align:center;padding:30px;color:var(--tl)}
.cc-empty-icon{font-size:2rem;margin-bottom:8px}
.cc-empty-t{font-weight:700;font-size:.88rem}
.cc-empty-s{font-size:.78rem;margin-top:4px}
.btn-add-class{background:linear-gradient(135deg,#3acaaa,#1da18a);border:none;color:#fff;font-family:'Nunito',sans-serif;font-weight:800;font-size:.84rem;padding:9px 18px;border-radius:10px;cursor:pointer;transition:var(--tr)}
.btn-add-class:hover{transform:translateY(-1px);box-shadow:0 4px 12px rgba(58,202,170,.4)}

/* MID GRID */
.dmid{display:grid;grid-template-columns:1fr 1.4fr;gap:16px;margin-bottom:20px}
.dc{background:#fff;border-radius:16px;padding:20px;border:1px solid var(--bd);box-shadow:var(--s1)}
.dc-hd{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
.dc-title{font-family:'Baloo 2',cursive;font-weight:700;font-size:1rem;color:var(--td)}

/* STUDENT PROGRESS */
.spi{display:flex;align-items:center;gap:12px;margin-bottom:13px}
.spi-em{font-size:1.2rem;flex-shrink:0;width:36px;height:36px;border-radius:9px;background:rgba(58,202,170,.1);display:flex;align-items:center;justify-content:center;color:#1da18a;font-weight:800}
.spi-info{flex:1;min-width:0}
.spi-row{display:flex;justify-content:space-between;align-items:center;margin-bottom:5px}
.spi-nm{font-weight:700;font-size:.83rem;color:var(--td)}
.spi-pct{font-weight:800;font-size:.78rem;color:#1da18a}
.spi-bar{background:var(--bd);border-radius:8px;height:7px;overflow:hidden}
.spi-fill{height:100%;border-radius:8px;transition:width 1.2s ease}
.spi-empty{text-align:center;padding:20px;color:var(--tl);font-size:.85rem;font-weight:600}

/* WEEKLY CHART */
.wca{display:flex;align-items:flex-end;gap:8px;height:100px;padding-top:8px}
.wb-w{flex:1;display:flex;flex-direction:column;align-items:center;gap:4px}
.wb{width:100%;border-radius:5px 5px 0 0;min-height:4px;cursor:pointer;transition:var(--tr)}
.wb:hover{filter:brightness(1.15)}
.wb-d{font-size:.67rem;font-weight:700;color:var(--tl)}
.wb-v{font-size:.67rem;font-weight:800;color:var(--tm)}

/* AI SUGGESTION */
.ai-sug{background:linear-gradient(135deg,rgba(58,202,170,.07),rgba(29,161,138,.04));border:1.5px solid rgba(58,202,170,.2);border-radius:16px;padding:16px;display:flex;gap:12px;align-items:flex-start;cursor:pointer;transition:var(--tr);margin-top:14px}
.ai-sug:hover{border-color:#3acaaa;transform:translateY(-2px);box-shadow:var(--s2)}
.ai-ico{width:44px;height:44px;border-radius:12px;background:linear-gradient(135deg,#3acaaa,#1da18a);display:flex;align-items:center;justify-content:center;font-size:1.25rem;flex-shrink:0}
.ai-txt h4{font-weight:800;font-size:.9rem;color:#0f7a66;margin-bottom:3px}
.ai-txt p{font-size:.81rem;color:var(--tm);line-height:1.6}
.ai-act{display:inline-flex;align-items:center;gap:5px;margin-top:7px;font-size:.77rem;font-weight:800;color:#1da18a}

/* BOTTOM GRID */
.dbot{display:grid;grid-template-columns:1.1fr 1fr;gap:16px;margin-bottom:20px}

/* QUIZ ITEMS */
.qi{display:flex;align-items:center;gap:12px;padding:11px 0;border-bottom:1px solid var(--bd)}
.qi:last-child{border-bottom:none}
.qi-ico{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.15rem;flex-shrink:0}
.qi-info{flex:1;min-width:0}
.qi-name{font-weight:700;font-size:.84rem;color:var(--td);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.qi-meta{font-size:.72rem;color:var(--tl);font-weight:600;margin-top:2px}
.qi-sc{text-align:right}
.qi-scv{font-family:'Baloo 2',cursive;font-weight:800;font-size:1rem}
.qi-scv.good{color:var(--gr)}.qi-scv.ok{color:var(--or)}.qi-scv.bad{color:var(--re)}
.qi-scl{font-size:.68rem;font-weight:600;color:var(--tl)}
.qi-empty{text-align:center;padding:20px;color:var(--tl);font-size:.85rem;font-weight:600}
.qi-code{font-family:'Baloo 2',cursive;font-weight:800;font-size:1rem;color:#1da18a;text-align:right}
.status{font-size:.7rem;font-weight:800;padding:4px 9px;border-radius:8px;background:rgba(58,202,170,.1);color:#1da18a;text-align:center;margin-top:4px}

/* QUICK ACTIONS */
.quick-actions{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:20px}
.qa-btn{background:#fff;border:1.5px solid var(--bd);border-radius:13px;padding:16px;cursor:pointer;transition:var(--tr);text-align:left;font-family:'Nunito',sans-serif}
.qa-btn:hover{border-color:#3acaaa;transform:translateY(-2px);box-shadow:var(--s2)}
.qa-icon{font-size:1.5rem;margin-bottom:8px}
.qa-title{font-weight:800;font-size:.88rem;color:var(--td);margin-bottom:3px}
.qa-desc{font-size:.75rem;color:var(--tl);font-weight:600}

/* WELCOME CARD */
.welcome-card{background:linear-gradient(135deg,rgba(58,202,170,.08),rgba(29,161,138,.04));border:1.5px solid rgba(58,202,170,.2);border-radius:16px;padding:24px;margin-bottom:20px;display:flex;align-items:center;gap:16px}
.wc-icon{font-size:2.5rem;flex-shrink:0}
.wc-txt h3{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.1rem;color:#0f7a66;margin-bottom:4px}
.wc-txt p{font-size:.85rem;color:var(--tm);line-height:1.6}

/* TOAST */
.toast-wrap{position:fixed;bottom:22px;right:22px;z-index:3000;display:flex;flex-direction:column;gap:8px;pointer-events:none}
.toast{background:#fff;border-radius:13px;padding:12px 16px;display:flex;align-items:center;gap:9px;box-shadow:var(--s3);border-left:4px solid #3acaaa;font-weight:700;font-size:.84rem;color:var(--td);animation:tin .35s ease forwards;max-width:300px;pointer-events:all}
.toast.ok{border-color:var(--gr)}.toast.err{border-color:var(--re)}.toast.warn{border-color:var(--or)}
@keyframes tin{from{opacity:0;transform:translateX(18px)}to{opacity:1;transform:translateX(0)}}
@keyframes tout{to{opacity:0;transform:translateX(18px)}}
.toast.out{animation:tout .28s ease forwards}

@media(max-width:900px){
  .dl{grid-template-columns:1fr}
  .ds{display:none}
  .dsr{grid-template-columns:1fr 1fr}
  .dmid{grid-template-columns:1fr}
  .dbot{grid-template-columns:1fr}
  .quick-actions{grid-template-columns:1fr}
}
@media(max-width:640px){
  .dsr{grid-template-columns:1fr 1fr}
  .dm{padding:16px}
}
</style>
</head>
<body>

<div class="toast-wrap" id="tw"></div>

@php
    $sonSinavlar = $sonSinavlar ?? collect();
    $sinavSayisi = $sonSinavlar->count();
    $aktifSinavSayisi = $sonSinavlar->where('is_active', true)->count();
@endphp

<!-- NAVBAR -->
<nav class="nav">
  <a class="nav-logo" href="{{ route('home') }}">Quiz<span>ion</span></a>
  <div class="nav-right">
    <button class="notif-btn" onclick="toast('🔔 Sınav oluşturduğunuzda öğrencilerin paneline bildirim düşer.','info')">
      🔔
      @if($sinavSayisi > 0)
        <span class="notif-dot"></span>
      @endif
    </button>
    
    <form method="POST" action="{{ route('logout') }}" style="display:inline;margin:0">
      @csrf
      <button type="submit" class="btn-exit">Çıkış</button>
    </form>
  </div>
</nav>

<!-- DASHBOARD -->
<div id="vDash">
  <div class="dl">

    <!-- ═══ SIDEBAR ═══ -->
    <aside class="ds">
      <div class="ds-uc">
        <div class="ds-top">
          <div class="ds-av">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
          <div>
            <div class="ds-name">{{ $user->name }} {{ $user->surname }}</div>
            <div class="ds-grade">Öğretmen · {{ $user->branch }}</div>
          </div>
        </div>
        <div class="ds-xp-r">
          <span>🏅 Uzman Öğretmen</span>
          <span>{{ $user->xp }} XP</span>
        </div>
        <div class="ds-xp-b">
          <div class="ds-xp-f" style="width:{{ min(100, ($user->xp % 100)) }}%"></div>
        </div>
      </div>

      <div class="ds-lbl">🧠 Öğretmen Paneli</div>
      <a class="ds-ni ac" href="{{ route('ogretmen.dashboard') }}">
        <div class="ds-nicon">🏠</div>Anasayfa
      </a>
      <a class="ds-ni" href="{{ route('ogretmen.soru.ekle') }}">
        <div class="ds-nicon">🧠</div>Soru Üretim Merkezi
      </a>
      
      <a class="ds-ni" href="{{ route('ogretmen.sinav.olustur') }}">
        <div class="ds-nicon">📋</div>Sınav Mimarı
        @if($sinavSayisi > 0)
          <span class="ds-nbdg">{{ $sinavSayisi }}</span>
        @endif
      </a>
      <a class="ds-ni" href="{{ route('ogretmen.dashboard') }}">
        <div class="ds-nicon">📊</div>Analiz Odası
      </a>
      <a class="ds-ni" href="{{ route('ogretmen.dashboard') }}">
        <div class="ds-nicon">🏫</div>Sınıf Yönetimi
      </a>

      <div class="ds-nd"></div>
      <div class="ds-lbl">👥 Öğrenciler</div>
      <a class="ds-ni" href="{{ route('ogretmen.dashboard') }}">
        <div class="ds-nicon">📈</div>Öğrenci Raporları
      </a>
      <a class="ds-ni" href="{{ route('ogretmen.sinav.olustur') }}">
        <div class="ds-nicon">🎯</div>Ödev / Sınav Ver
      </a>
      <a class="ds-ni" href="{{ route('ogretmen.sinav.olustur') }}">
        <div class="ds-nicon">⚡</div>Canlı Yarışma Başlat
      </a>

      <div class="ds-nd"></div>
      <div class="ds-lbl">⚙️ Hesabım</div>
      <a class="ds-ni" href="{{ route('profile.edit') }}">
        <div class="ds-nicon">👤</div>Profil Ayarları
      </a>
      <a class="ds-ni" href="{{ route('ogretmen.dashboard') }}">
        <div class="ds-nicon">🔔</div>Bildirimler
        @if($sinavSayisi > 0)
          <span class="ds-nbdg">{{ $sinavSayisi }}</span>
        @endif
      </a>

      <div class="ds-bot">
        <form method="POST" action="{{ route('logout') }}" style="margin-bottom:10px">
          @csrf
          <button type="submit" class="ds-logout-btn">
            <div class="ds-nicon">🚪</div>Çıkış Yap
          </button>
        </form>
        <a href="{{ route('ogretmen.sinav.olustur') }}">
          <button type="button" class="ds-qbtn">➕ Yeni Sınav Oluştur</button>
        </a>
      </div>
    </aside>

    <!-- ═══ MAIN CONTENT ═══ -->
    <main class="dm">

      @if(session('success'))
        <div class="alert-ok">✅ {{ session('success') }}</div>
      @endif

      <!-- Başlık -->
      <div class="dm-wel">
        <div>
          <h2>Merhaba, {{ $user->name }}! 👩‍🏫</h2>
          <p>Öğretmen panelinize hoş geldiniz. Branş: <strong>{{ $user->branch }}</strong></p>
        </div>
        <div class="dm-acts">
          <a href="{{ route('ogretmen.dashboard') }}">
            <button type="button" class="btn-ds">📊 Analiz Odası</button>
          </a>
          <a href="{{ route('ogretmen.sinav.olustur') }}">
            <button type="button" class="btn-dp">➕ Sınav Oluştur</button>
          </a>
        </div>
      </div>

      <!-- Teacher Bar -->
      <div class="teacher-bar">
        <div class="teacher-bar-icon">🏫</div>
        <div>
          <div class="teacher-bar-t">Öğretmen Paneline Hoş Geldiniz, {{ $user->name }} Hoca!</div>
          <div class="teacher-bar-d">
            Branş: {{ $user->branch }} · Sınıf seviyesine uygun sınav oluşturduğunuzda öğrencilerin paneline otomatik düşer.
          </div>
        </div>
      </div>

      <!-- Hoşgeldin Kartı -->
      <div class="welcome-card">
        <div class="wc-icon">🎓</div>
        <div class="wc-txt">
          <h3>Quizion Öğretmen Paneli Hazır!</h3>
          <p>
            Sınav oluşturma, sınav kodu üretme ve öğrenci bildirim sistemi aktif.
            Oluşturduğunuz sınavlar ilgili sınıf seviyesindeki öğrencilerin yaklaşan sınavlar alanında görünür.
          </p>
        </div>
      </div>

      <!-- STAT CARDS -->
      <div class="dsr">
        <a class="dsc c1" href="{{ route('ogretmen.dashboard') }}">
          <div class="dsc-ico">🏫</div>
          <div class="dsc-val">{{ $aktifSinavSayisi }}</div>
          <div class="dsc-lbl">Aktif Sınav</div>
          <div class="dsc-chg {{ $aktifSinavSayisi > 0 ? 'up' : 'nu' }}">
            {{ $aktifSinavSayisi > 0 ? 'Öğrenci panelinde görünür' : 'Sınav oluşturun' }}
          </div>
        </a>

        <a class="dsc c2" href="{{ route('ogretmen.dashboard') }}">
          <div class="dsc-ico">👥</div>
          <div class="dsc-val">0</div>
          <div class="dsc-lbl">Toplam Öğrenci</div>
          <div class="dsc-chg nu">Sınıf seviyesine göre takip</div>
        </a>

        <a class="dsc c3" href="{{ route('ogretmen.sinav.olustur') }}">
          <div class="dsc-ico">📋</div>
          <div class="dsc-val">{{ $sinavSayisi }}</div>
          <div class="dsc-lbl">Toplam Sınav</div>
          <div class="dsc-chg {{ $sinavSayisi > 0 ? 'up' : 'nu' }}">
            {{ $sinavSayisi > 0 ? 'Sınavlar kaydedildi' : 'İlk sınavı oluşturun' }}
          </div>
        </a>

        <a class="dsc c4" href="{{ route('profile.edit') }}">
          <div class="dsc-ico">📈</div>
          <div class="dsc-val">{{ $user->branch ? '1' : '0' }}</div>
          <div class="dsc-lbl">Branş Bilgisi</div>
          <div class="dsc-chg nu">{{ $user->branch ?? 'Profilde tamamlayın' }}</div>
        </a>
      </div>

      <!-- HIZLI İŞLEMLER -->
      <div style="margin-bottom:6px">
        <div class="class-section-hd">
          <div class="class-section-title">⚡ Hızlı İşlemler</div>
        </div>
      </div>
      <div class="quick-actions" style="margin-bottom:20px">
        <a class="qa-btn" href="{{ route('ogretmen.soru.ekle') }}">
          <div class="qa-icon">🧠</div>
          <div class="qa-title">Soru Üret</div>
          <div class="qa-desc">Yeni soru oluştur ve sisteme kaydet</div>
        </a>

        <a class="qa-btn" href="{{ route('ogretmen.sinav.olustur') }}">
          <div class="qa-icon">📋</div>
          <div class="qa-title">Sınav Oluştur</div>
          <div class="qa-desc">Öğrencilerin için yeni sınav hazırla</div>
        </a>

        <a class="qa-btn" href="{{ route('ogretmen.dashboard') }}">
          <div class="qa-icon">🏫</div>
          <div class="qa-title">Sınıf Durumu</div>
          <div class="qa-desc">Sınıf seviyesine göre sınavları takip et</div>
        </a>

        <a class="qa-btn" href="{{ route('ogretmen.sinav.olustur') }}">
          <div class="qa-icon">⚡</div>
          <div class="qa-title">Canlı Yarışma</div>
          <div class="qa-desc">Başlangıç saati yakın sınav oluştur</div>
        </a>
      </div>

      <!-- SINIFLARIM -->
      <div class="class-section">
        <div class="class-section-hd">
          <div class="class-section-title">🏫 Sınıflarım</div>
          <a class="dc-lnk" href="{{ route('ogretmen.sinav.olustur') }}">Sınava Sınıf Ata +</a>
        </div>
        <div class="class-grid">
          @foreach(['5','6','7','8'] as $sinif)
            @php
              $sinifSinavSayisi = $sonSinavlar->where('grade', $sinif)->count();
            @endphp
            <a class="class-card" href="{{ route('ogretmen.sinav.olustur') }}">
              <div class="cc-head">
                <div class="cc-name">{{ $sinif }}. Sınıf</div>
                <div class="cc-cnt">{{ $sinifSinavSayisi }} sınav</div>
              </div>
              <div class="cc-sub">Bu sınıf için sınav oluşturabilirsiniz</div>
              <div class="cc-prog">
                <div class="cc-fill" style="width:{{ min(100, $sinifSinavSayisi * 25) }}%"></div>
              </div>
              <div class="cc-meta">Aktif sistem: sınav bildirimi</div>
            </a>
          @endforeach
        </div>
      </div>

      <!-- MID -->
      <div class="dmid">
        <!-- Öğrenci Performansı -->
        <div class="dc">
          <div class="dc-hd">
            <div class="dc-title">👥 Öğrenci Performansı</div>
            <a class="dc-lnk" href="{{ route('ogretmen.dashboard') }}">Tümünü Gör →</a>
          </div>
          <div class="spi-empty">
            <div style="font-size:1.8rem;margin-bottom:8px">👥</div>
            <div>Öğrenci performans verisi sınav sonuçları oluştukça burada gelişecek</div>
            <div style="font-size:.75rem;margin-top:4px">Şimdilik sınav oluşturma ve bildirim sistemi aktif</div>
          </div>
        </div>

        <!-- Haftalık + AI -->
        <div class="dc">
          <div class="dc-hd">
            <div class="dc-title">📈 Haftalık Aktivite</div>
            <span style="font-size:.78rem;color:var(--tl);font-weight:600">Bu hafta: {{ $sinavSayisi }} sınav</span>
          </div>
          <div class="wca" id="wChart"></div>
          <a class="ai-sug" href="{{ route('ogretmen.sinav.olustur') }}">
            <div class="ai-ico">🤖</div>
            <div class="ai-txt">
              <h4>Yapay Zeka Önerisi</h4>
              <p>
                Sınıf seviyesine uygun sınav oluşturduğunuzda öğrencilerin yaklaşan sınavlar ve bildirim alanları otomatik güncellenir.
              </p>
              <div class="ai-act">Sınav Oluştur →</div>
            </div>
          </a>
        </div>
      </div>

      <!-- BOTTOM -->
      <div class="dbot">
        <!-- Son Sınavlar -->
        <div class="dc">
          <div class="dc-hd">
            <div class="dc-title">📋 Son Sınavlarım</div>
            <a class="dc-lnk" href="{{ route('ogretmen.sinav.olustur') }}">Yeni Sınav +</a>
          </div>

          @forelse($sonSinavlar as $sinav)
            <div class="qi">
              <div class="qi-ico" style="background:rgba(58,202,170,.1);color:#1da18a">📋</div>
              <div class="qi-info">
                <div class="qi-name">{{ $sinav->title }}</div>
                <div class="qi-meta">
                  {{ $sinav->ders ?? 'Genel' }}
                  · {{ $sinav->grade }}. Sınıf
                  · {{ $sinav->starts_at->format('d.m.Y H:i') }}
                  · {{ $sinav->duration }} dk
                </div>
              </div>
              <div>
                <div class="qi-code">{{ $sinav->exam_code }}</div>
                <div class="status">{{ $sinav->is_active ? 'Aktif' : 'Pasif' }}</div>
              </div>
            </div>
          @empty
            <div class="qi-empty">
              <div style="font-size:2rem;margin-bottom:8px">📋</div>
              <div style="font-weight:700;font-size:.88rem">Henüz sınav oluşturulmadı</div>
              <div style="font-size:.78rem;margin-top:4px">İlk sınavını oluştur!</div>
            </div>
          @endforelse
        </div>

        <!-- Sınıf Durumu -->
        <div class="dc">
          <div class="dc-hd">
            <div class="dc-title">📊 Sınıf Durumu</div>
          </div>
          <div style="text-align:center;padding:20px 0;color:var(--tl)">
            <div style="font-size:2rem;margin-bottom:8px">📊</div>
            <div style="font-weight:700;font-size:.88rem">
              {{ $sinavSayisi > 0 ? 'Sınav sistemi aktif' : 'Veri bekleniyor' }}
            </div>
            <div style="font-size:.78rem;margin-top:4px;line-height:1.7">
              Öğretmen sınav oluşturduğunda, sınavın sınıf seviyesi öğrencinin sınıfıyla aynıysa öğrenci panelindeki bildirimler ve yaklaşan sınavlar alanında görünür.
            </div>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

<script>
const WD=[
  {d:'Pzt',v:0},{d:'Sal',v:0},{d:'Çar',v:0},
  {d:'Per',v:0},{d:'Cum',v:0},{d:'Cmt',v:0},{d:'Paz',v:0}
];

@if($sinavSayisi > 0)
  WD[0].v = {{ $sinavSayisi }};
@endif

const COLORS=['#5cc8a8','#1da18a','#3acaaa','#5cc8a8','#1da18a','#3acaaa','#5cc8a8'];

function buildWeeklyChart(){
  const el=document.getElementById('wChart');
  if(!el)return;
  const max=Math.max(...WD.map(d=>d.v),1);
  el.innerHTML=WD.map((d,i)=>`
    <div class="wb-w">
      <div class="wb-v">${d.v}</div>
      <div class="wb" style="height:${Math.max(4,(d.v/max*100))}%;background:${COLORS[i]}"></div>
      <div class="wb-d">${d.d}</div>
    </div>`).join('');
}
buildWeeklyChart();

function toast(msg,type='info'){
  const c=document.getElementById('tw');
  const t=document.createElement('div');
  t.className='toast '+(type==='ok'?'ok':type==='err'?'err':type==='warn'?'warn':'');
  t.innerHTML=msg;c.appendChild(t);
  setTimeout(()=>{t.classList.add('out');setTimeout(()=>t.remove(),280);},3200);
}
</script>
</body>
</html>