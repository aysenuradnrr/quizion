@php
    $toplamSinav = $toplamSinav ?? 0;
    $ortalamaBasari = $ortalamaBasari ?? 0;
    $toplamSoru = $toplamSoru ?? 0;
    $sonSinavlar = $sonSinavlar ?? collect();
    $dersBasariIzlencesi = $dersBasariIzlencesi ?? collect();
    $yaklasanSinavlar = $yaklasanSinavlar ?? collect();
    $bildirimler = $bildirimler ?? collect();

    $haftalikAktivite = $haftalikAktivite ?? [
        ['gun' => 'Pzt', 'soru' => 0],
        ['gun' => 'Sal', 'soru' => 0],
        ['gun' => 'Çar', 'soru' => 0],
        ['gun' => 'Per', 'soru' => 0],
        ['gun' => 'Cum', 'soru' => 0],
        ['gun' => 'Cmt', 'soru' => 0],
        ['gun' => 'Paz', 'soru' => 0],
    ];

    $buHaftaToplam = collect($haftalikAktivite)->sum('soru');
@endphp

<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Quizion – Öğrenci Paneli</title>
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
.nav{position:fixed;top:0;left:0;right:0;height:var(--nh);background:rgba(40,8,100,.96);backdrop-filter:blur(22px);border-bottom:1px solid var(--gbd);display:flex;align-items:center;padding:0 28px;gap:12px;z-index:1000;box-shadow:0 4px 28px rgba(20,0,60,.45)}
.nav-logo{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.6rem;color:#fff;letter-spacing:-.5px;flex-shrink:0;cursor:pointer;text-decoration:none}
.nav-logo span{color:var(--or)}
.menu-toggle{display:flex;background:rgba(255,255,255,.14);border:1px solid rgba(255,255,255,.22);color:#fff;width:40px;height:40px;border-radius:11px;font-size:1.25rem;cursor:pointer;align-items:center;justify-content:center;transition:var(--tr)}
.menu-toggle:hover{background:rgba(255,255,255,.22)}
.sidebar-overlay{display:none;position:fixed;inset:var(--nh) 0 0 0;background:rgba(20,0,60,.45);z-index:998;backdrop-filter:blur(2px)}
.nav-right{display:flex;align-items:center;gap:10px;margin-left:auto;flex-shrink:0}
.notif-wrap{position:relative}
.notif-btn{background:var(--gb);border:1px solid var(--gbd);color:#fff;width:36px;height:36px;border-radius:10px;font-size:15px;cursor:pointer;display:flex;align-items:center;justify-content:center;transition:var(--tr);position:relative}
.notif-btn:hover{background:rgba(255,255,255,.2)}
.notif-dot{position:absolute;top:6px;right:6px;width:8px;height:8px;border-radius:50%;background:var(--re);border:2px solid rgba(40,8,100,.96)}
.notif-panel{display:none;position:absolute;right:0;top:46px;width:310px;background:#fff;border:1px solid var(--bd);border-radius:16px;box-shadow:var(--s3);padding:12px;z-index:2000}
.notif-panel.show{display:block}
.notif-title{font-weight:900;color:var(--td);font-size:.95rem;margin-bottom:8px}
.notif-item{display:block;padding:10px;border-radius:12px;border:1px solid var(--bd);margin-bottom:8px;background:var(--bs)}
.notif-item:hover{border-color:var(--pl)}
.notif-item strong{display:block;font-size:.82rem;color:var(--pm)}
.notif-item span{display:block;font-size:.75rem;color:var(--tm);margin-top:3px;line-height:1.4}
.notif-empty{font-size:.82rem;color:var(--tl);padding:14px;text-align:center}
.dash-user-chip{display:flex;align-items:center;gap:8px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);border-radius:10px;padding:5px 12px 5px 7px;cursor:pointer;transition:var(--tr)}
.dash-user-chip:hover{background:rgba(255,255,255,.18)}
.duc-av{width:28px;height:28px;border-radius:8px;background:linear-gradient(135deg,var(--or),#ff6b35);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:.85rem;color:#fff}
.duc-name{font-size:.8rem;font-weight:700;color:#fff}
.btn-exit{background:rgba(255,100,100,.2);border:1px solid rgba(255,100,100,.3);color:#ffb3b3;font-family:'Nunito',sans-serif;font-weight:700;font-size:.8rem;padding:6px 13px;border-radius:9px;cursor:pointer;transition:var(--tr)}
.btn-exit:hover{background:rgba(255,100,100,.3)}

#vDash{padding-top:var(--nh);background:var(--bg);min-height:100vh}
.dl{display:grid;grid-template-columns:var(--sw) 1fr;min-height:calc(100vh - var(--nh));transition:var(--tr)}
.dl.sidebar-closed{grid-template-columns:0 1fr}
.ds{background:linear-gradient(180deg,#280d6e 0%,#3d1a8e 100%);border-right:1px solid rgba(255,255,255,.09);padding:20px 0;position:sticky;top:var(--nh);height:calc(100vh - var(--nh));overflow-y:auto;display:flex;flex-direction:column;transition:var(--tr)}
.ds.closed{transform:translateX(-100%);opacity:0;pointer-events:none}
.ds-uc{margin:0 14px 22px;padding:18px 15px;background:rgba(255,255,255,.10);border:1px solid rgba(255,255,255,.16);border-radius:18px;box-shadow:0 10px 28px rgba(0,0,0,.12)}
.ds-top{display:flex;align-items:center;gap:12px;margin-bottom:16px}
.ds-av{width:52px;height:52px;border-radius:16px;background:linear-gradient(135deg,var(--or),#ff6b35);display:flex;align-items:center;justify-content:center;font-size:1.45rem;font-weight:900;color:#fff;flex-shrink:0}
.ds-name{font-weight:800;font-size:.98rem;color:#fff}
.ds-grade{font-size:.76rem;color:rgba(255,255,255,.62);font-weight:700;margin-top:3px}
.ds-xp-r{display:flex;justify-content:space-between;font-size:.7rem;font-weight:700;color:rgba(255,255,255,.52);margin-bottom:5px}
.ds-xp-b{background:rgba(255,255,255,.13);border-radius:8px;height:6px;overflow:hidden}
.ds-xp-f{height:100%;border-radius:8px;background:linear-gradient(90deg,var(--or),#ff6b35)}
.ds-streak{margin-top:8px;display:flex;align-items:center;gap:5px;font-size:.72rem;font-weight:700;color:rgba(255,255,255,.62)}
.ds-lbl{font-size:.68rem;font-weight:900;letter-spacing:1.2px;text-transform:uppercase;color:rgba(255,255,255,.42);padding:14px 20px 8px}
.ds-ni{display:flex;align-items:center;gap:12px;padding:14px 16px;color:rgba(255,255,255,.82);text-decoration:none;font-weight:800;font-size:.92rem;cursor:pointer;transition:var(--tr);margin:6px 14px;border-radius:15px;position:relative;border:1px solid rgba(255,255,255,.08);background:rgba(255,255,255,.04)}
.ds-ni:hover{background:rgba(255,255,255,.13);color:#fff;transform:translateX(3px)}
.ds-ni.ac{background:linear-gradient(135deg,rgba(245,166,35,.18),rgba(255,107,53,.1));color:#fff;border:1px solid rgba(245,166,35,.22)}
.ds-ni.ac::before{content:'';position:absolute;left:0;top:20%;bottom:20%;width:3px;background:var(--or);border-radius:2px}
.ds-nicon{width:38px;height:38px;border-radius:12px;background:rgba(255,255,255,.10);display:flex;align-items:center;justify-content:center;font-size:1.08rem;flex-shrink:0;transition:var(--tr)}
.ds-nbdg{background:var(--or);color:#fff;font-size:.65rem;font-weight:800;min-width:18px;height:18px;border-radius:9px;display:flex;align-items:center;justify-content:center;padding:0 4px;margin-left:auto}
.ds-nd{height:1px;background:rgba(255,255,255,.10);margin:16px 18px}
.ds-logout-btn{display:flex;align-items:center;gap:12px;padding:14px 16px;color:rgba(255,255,255,.82);font-family:'Nunito',sans-serif;font-weight:800;font-size:.92rem;cursor:pointer;transition:var(--tr);margin:1px 10px;border-radius:15px;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);width:calc(100% - 20px);text-align:left}
.ds-logout-btn:hover{background:rgba(255,100,100,.15);color:#ffb3b3}

.sinav-code-btn{
  background:
    linear-gradient(
      135deg,
      #f5a623,
      #ff7a35
    ) !important;
  color:white !important;
  border:1px solid rgba(255,255,255,.18)!important;
  box-shadow:0 10px 24px rgba(245,166,35,.28);
  position:relative;
  overflow:hidden;
}

.sinav-code-btn::before{
  content:'';
  position:absolute;
  inset:0;
  background:
    linear-gradient(
      120deg,
      transparent,
      rgba(255,255,255,.16),
      transparent
    );
  transform:translateX(-100%);
  transition:.7s;
}

.sinav-code-btn:hover::before{
  transform:translateX(100%);
}

.sinav-code-btn:hover{
  transform:translateX(4px) translateY(-2px)!important;
  box-shadow:0 16px 34px rgba(245,166,35,.38)!important;
}

.sinav-code-btn .ds-nicon{
  background:rgba(255,255,255,.16)!important;
  color:white!important;
}

.sinav-code-btn .ds-nbdg{
  animation:pulseBtn 1.8s infinite;
}

@keyframes pulseBtn{
  0%{transform:scale(1);}
  50%{transform:scale(1.08);}
  100%{transform:scale(1);}
}

.exam-code-entry-btn{
  display:flex;
  align-items:center;
  justify-content:center;
  gap:10px;
  margin-bottom:18px;
  background:linear-gradient(135deg,#f5a623,#ff7a35);
  color:white;
  padding:15px;
  border-radius:16px;
  font-weight:900;
  text-decoration:none;
  box-shadow:0 10px 24px rgba(245,166,35,.25);
  position:relative;
  overflow:hidden;
  transition:var(--tr);
}

.exam-code-entry-btn:hover{
  transform:translateY(-2px);
  box-shadow:0 16px 32px rgba(245,166,35,.36);
}

.exam-code-entry-btn span{
  width:32px;
  height:32px;
  border-radius:11px;
  background:rgba(255,255,255,.18);
  display:flex;
  align-items:center;
  justify-content:center;
}


.dm{padding:28px 30px;overflow-y:auto}
.dm-wel{display:flex;justify-content:space-between;align-items:center;margin-bottom:22px;flex-wrap:wrap;gap:14px}
.dm-wel h2{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.55rem;color:var(--td)}
.dm-wel p{color:var(--tm);font-size:.87rem;margin-top:3px}
.dm-acts{display:flex;gap:10px}
.btn-dp{background:linear-gradient(135deg,var(--pm),var(--pu));border:none;color:#fff;font-family:'Nunito',sans-serif;font-weight:800;font-size:.87rem;padding:10px 20px;border-radius:11px;cursor:pointer;transition:var(--tr);box-shadow:0 4px 14px rgba(108,53,222,.28)}
.btn-ds{background:#fff;border:1.5px solid var(--bd);color:var(--tm);font-family:'Nunito',sans-serif;font-weight:700;font-size:.87rem;padding:10px 20px;border-radius:11px;cursor:pointer;transition:var(--tr)}
.btn-ds:hover{border-color:var(--pl);color:var(--pm)}
.dsr{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:20px}
.dsc{background:#fff;border-radius:16px;padding:18px;border:1px solid var(--bd);box-shadow:var(--s1);transition:var(--tr);position:relative;overflow:hidden}
.dsc:hover{transform:translateY(-3px);box-shadow:var(--s2)}
.dsc-ico{width:42px;height:42px;border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:1.25rem;margin-bottom:12px}
.dsc.c1 .dsc-ico{background:rgba(108,53,222,.1);color:var(--pm)}
.dsc.c2 .dsc-ico{background:rgba(245,166,35,.1);color:var(--or)}
.dsc.c3 .dsc-ico{background:rgba(58,202,170,.1);color:var(--gr)}
.dsc.c4 .dsc-ico{background:rgba(59,130,246,.1);color:var(--bl)}
.dsc-val{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.65rem;color:var(--td);line-height:1}
.dsc-lbl{font-size:.78rem;color:var(--tm);font-weight:600;margin-top:4px}
.dsc-chg{font-size:.72rem;font-weight:700;margin-top:5px}
.dsc-chg.up{color:var(--gr)}.dsc-chg.nu{color:var(--tl)}
.dmid{display:grid;grid-template-columns:1fr 1.4fr;gap:16px;margin-bottom:20px}
.dc{background:#fff;border-radius:16px;padding:20px;border:1px solid var(--bd);box-shadow:var(--s1)}
.dc-hd{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
.dc-title{font-family:'Baloo 2',cursive;font-weight:700;font-size:1rem;color:var(--td)}
.dc-lnk{font-size:.78rem;font-weight:700;color:var(--pm);cursor:pointer;text-decoration:none}
.dc-lnk:hover{text-decoration:underline}
.spi{display:flex;align-items:center;gap:12px;margin-bottom:13px}
.spi-em{font-size:1.4rem;flex-shrink:0;width:30px;text-align:center}
.spi-info{flex:1;min-width:0}
.spi-row{display:flex;justify-content:space-between;align-items:center;margin-bottom:5px}
.spi-nm{font-weight:700;font-size:.83rem;color:var(--td)}
.spi-pct{font-weight:800;font-size:.78rem;color:var(--pm)}
.spi-bar{background:var(--bd);border-radius:8px;height:7px;overflow:hidden}
.spi-fill{height:100%;border-radius:8px;transition:width 1.2s ease;background:linear-gradient(90deg,var(--pm),var(--pl))}
.wca{display:flex;align-items:flex-end;gap:8px;height:100px;padding-top:8px}
.wb-w{flex:1;display:flex;flex-direction:column;align-items:center;gap:4px}
.wb{width:100%;border-radius:5px 5px 0 0;min-height:4px;cursor:pointer;transition:var(--tr)}
.wb:hover{filter:brightness(1.15)}
.wb-d{font-size:.67rem;font-weight:700;color:var(--tl)}
.wb-v{font-size:.67rem;font-weight:800;color:var(--tm)}
.ai-sug{background:linear-gradient(135deg,rgba(108,53,222,.07),rgba(155,109,255,.04));border:1.5px solid rgba(108,53,222,.16);border-radius:16px;padding:16px;display:flex;gap:12px;align-items:flex-start;cursor:pointer;transition:var(--tr);margin-top:14px}
.ai-ico{width:44px;height:44px;border-radius:12px;background:linear-gradient(135deg,var(--pm),var(--pu));display:flex;align-items:center;justify-content:center;font-size:1.25rem;flex-shrink:0}
.ai-txt h4{font-weight:800;font-size:.9rem;color:var(--pm);margin-bottom:3px}
.ai-txt p{font-size:.81rem;color:var(--tm);line-height:1.6}
.ai-act{display:inline-flex;align-items:center;gap:5px;margin-top:7px;font-size:.77rem;font-weight:800;color:var(--pm)}
.dbot{display:grid;grid-template-columns:1.1fr 1fr;gap:16px;margin-bottom:20px}
.qi,.exam-i{display:flex;align-items:center;gap:12px;padding:11px 0;border-bottom:1px solid var(--bd)}
.qi:last-child,.exam-i:last-child{border-bottom:none}
.qi-ico{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:1.15rem;flex-shrink:0}
.qi-info,.exam-info{flex:1;min-width:0}
.qi-name,.exam-nm{font-weight:700;font-size:.84rem;color:var(--td);white-space:nowrap;overflow:hidden;text-overflow:ellipsis}
.qi-meta,.exam-sb{font-size:.72rem;color:var(--tl);font-weight:600;margin-top:2px}
.qi-sc{text-align:right}
.qi-scv{font-family:'Baloo 2',cursive;font-weight:800;font-size:1rem}
.qi-scv.good{color:var(--gr)}.qi-scv.ok{color:var(--or)}.qi-scv.bad{color:var(--re)}
.qi-scl{font-size:.68rem;font-weight:600;color:var(--tl)}
.bdg-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:10px}
.bdg-c{background:var(--bs);border-radius:13px;padding:14px 10px;text-align:center;border:1.5px solid var(--bd);transition:var(--tr)}
.bdg-c:hover{transform:translateY(-2px);box-shadow:var(--s1)}
.bdg-c.lk{opacity:.42;filter:grayscale(.7)}
.bdg-em{font-size:1.75rem;margin-bottom:5px}
.bdg-nm{font-size:.72rem;font-weight:800;color:var(--td)}
.bdg-ds{font-size:.64rem;color:var(--tl);margin-top:2px}
.exam-dt{width:42px;height:42px;border-radius:11px;background:linear-gradient(135deg,var(--pm),var(--pu));display:flex;flex-direction:column;align-items:center;justify-content:center;color:#fff;flex-shrink:0}
.exam-day{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.05rem;line-height:1}
.exam-mon{font-size:.6rem;font-weight:700;text-transform:uppercase;opacity:.8}
.exam-tag{font-size:.7rem;font-weight:800;padding:3px 9px;border-radius:8px;flex-shrink:0}
.exam-tag.live{background:rgba(240,72,72,.1);color:var(--re)}
.exam-tag.soon{background:rgba(245,166,35,.1);color:var(--or)}
.exam-tag.plan{background:rgba(108,53,222,.1);color:var(--pm)}
.empty-box{text-align:center;padding:30px 0;color:var(--tl)}
.empty-box div:first-child{font-size:2rem;margin-bottom:8px}
.empty-box strong{display:block;font-size:.88rem;color:var(--tm)}
.welcome-card{background:linear-gradient(135deg,rgba(108,53,222,.08),rgba(155,109,255,.04));border:1.5px solid rgba(108,53,222,.16);border-radius:16px;padding:24px;margin-bottom:20px;display:flex;align-items:center;gap:16px}
.wc-icon{font-size:2.5rem;flex-shrink:0}
.wc-txt h3{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.1rem;color:var(--pm);margin-bottom:4px}
.wc-txt p{font-size:.85rem;color:var(--tm);line-height:1.6}
.toast-wrap{position:fixed;bottom:22px;right:22px;z-index:3000;display:flex;flex-direction:column;gap:8px;pointer-events:none}
.toast{background:#fff;border-radius:13px;padding:12px 16px;display:flex;align-items:center;gap:9px;box-shadow:var(--s3);border-left:4px solid var(--pm);font-weight:700;font-size:.84rem;color:var(--td);animation:tin .35s ease forwards;max-width:300px;pointer-events:all}
.toast.ok{border-color:var(--gr)}.toast.err{border-color:var(--re)}.toast.warn{border-color:var(--or)}
@keyframes tin{from{opacity:0;transform:translateX(18px)}to{opacity:1;transform:translateX(0)}}
@keyframes tout{to{opacity:0;transform:translateX(18px)}}
.toast.out{animation:tout .28s ease forwards}
@media(max-width:900px){
  .dl{grid-template-columns:1fr}
  .ds{position:fixed;top:var(--nh);left:-290px;width:var(--sw);height:calc(100vh - var(--nh));z-index:1001;transition:var(--tr);box-shadow:0 20px 60px rgba(20,0,60,.45);transform:none;opacity:1;pointer-events:auto}
  .ds.closed{transform:none;opacity:1;pointer-events:auto}
  .ds.open{left:0}
  .sidebar-overlay.show{display:block}
  .dsr{grid-template-columns:1fr 1fr}
  .dmid,.dbot{grid-template-columns:1fr}
}
@media(max-width:640px){
  .dsr{grid-template-columns:1fr 1fr}
  .bdg-grid{grid-template-columns:1fr 1fr}
  .dm{padding:16px}
  .notif-panel{right:-80px;width:280px}
}
</style>
</head>
<body>

<div class="toast-wrap" id="tw"></div>

<nav class="nav">
  <a class="nav-logo" href="{{ route('home') }}">Quiz<span>ion</span></a>
  <button type="button" class="menu-toggle" id="menuToggle" aria-label="Menüyü aç/kapat">☰</button>

  <div class="nav-right">
    <div class="notif-wrap">
      <button type="button" class="notif-btn" id="notifBtn">
        🔔
        @if($bildirimler->count() > 0)
          <span class="notif-dot"></span>
        @endif
      </button>

      <div class="notif-panel" id="notifPanel">
        <div class="notif-title">🔔 Bildirimler</div>

        @forelse($bildirimler as $bildirim)
          <a class="notif-item" href="{{ route('ogrenci.yaklasan.sinavlar') }}">
            <strong>{{ $bildirim['title'] }}</strong>
            <span>{{ $bildirim['message'] }}</span>
            <span>{{ $bildirim['time'] }}</span>
          </a>
        @empty
          <div class="notif-empty">Henüz bildirimin yok.</div>
        @endforelse

        <a class="dc-lnk" href="{{ route('ogrenci.bildirimler') }}">Tüm bildirimleri gör →</a>
      </div>
    </div>

    <a class="dash-user-chip" href="{{ route('profile.edit') }}">
      <div class="duc-av">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
      <span class="duc-name">{{ $user->name }}</span>
    </a>

    <form method="POST" action="{{ route('logout') }}" style="display:inline;margin:0">
      @csrf
      <button type="submit" class="btn-exit">Çıkış</button>
    </form>
  </div>
</nav>

<div id="vDash">
  <div class="dl sidebar-closed">

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <aside class="ds closed" id="sidebarMenu">
      <div class="ds-uc">
        <div class="ds-top">
          <div class="ds-av">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
          <div>
            <div class="ds-name">{{ $user->name }} {{ $user->surname }}</div>
            <div class="ds-grade">Öğrenci · {{ $user->grade }}</div>
          </div>
        </div>
        <div class="ds-xp-r">
          <span>🔥 Seviye {{ max(1, intdiv($user->xp, 100) + 1) }}</span>
          <span>{{ $user->xp }} XP</span>
        </div>
        <div class="ds-xp-b">
          <div class="ds-xp-f" style="width:{{ min(100, ($user->xp % 100)) }}%"></div>
        </div>
        <div class="ds-streak">🔥 {{ $user->streak }} günlük çalışma serisi!</div>
      </div>

      <div class="ds-lbl">🎓 Öğrenci Paneli</div>

      <a class="ds-ni ac" href="{{ route('ogrenci.dashboard') }}">
        <div class="ds-nicon">🏠</div>Anasayfa
      </a>

      <a class="ds-ni" href="{{ route('ogrenci.yaklasan.sinavlar') }}">
        <div class="ds-nicon">✍️</div>Yaklaşan Sınavlar
        @if($yaklasanSinavlar->count() > 0)
          <span class="ds-nbdg">{{ $yaklasanSinavlar->count() }}</span>
        @endif
      </a>

      <a class="ds-ni" href="{{ route('ogrenci.test.baslat') }}">
        <div class="ds-nicon">🚀</div>Test Çözmeye Başla
      </a>
      <a class="ds-ni sinav-code-btn" href="{{ route('ogrenci.sinav.kodu') }}">
        <div class="ds-nicon">🔑</div>

        <div style="display:flex;flex-direction:column">
          <span style="font-weight:900">Sınav Koduyla Gir</span>

          <span style="
          font-size:.68rem;
          opacity:.82;
          margin-top:2px;
          font-weight:700;
          ">
            Online sınava hızlı katılım
          </span>
        </div>

        <span class="ds-nbdg" style="
        background:white;
        color:#ff7a35;
        font-weight:900;
        ">
          GO
        </span>
      </a>

      <a class="ds-ni" href="{{ route('ogrenci.bildirimler') }}">
        <div class="ds-nicon">🔔</div>Bildirimler
        @if($bildirimler->count() > 0)
          <span class="ds-nbdg">{{ $bildirimler->count() }}</span>
        @endif
      </a>


      <div class="ds-nd"></div>

      <form method="POST" action="{{ route('logout') }}" style="margin:8px 10px 0">
        @csrf
        <button type="submit" class="ds-logout-btn" style="margin:0;width:100%">
          <div class="ds-nicon">🚪</div>Çıkış Yap
        </button>
      </form>
    </aside>

    <main class="dm">

      <div class="dm-wel">
        <div>
          <h2>Merhaba, {{ $user->name }}! 👋</h2>
          <p>Bugün de harika bir gün! Öğrenmeye devam et.</p>
        </div>
        <div class="dm-acts">
          <a href="{{ route('ogrenci.test.baslat') }}">
            <button type="button" class="btn-dp">🚀 Test Çözmeye Başla</button>
          </a>
          <a href="{{ route('ogrenci.yaklasan.sinavlar') }}">
            <button type="button" class="btn-ds">📅 Yaklaşan Sınavlar</button>
          </a>
        </div>
      </div>

      <div class="welcome-card">
        <div class="wc-icon">🎓</div>
        <div class="wc-txt">
          <h3>Quizion'a Hoş Geldin, {{ $user->name }}!</h3>
          <p>
            Sınıfın: <strong>{{ $user->grade }}</strong> ·
            Çözdüğün testlere ve sana tanımlanan sınavlara göre panelin otomatik güncellenir.
          </p>
        </div>
      </div>

      <div class="dsr">
        <a class="dsc c1" href="{{ route('ogrenci.yaklasan.sinavlar') }}">
          <div class="dsc-ico">📝</div>
          <div class="dsc-val">{{ $toplamSinav }}</div>
          <div class="dsc-lbl">Çözülen Test</div>
          <div class="dsc-chg {{ $toplamSinav > 0 ? 'up' : 'nu' }}">
            {{ $toplamSinav > 0 ? 'Çalışmaya devam et!' : 'Henüz test yok' }}
          </div>
        </a>

        <a class="dsc c2" href="{{ route('ogrenci.test.baslat') }}">
          <div class="dsc-ico">🏆</div>
          <div class="dsc-val">%{{ $ortalamaBasari }}</div>
          <div class="dsc-lbl">Ortalama Başarı</div>
          <div class="dsc-chg {{ $ortalamaBasari > 0 ? 'up' : 'nu' }}">
            {{ $ortalamaBasari > 0 ? 'Başarı durumun güncellendi!' : 'İlk testini çöz!' }}
          </div>
        </a>

        <a class="dsc c3" href="{{ route('ogrenci.dashboard') }}">
          <div class="dsc-ico">🔥</div>
          <div class="dsc-val">{{ $user->streak }}</div>
          <div class="dsc-lbl">Günlük Seri</div>
          <div class="dsc-chg up">Seriyi koru!</div>
        </a>

      
      </div>

      <div class="dmid">
        <div class="dc">
          <div class="dc-hd">
            <div class="dc-title">📚 Ders Başarı İzlencesi</div>
            <a class="dc-lnk" href="{{ route('ogrenci.test.baslat') }}">Test Çöz →</a>
          </div>

          @forelse($dersBasariIzlencesi as $ders)
            <a class="spi" href="{{ route('ogrenci.test.baslat') }}">
              <div class="spi-em">{{ $ders['icon'] }}</div>
              <div class="spi-info">
                <div class="spi-row">
                  <span class="spi-nm">{{ $ders['name'] }}</span>
                  <span class="spi-pct">{{ $ders['score'] }}%</span>
                </div>
                <div class="spi-bar">
                  <div class="spi-fill" style="width:{{ $ders['score'] }}%"></div>
                </div>
              </div>
            </a>
          @empty
            <div class="empty-box">
              <div>📚</div>
              <strong>Henüz ders başarı verisi yok</strong>
              <p>Test çözdükçe ders başarı yüzdelerin burada görünecek.</p>
            </div>
          @endforelse
        </div>

        <div class="dc">
          <div class="dc-hd">
            <div class="dc-title">📈 Haftalık Aktivite</div>
            <span style="font-size:.78rem;color:var(--tl);font-weight:600">
              Bu hafta: {{ $buHaftaToplam }} soru
            </span>
          </div>

          <div class="wca" id="wChart"></div>

          <a class="ai-sug" href="{{ route('ogrenci.test.baslat') }}">
            <div class="ai-ico">🤖</div>
            <div class="ai-txt">
              <h4>Yapay Zeka Önerisi</h4>
              <p>
                @if($toplamSinav > 0)
                  {{ $toplamSinav }} test çözdün. Başarını artırmak için farklı kazanımlardan test çözmeye devam et.
                @else
                  Henüz yeterli veri yok. İlk testini çözdükten sonra kişisel öneriler burada görünecek.
                @endif
              </p>
              <div class="ai-act">Test Çöz →</div>
            </div>
          </a>
        </div>
      </div>

      <div class="dbot">
        <div class="dc">
          <div class="dc-hd">
            <div class="dc-title">🗂️ Son Testler</div>
            <a class="dc-lnk" href="{{ route('ogrenci.test.baslat') }}">Yeni Test →</a>
          </div>

          @forelse($sonSinavlar as $sinav)
            <a class="qi" href="{{ route('ogrenci.test.baslat') }}">
              <div class="qi-ico" style="background:rgba(108,53,222,.1);color:var(--pm)">📝</div>
              <div class="qi-info">
                <div class="qi-name">Test Sonucu</div>
                <div class="qi-meta">
                  {{ $sinav->created_at->format('d.m.Y H:i') }}
                  · {{ $sinav->total_questions }} soru
                  · {{ $sinav->correct_count }} doğru
                  · {{ $sinav->wrong_count }} yanlış
                </div>
              </div>
              <div class="qi-sc">
                <div class="qi-scv {{ $sinav->score >= 70 ? 'good' : ($sinav->score >= 50 ? 'ok' : 'bad') }}">
                  %{{ $sinav->score }}
                </div>
                <div class="qi-scl">Başarı</div>
              </div>
            </a>
          @empty
            <div class="empty-box">
              <div>📝</div>
              <strong>Henüz test çözülmedi</strong>
              <p>İlk testini çöz ve sonuçların burada görünsün.</p>
            </div>
          @endforelse
        </div>

        <div style="display:flex;flex-direction:column;gap:16px">
          <div class="dc">
            <div class="dc-hd">
              <div class="dc-title">🏅 Rozetlerim</div>
              <a class="dc-lnk" href="{{ route('ogrenci.test.baslat') }}">Rozet Kazan →</a>
            </div>

            <div class="bdg-grid">
              <a class="bdg-c {{ $user->streak >= 10 ? '' : 'lk' }}" href="{{ route('ogrenci.test.baslat') }}">
                <div class="bdg-em">🔥</div><div class="bdg-nm">Ateş Hızı</div><div class="bdg-ds">10 günlük seri</div>
              </a>
              <a class="bdg-c {{ $ortalamaBasari >= 100 ? '' : 'lk' }}" href="{{ route('ogrenci.test.baslat') }}">
                <div class="bdg-em">🧮</div><div class="bdg-nm">Tam Başarı</div><div class="bdg-ds">%100 başarı</div>
              </a>
              <a class="bdg-c {{ $toplamSoru >= 100 ? '' : 'lk' }}" href="{{ route('ogrenci.test.baslat') }}">
                <div class="bdg-em">⚡</div><div class="bdg-nm">Soru Ustası</div><div class="bdg-ds">100 soru çöz</div>
              </a>
              <a class="bdg-c {{ $user->streak >= 30 ? '' : 'lk' }}" href="{{ route('ogrenci.test.baslat') }}">
                <div class="bdg-em">💎</div><div class="bdg-nm">Elmas</div><div class="bdg-ds">30 günlük seri</div>
              </a>
              <a class="bdg-c {{ $toplamSinav >= 10 ? '' : 'lk' }}" href="{{ route('ogrenci.test.baslat') }}">
                <div class="bdg-em">👑</div><div class="bdg-nm">İstikrarlı</div><div class="bdg-ds">10 test çöz</div>
              </a>
              <a class="bdg-c {{ $ortalamaBasari >= 90 ? '' : 'lk' }}" href="{{ route('ogrenci.test.baslat') }}">
                <div class="bdg-em">🌍</div><div class="bdg-nm">Başarı Pro</div><div class="bdg-ds">%90 başarı</div>
              </a>
            </div>
          </div>

          <div class="dc">
            <div class="dc-hd">
              <div class="dc-title">📅 Yaklaşan Sınavlar</div>
              <a class="dc-lnk" href="{{ route('ogrenci.yaklasan.sinavlar') }}">Tümü →</a>
            </div>

            <a href="{{ route('ogrenci.sinav.kodu') }}" class="exam-code-entry-btn">
              <span>🔑</span>
              Sınav Koduyla Gir
            </a>

            @forelse($yaklasanSinavlar as $sinav)
              @php
                if ($sinav->isFinished()) {
                    $tagClass = 'live';
                    $tagText = 'Bitti';
                } elseif ($sinav->is_active) {
                    $tagClass = 'soon';
                    $tagText = 'Devam Ediyor';
                } elseif ($sinav->started_at) {
                    $tagClass = 'live';
                    $tagText = '⏸ Durduruldu';
                } elseif ($sinav->starts_at && $sinav->starts_at->gt(now())) {
                    $tagClass = 'plan';
                    $tagText = '📋 Yaklaşan';
                } else {
                    $tagClass = 'plan';
                    $tagText = '⏳ Başlatılmadı';
                }
              @endphp

              <a class="exam-i" href="{{ route('ogrenci.yaklasan.sinavlar') }}">
                <div class="exam-dt">
                  <div class="exam-day">{{ $sinav->starts_at->format('d') }}</div>
                  <div class="exam-mon">{{ $sinav->starts_at->locale('tr')->translatedFormat('M') }}</div>
                </div>
                <div class="exam-info">
                  <div class="exam-nm">{{ $sinav->title }}</div>
                  <div class="exam-sb">
                    {{ $sinav->ders ?? 'Genel' }} · {{ $sinav->starts_at->format('H:i') }} · Kod: {{ $sinav->exam_code }}
                  </div>
                </div>
                <span class="exam-tag {{ $tagClass }}">{{ $tagText }}</span>
              </a>
            @empty
              <div class="empty-box">
                <div>📅</div>
                <strong>Yaklaşan sınav yok</strong>
                <p>Öğretmenin sınıfına sınav oluşturduğunda burada görünecek.</p>
              </div>
            @endforelse
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

@php
    $weeklyData = collect($haftalikAktivite)->map(function($item) {
        return [
            'd' => $item['gun'],
            'v' => (int) $item['soru'],
            'c' => 'var(--pm)',
        ];
    })->values();
@endphp

<script>
const WD = @json($weeklyData);

function buildWeeklyChart(){
  const el = document.getElementById('wChart');
  if(!el) return;

  const max = Math.max(...WD.map(d => d.v), 1);

  el.innerHTML = WD.map(d => `
    <div class="wb-w">
      <div class="wb-v">${d.v}</div>
      <div class="wb" style="height:${Math.max(4, (d.v / max * 100))}%;background:${d.c}"></div>
      <div class="wb-d">${d.d}</div>
    </div>
  `).join('');
}

buildWeeklyChart();

const menuToggle = document.getElementById('menuToggle');
const sidebarMenu = document.getElementById('sidebarMenu');
const sidebarOverlay = document.getElementById('sidebarOverlay');
const dashboardLayout = document.querySelector('.dl');

function closeSidebar(){
  sidebarMenu?.classList.remove('open');
  sidebarOverlay?.classList.remove('show');
}

function closeDesktopSidebar(){
  sidebarMenu?.classList.add('closed');
  dashboardLayout?.classList.add('sidebar-closed');
}

function openDesktopSidebar(){
  sidebarMenu?.classList.remove('closed');
  dashboardLayout?.classList.remove('sidebar-closed');
}

menuToggle?.addEventListener('click', () => {
  if(window.innerWidth <= 900){
    sidebarMenu?.classList.remove('closed');
    dashboardLayout?.classList.remove('sidebar-closed');
    sidebarMenu?.classList.toggle('open');
    sidebarOverlay?.classList.toggle('show');
  }else{
    closeSidebar();
    sidebarMenu?.classList.contains('closed') ? openDesktopSidebar() : closeDesktopSidebar();
  }
});

sidebarOverlay?.addEventListener('click', closeSidebar);

window.addEventListener('resize', () => {
  if(window.innerWidth <= 900){
    openDesktopSidebar();
  }else{
    closeSidebar();
    closeDesktopSidebar();
  }
});

document.querySelectorAll('.ds a').forEach(link => {
  link.addEventListener('click', () => {
    if(window.innerWidth <= 900){
      closeSidebar();
    }
  });
});

const notifBtn = document.getElementById('notifBtn');
const notifPanel = document.getElementById('notifPanel');

notifBtn?.addEventListener('click', (e) => {
  e.stopPropagation();
  notifPanel?.classList.toggle('show');
});

document.addEventListener('click', () => {
  notifPanel?.classList.remove('show');
});

notifPanel?.addEventListener('click', (e) => {
  e.stopPropagation();
});

function toast(msg, type = 'info'){
  const c = document.getElementById('tw');
  const t = document.createElement('div');

  t.className = 'toast ' + (
    type === 'ok' ? 'ok' :
    type === 'err' ? 'err' :
    type === 'warn' ? 'warn' : ''
  );

  t.innerHTML = msg;
  c.appendChild(t);

  setTimeout(() => {
    t.classList.add('out');
    setTimeout(() => t.remove(), 280);
  }, 3200);
}
</script>
</body>
</html>