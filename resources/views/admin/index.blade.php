<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Quizion – Admin Paneli</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@400;600;700;800&display=swap" rel="stylesheet"/>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --pu:#3d1a8e;--pm:#6c35de;--pl:#9b6dff;--pp:#ede7ff;
  --or:#f5a623;--gr:#3acaaa;--re:#f04848;--bl:#3b82f6;
  --td:#1e0e4b;--tm:#5a4a7a;--tl:#8878aa;
  --bg:#f4f0ff;--bs:#f8f4ff;--bd:#ede7ff;
  --nh:64px;--sw:240px;
  --tr:.3s cubic-bezier(.4,0,.2,1);
  --s1:0 2px 12px rgba(61,26,142,.07);
  --s2:0 8px 28px rgba(61,26,142,.13);
  --s3:0 20px 60px rgba(61,26,142,.22);
}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--td);margin:0;overflow-x:hidden}
a{text-decoration:none;color:inherit}

/* NAV */
.nav{position:fixed;top:0;left:0;right:0;height:var(--nh);background:rgba(20,0,50,.97);backdrop-filter:blur(22px);border-bottom:1px solid rgba(155,109,255,.2);display:flex;align-items:center;padding:0 28px;gap:12px;z-index:1000;box-shadow:0 4px 28px rgba(20,0,60,.45)}
.nav-logo{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.5rem;color:#fff;text-decoration:none;letter-spacing:-.5px}
.nav-logo span{color:var(--or)}
.nav-badge{background:linear-gradient(135deg,var(--re),#c0392b);color:#fff;font-size:.68rem;font-weight:800;padding:3px 9px;border-radius:8px;letter-spacing:.5px;text-transform:uppercase}
.nav-right{display:flex;align-items:center;gap:10px;margin-left:auto}
.nav-user{display:flex;align-items:center;gap:8px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);border-radius:10px;padding:5px 12px 5px 7px}
.nav-av{width:28px;height:28px;border-radius:8px;background:linear-gradient(135deg,var(--re),#c0392b);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:.85rem;color:#fff}
.nav-nm{font-size:.8rem;font-weight:700;color:#fff}
.btn-exit{background:rgba(255,100,100,.2);border:1px solid rgba(255,100,100,.3);color:#ffb3b3;font-family:'Nunito',sans-serif;font-weight:700;font-size:.8rem;padding:6px 13px;border-radius:9px;cursor:pointer;transition:var(--tr)}
.btn-exit:hover{background:rgba(255,100,100,.3)}
.nav-site-link{background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.2);color:#fff;font-family:'Nunito',sans-serif;font-weight:700;font-size:.8rem;padding:6px 13px;border-radius:9px;transition:var(--tr);text-decoration:none}
.nav-site-link:hover{background:rgba(255,255,255,.18)}

/* LAYOUT */
.layout{display:grid;grid-template-columns:var(--sw) 1fr;min-height:calc(100vh - var(--nh));padding-top:var(--nh)}

/* SIDEBAR */
.sidebar{background:linear-gradient(180deg,#140032 0%,#200050 100%);border-right:1px solid rgba(155,109,255,.12);padding:20px 0;position:sticky;top:var(--nh);height:calc(100vh - var(--nh));overflow-y:auto;display:flex;flex-direction:column}
.sidebar::-webkit-scrollbar{width:3px}
.sidebar::-webkit-scrollbar-thumb{background:rgba(255,255,255,.14);border-radius:3px}
.sb-lbl{font-size:.64rem;font-weight:800;letter-spacing:1.2px;text-transform:uppercase;color:rgba(255,255,255,.3);padding:14px 18px 6px}
.sb-item{display:flex;align-items:center;gap:10px;padding:10px 16px;color:rgba(255,255,255,.72);font-weight:700;font-size:.87rem;cursor:pointer;transition:var(--tr);margin:2px 10px;border-radius:11px;border:1px solid transparent;text-decoration:none}
.sb-item:hover{background:rgba(255,255,255,.1);color:#fff}
.sb-item.ac{background:linear-gradient(135deg,rgba(240,72,72,.2),rgba(192,57,43,.1));color:#fff;border-color:rgba(240,72,72,.3)}
.sb-ico{width:30px;height:30px;border-radius:8px;background:rgba(255,255,255,.08);display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:800;color:rgba(255,255,255,.6);flex-shrink:0}
.sb-item:hover .sb-ico,.sb-item.ac .sb-ico{background:rgba(255,255,255,.16);color:#fff}
.sb-badge{background:var(--re);color:#fff;font-size:.62rem;font-weight:800;min-width:18px;height:18px;border-radius:9px;display:flex;align-items:center;justify-content:center;padding:0 4px;margin-left:auto}
.sb-div{height:1px;background:rgba(255,255,255,.07);margin:10px 14px}

/* MAIN */
.main{padding:28px 30px;overflow-y:auto}

/* ALERTS */
.alert-ok{background:rgba(58,202,170,.1);border:1.5px solid rgba(58,202,170,.3);border-radius:12px;padding:12px 16px;font-size:.85rem;font-weight:700;color:#0f7a66;margin-bottom:16px}
.alert-err{background:#fff0f0;border:1.5px solid #ffcece;border-radius:12px;padding:12px 16px;font-size:.85rem;font-weight:700;color:var(--re);margin-bottom:16px}

/* PAGE HEADER */
.page-hd{margin-bottom:22px}
.page-title{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.5rem;color:var(--td)}
.page-sub{color:var(--tm);font-size:.85rem;margin-top:3px}

/* STAT CARDS */
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px;margin-bottom:24px}
.stat-card{background:#fff;border-radius:16px;padding:18px;border:1px solid var(--bd);box-shadow:var(--s1);transition:var(--tr);position:relative;overflow:hidden}
.stat-card:hover{transform:translateY(-3px);box-shadow:var(--s2)}
.stat-ico{width:42px;height:42px;border-radius:11px;display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:800;margin-bottom:12px}
.stat-card.s1 .stat-ico{background:rgba(108,53,222,.1);color:var(--pm)}
.stat-card.s2 .stat-ico{background:rgba(245,166,35,.1);color:var(--or)}
.stat-card.s3 .stat-ico{background:rgba(58,202,170,.1);color:var(--gr)}
.stat-card.s4 .stat-ico{background:rgba(240,72,72,.1);color:var(--re)}
.stat-card.s5 .stat-ico{background:rgba(59,130,246,.1);color:var(--bl)}
.stat-card.s6 .stat-ico{background:rgba(139,92,246,.1);color:#8b5cf6}
.stat-card.s7 .stat-ico{background:rgba(245,166,35,.1);color:var(--or)}
.stat-val{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.65rem;color:var(--td);line-height:1}
.stat-lbl{font-size:.78rem;color:var(--tm);font-weight:600;margin-top:4px}

/* TABS */
.tabs{display:flex;gap:4px;background:var(--bs);border-radius:12px;padding:4px;margin-bottom:20px;border:1px solid var(--bd)}
.tab-btn{flex:1;background:none;border:none;font-family:'Nunito',sans-serif;font-weight:700;font-size:.84rem;color:var(--tl);padding:9px 12px;border-radius:9px;cursor:pointer;transition:var(--tr)}
.tab-btn.ac{background:#fff;color:var(--pm);box-shadow:var(--s1);font-weight:800}
.tab-pane{display:none}
.tab-pane.ac{display:block}

/* SECTION */
.section{background:#fff;border-radius:16px;border:1px solid var(--bd);box-shadow:var(--s1);margin-bottom:20px;overflow:hidden}
.section-hd{display:flex;justify-content:space-between;align-items:center;padding:16px 20px;border-bottom:1px solid var(--bd)}
.section-title{font-family:'Baloo 2',cursive;font-weight:700;font-size:.97rem;color:var(--td)}
.section-cnt{font-size:.75rem;font-weight:700;background:var(--pp);color:var(--pm);padding:3px 10px;border-radius:8px}

/* TABLE */
.tbl{width:100%;border-collapse:collapse}
.tbl th{text-align:left;font-size:.73rem;font-weight:800;color:var(--tl);text-transform:uppercase;letter-spacing:.5px;padding:10px 16px;border-bottom:2px solid var(--bd);background:var(--bs)}
.tbl td{padding:12px 16px;border-bottom:1px solid var(--bd);font-size:.84rem;color:var(--td);vertical-align:middle}
.tbl tr:last-child td{border-bottom:none}
.tbl tr:hover td{background:var(--bs)}

/* BADGES */
.badge{display:inline-flex;padding:3px 9px;border-radius:7px;font-size:.72rem;font-weight:800}
.badge-ogrenci{background:rgba(108,53,222,.1);color:var(--pm)}
.badge-ogretmen{background:rgba(58,202,170,.1);color:#0f7a66}
.badge-admin{background:rgba(240,72,72,.1);color:var(--re)}
.badge-aktif{background:rgba(58,202,170,.1);color:#0f7a66}
.badge-pasif{background:var(--pp);color:var(--pm)}
.badge-yayin{background:rgba(58,202,170,.1);color:#0f7a66}
.badge-gizli{background:rgba(245,166,35,.1);color:#b37700}

/* BUTTONS */
.btn-danger{background:rgba(240,72,72,.08);border:1px solid rgba(240,72,72,.2);color:var(--re);border-radius:8px;padding:5px 12px;font-size:.76rem;font-weight:800;cursor:pointer;font-family:'Nunito',sans-serif;transition:var(--tr)}
.btn-danger:hover{background:rgba(240,72,72,.18)}
.btn-warn{background:rgba(245,166,35,.08);border:1px solid rgba(245,166,35,.2);color:#b37700;border-radius:8px;padding:5px 12px;font-size:.76rem;font-weight:800;cursor:pointer;font-family:'Nunito',sans-serif;transition:var(--tr)}
.btn-warn:hover{background:rgba(245,166,35,.18)}
.btn-success{background:rgba(58,202,170,.08);border:1px solid rgba(58,202,170,.2);color:#0f7a66;border-radius:8px;padding:5px 12px;font-size:.76rem;font-weight:800;cursor:pointer;font-family:'Nunito',sans-serif;transition:var(--tr)}
.btn-success:hover{background:rgba(58,202,170,.18)}
.btn-primary{background:rgba(108,53,222,.08);border:1px solid rgba(108,53,222,.2);color:var(--pm);border-radius:8px;padding:5px 12px;font-size:.76rem;font-weight:800;cursor:pointer;font-family:'Nunito',sans-serif;transition:var(--tr)}
.btn-primary:hover{background:rgba(108,53,222,.18)}
.btn-acts{display:flex;gap:5px;flex-wrap:wrap}

/* ROLE SELECT */
.role-form{display:inline-flex;align-items:center;gap:6px}
.role-sel{padding:4px 8px;border:1.5px solid var(--bd);border-radius:8px;font-family:'Nunito',sans-serif;font-size:.76rem;font-weight:700;color:var(--td);background:var(--bs);cursor:pointer;outline:none}
.role-sel:focus{border-color:var(--pl)}

/* USER AVATAR */
.u-av{width:34px;height:34px;border-radius:10px;background:linear-gradient(135deg,var(--pm),var(--pu));display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:.88rem;flex-shrink:0}

/* YORUM */
.review-item{padding:16px 20px;border-bottom:1px solid var(--bd)}
.review-item:last-child{border-bottom:none}
.review-item:hover{background:var(--bs)}
.review-top{display:flex;justify-content:space-between;align-items:flex-start;gap:12px;margin-bottom:8px}
.review-left{display:flex;align-items:center;gap:10px}
.review-av{width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,var(--pm),var(--pu));display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:.9rem;flex-shrink:0}
.review-name{font-weight:800;font-size:.87rem;color:var(--td)}
.review-role-lbl{font-size:.72rem;color:var(--tl);font-weight:600;margin-top:2px}
.review-right{display:flex;align-items:center;gap:8px;flex-shrink:0}
.review-stars{color:var(--or);font-size:.85rem;letter-spacing:1px}
.review-date{font-size:.7rem;color:var(--tl);font-weight:600}
.review-msg{font-size:.84rem;color:var(--tm);line-height:1.6;font-style:italic;margin-bottom:10px;padding-left:46px}
.review-acts{display:flex;gap:6px;padding-left:46px}

/* EMPTY */
.empty-box{text-align:center;padding:36px;color:var(--tl)}
.empty-box-t{font-weight:700;font-size:.9rem;color:var(--tm);margin-top:8px}
.empty-box-s{font-size:.8rem;margin-top:4px}

/* İSTATİSTİK */
.stat-row{display:flex;justify-content:space-between;align-items:center;padding:9px 0;border-bottom:1px solid var(--bd)}
.stat-row:last-child{border-bottom:none}
.stat-row-lbl{font-size:.84rem;color:var(--tm);font-weight:600}
.stat-row-val{font-family:'Baloo 2',cursive;font-weight:800;font-size:1rem;color:var(--td)}
.progress-bar{background:var(--bd);border-radius:8px;height:8px;overflow:hidden;margin-top:6px}
.progress-fill{height:100%;border-radius:8px}

/* CONFIRM MODAL */
.modal-bg{position:fixed;inset:0;background:rgba(6,0,22,.75);backdrop-filter:blur(12px);z-index:2000;display:flex;align-items:center;justify-content:center;opacity:0;pointer-events:none;transition:opacity .3s}
.modal-bg.open{opacity:1;pointer-events:all}
.modal{background:#fff;border-radius:20px;padding:28px;width:100%;max-width:400px;margin:16px;box-shadow:var(--s3);transform:scale(.93);transition:transform .3s}
.modal-bg.open .modal{transform:scale(1)}
.modal-title{font-family:'Baloo 2',cursive;font-weight:800;font-size:1.1rem;color:var(--td);margin-bottom:8px}
.modal-text{font-size:.87rem;color:var(--tm);margin-bottom:20px;line-height:1.6}
.modal-acts{display:flex;gap:10px;justify-content:flex-end}
.btn-cancel{background:var(--bs);border:1.5px solid var(--bd);color:var(--tm);font-family:'Nunito',sans-serif;font-weight:700;font-size:.87rem;padding:9px 18px;border-radius:10px;cursor:pointer}
.btn-confirm-del{background:linear-gradient(135deg,var(--re),#c0392b);border:none;color:#fff;font-family:'Nunito',sans-serif;font-weight:800;font-size:.87rem;padding:9px 18px;border-radius:10px;cursor:pointer}

/* TOAST */
.toast-wrap{position:fixed;bottom:22px;right:22px;z-index:3000;display:flex;flex-direction:column;gap:8px;pointer-events:none}
.toast{background:#fff;border-radius:13px;padding:12px 16px;display:flex;align-items:center;gap:9px;box-shadow:var(--s3);border-left:4px solid var(--pm);font-weight:700;font-size:.84rem;color:var(--td);animation:tin .35s ease forwards;max-width:300px}
.toast.ok{border-color:var(--gr)}.toast.err{border-color:var(--re)}.toast.warn{border-color:var(--or)}
@keyframes tin{from{opacity:0;transform:translateX(18px)}to{opacity:1;transform:translateX(0)}}
@keyframes tout{to{opacity:0;transform:translateX(18px)}}
.toast.out{animation:tout .28s ease forwards}

@media(max-width:900px){
  .layout{grid-template-columns:1fr}
  .sidebar{display:none}
  .stats-grid{grid-template-columns:1fr 1fr}
}
@media(max-width:640px){
  .stats-grid{grid-template-columns:1fr 1fr}
  .main{padding:16px}
}
</style>
</head>
<body>

<div class="toast-wrap" id="tw"></div>

<!-- ONAY MODAL -->
<div class="modal-bg" id="confirmModal">
  <div class="modal">
    <div class="modal-title" id="confirmTitle">Emin misiniz?</div>
    <div class="modal-text" id="confirmText">Bu işlemi geri alamazsınız.</div>
    <div class="modal-acts">
      <button type="button" class="btn-cancel" onclick="closeConfirm()">İptal</button>
      <form id="confirmForm" method="POST" style="display:inline">
        @csrf
        <input type="hidden" name="_method" id="confirmMethod" value="DELETE"/>
        <button type="submit" class="btn-confirm-del">Onayla</button>
      </form>
    </div>
  </div>
</div>

<!-- NAV -->
<nav class="nav">
  <a class="nav-logo" href="{{ route('admin.index') }}">Quiz<span>ion</span></a>
  <span class="nav-badge">Admin</span>
  <div class="nav-right">
    <a class="nav-site-link" href="{{ route('home') }}">Siteye Dön</a>
    <div class="nav-user">
      <div class="nav-av">{{ strtoupper(substr(auth()->user()->name,0,1)) }}</div>
      <span class="nav-nm">{{ auth()->user()->name }}</span>
    </div>
    <form method="POST" action="{{ route('logout') }}" style="display:inline;margin:0">
      @csrf
      <button type="submit" class="btn-exit">Çıkış</button>
    </form>
  </div>
</nav>

<!-- LAYOUT -->
<div class="layout">

  <!-- SIDEBAR -->
  <aside class="sidebar">
    <div class="sb-lbl">Genel</div>
    <a class="sb-item ac" href="{{ route('admin.index') }}">
      <div class="sb-ico">P</div>Admin Paneli
    </a>

    <div class="sb-div"></div>
    <div class="sb-lbl">Yönetim</div>
    <a class="sb-item" href="#" onclick="showTab('kullanicilar');return false">
      <div class="sb-ico">K</div>Kullanıcılar
      <span class="sb-badge">{{ $stats['users'] }}</span>
    </a>
    <a class="sb-item" href="#" onclick="showTab('yorumlar');return false">
      <div class="sb-ico">Y</div>Yorumlar
      <span class="sb-badge">{{ $stats['reviews'] }}</span>
    </a>
    <a class="sb-item" href="#" onclick="showTab('sinavlar');return false">
      <div class="sb-ico">S</div>Sınavlar
      <span class="sb-badge">{{ $stats['exams'] }}</span>
    </a>

    <div class="sb-div"></div>
    <div class="sb-lbl">Raporlar</div>
    <a class="sb-item" href="#" onclick="showTab('istatistik');return false">
      <div class="sb-ico">İ</div>İstatistikler
    </a>
  </aside>

  <!-- MAIN -->
  <main class="main">

    @if(session('success'))
      <div class="alert-ok">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="alert-err">{{ session('error') }}</div>
    @endif

    <div class="page-hd">
      <div class="page-title">Admin Paneli</div>
      <div class="page-sub">Quizion yönetim merkezi &middot; {{ now()->format('d.m.Y H:i') }}</div>
    </div>

    <!-- STAT CARDS -->
    <div class="stats-grid">
      <div class="stat-card s1">
        <div class="stat-ico">KUL</div>
        <div class="stat-val">{{ $stats['users'] }}</div>
        <div class="stat-lbl">Toplam Kullanıcı</div>
      </div>
      <div class="stat-card s2">
        <div class="stat-ico">ÖĞR</div>
        <div class="stat-val">{{ $stats['students'] }}</div>
        <div class="stat-lbl">Öğrenci</div>
      </div>
      <div class="stat-card s3">
        <div class="stat-ico">ÖĞT</div>
        <div class="stat-val">{{ $stats['teachers'] }}</div>
        <div class="stat-lbl">Öğretmen</div>
      </div>
      <div class="stat-card s4">
        <div class="stat-ico">SIN</div>
        <div class="stat-val">{{ $stats['exams'] }}</div>
        <div class="stat-lbl">Toplam Sınav</div>
      </div>
      <div class="stat-card s5">
        <div class="stat-ico">SON</div>
        <div class="stat-val">{{ $stats['results'] }}</div>
        <div class="stat-lbl">Test Sonucu</div>
      </div>
      <div class="stat-card s6">
        <div class="stat-ico">SOR</div>
        <div class="stat-val">{{ $stats['questions'] }}</div>
        <div class="stat-lbl">Soru Bankası</div>
      </div>
      <div class="stat-card s7">
        <div class="stat-ico">YOR</div>
        <div class="stat-val">{{ $stats['reviews'] }}</div>
        <div class="stat-lbl">Yorum</div>
      </div>
    </div>

    <!-- TABS -->
    <div class="tabs">
      <button type="button" class="tab-btn ac" id="tab-kullanicilar" onclick="showTab('kullanicilar')">Kullanıcılar</button>
      <button type="button" class="tab-btn" id="tab-yorumlar" onclick="showTab('yorumlar')">Yorumlar</button>
      <button type="button" class="tab-btn" id="tab-sinavlar" onclick="showTab('sinavlar')">Sınavlar</button>
      <button type="button" class="tab-btn" id="tab-istatistik" onclick="showTab('istatistik')">İstatistik</button>
    </div>

    <!-- KULLANICILAR -->
    <div class="tab-pane ac" id="pane-kullanicilar">
      <div class="section">
        <div class="section-hd">
          <div class="section-title">Kullanıcı Yönetimi</div>
          <span class="section-cnt">{{ $users->count() }} kullanıcı</span>
        </div>
        @if($users->isEmpty())
          <div class="empty-box">
            <div class="empty-box-t">Kullanıcı bulunamadı</div>
          </div>
        @else
        <div style="overflow-x:auto">
          <table class="tbl">
            <thead>
              <tr>
                <th>#</th>
                <th>Ad Soyad</th>
                <th>E-posta</th>
                <th>Rol</th>
                <th>Sınıf / Branş</th>
                <th>XP</th>
                <th>İşlemler</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $u)
              <tr>
                <td style="color:var(--tl);font-weight:700;font-size:.8rem">{{ $u->id }}</td>
                <td>
                  <div style="display:flex;align-items:center;gap:8px">
                    <div class="u-av">{{ strtoupper(substr($u->name,0,1)) }}</div>
                    <div>
                      <div style="font-weight:700;font-size:.85rem">{{ $u->name }} {{ $u->surname }}</div>
                      @if($u->is_admin)
                        <span class="badge badge-admin">Admin</span>
                      @endif
                    </div>
                  </div>
                </td>
                <td style="color:var(--tl);font-size:.8rem">{{ $u->email }}</td>
                <td>
                  <form method="POST" action="{{ route('admin.user.role', $u->id) }}" class="role-form">
                    @csrf
                    @method('PATCH')
                    <select name="role" class="role-sel" onchange="this.form.submit()">
                      <option value="ogrenci" @selected($u->role === 'ogrenci')>Öğrenci</option>
                      <option value="ogretmen" @selected($u->role === 'ogretmen')>Öğretmen</option>
                    </select>
                  </form>
                </td>
                <td style="font-size:.8rem;color:var(--tm)">
                  @if($u->role === 'ogrenci')
                    {{ $u->grade ?? '-' }}
                  @else
                    {{ $u->branch ?? '-' }}
                  @endif
                </td>
                <td>
                  <span style="font-family:'Baloo 2',cursive;font-weight:800;color:var(--pm)">{{ $u->xp }}</span>
                </td>
                <td>
                  <div class="btn-acts">
                    @if(auth()->id() !== $u->id)
                      <form method="POST" action="{{ route('admin.user.toggle', $u->id) }}" style="display:inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="{{ $u->is_admin ? 'btn-warn' : 'btn-primary' }}">
                          {{ $u->is_admin ? 'Admin Kaldır' : 'Admin Yap' }}
                        </button>
                      </form>
                      @if(!$u->is_admin)
                        <button type="button" class="btn-danger"
                          onclick="confirmDelete(
                            '{{ route('admin.user.delete', $u->id) }}',
                            'Kullanıcı Sil',
                            '{{ addslashes($u->name) }} adlı kullanıcıyı silmek istiyor musunuz?'
                          )">Sil</button>
                      @endif
                    @else
                      <span style="font-size:.75rem;color:var(--tl);font-weight:600">Siz</span>
                    @endif
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>

    <!-- YORUMLAR -->
    <div class="tab-pane" id="pane-yorumlar">
      <div class="section">
        <div class="section-hd">
          <div class="section-title">Yorum Yönetimi</div>
          <span class="section-cnt">{{ $reviews->count() }} yorum</span>
        </div>
        @if($reviews->isEmpty())
          <div class="empty-box">
            <div class="empty-box-t">Henüz yorum yok</div>
            <div class="empty-box-s">Kullanıcılar yorum yaptığında burada görünecek</div>
          </div>
        @else
          @foreach($reviews as $review)
          <div class="review-item">
            <div class="review-top">
              <div class="review-left">
                <div class="review-av">{{ strtoupper(substr($review->name,0,1)) }}</div>
                <div>
                  <div class="review-name">{{ $review->name }}</div>
                  <div class="review-role-lbl">{{ $review->role }}</div>
                </div>
              </div>
              <div class="review-right">
                <div class="review-stars">
                  @for($i = 1; $i <= 5; $i++)
                    {{ $i <= $review->star ? '★' : '☆' }}
                  @endfor
                </div>
                @if($review->approved)
                  <span class="badge badge-yayin">Yayında</span>
                @else
                  <span class="badge badge-gizli">Gizli</span>
                @endif
                <div class="review-date">{{ $review->created_at->format('d.m.Y') }}</div>
              </div>
            </div>
            <div class="review-msg">"{{ $review->message }}"</div>
            <div class="review-acts">
              <form method="POST" action="{{ route('admin.review.toggle', $review->id) }}" style="display:inline">
                @csrf
                @method('PATCH')
                <button type="submit" class="{{ $review->approved ? 'btn-warn' : 'btn-success' }}">
                  {{ $review->approved ? 'Gizle' : 'Yayınla' }}
                </button>
              </form>
              <button type="button" class="btn-danger"
                onclick="confirmDelete(
                  '{{ route('admin.review.delete', $review->id) }}',
                  'Yorum Sil',
                  'Bu yorumu silmek istiyor musunuz?'
                )">Sil</button>
            </div>
          </div>
          @endforeach
        @endif
      </div>
    </div>

    <!-- SINAVLAR -->
    <div class="tab-pane" id="pane-sinavlar">
      <div class="section">
        <div class="section-hd">
          <div class="section-title">Sınav Yönetimi</div>
          <span class="section-cnt">{{ $exams->count() }} sınav</span>
        </div>
        @if($exams->isEmpty())
          <div class="empty-box">
            <div class="empty-box-t">Henüz sınav oluşturulmamış</div>
            <div class="empty-box-s">Öğretmenler sınav oluşturduğunda burada görünecek</div>
          </div>
        @else
        <div style="overflow-x:auto">
          <table class="tbl">
            <thead>
              <tr>
                <th>#</th>
                <th>Sınav Adı</th>
                <th>Öğretmen</th>
                <th>Ders</th>
                <th>Sınıf</th>
                <th>Kod</th>
                <th>Tarih</th>
                <th>Durum</th>
                <th>İşlem</th>
              </tr>
            </thead>
            <tbody>
              @foreach($exams as $exam)
              <tr>
                <td style="color:var(--tl);font-weight:700;font-size:.8rem">{{ $exam->id }}</td>
                <td style="font-weight:700;font-size:.85rem">{{ $exam->title }}</td>
                <td style="font-size:.8rem;color:var(--tm)">
                  {{ $exam->teacher ? $exam->teacher->name : '-' }}
                </td>
                <td style="font-size:.8rem;color:var(--tm)">{{ $exam->ders ?? '-' }}</td>
                <td style="font-size:.82rem">{{ $exam->grade }}</td>
                <td>
                  <span style="font-family:'Baloo 2',cursive;font-weight:800;color:var(--pm);letter-spacing:1px;font-size:.9rem">
                    {{ $exam->exam_code }}
                  </span>
                </td>
                <td style="font-size:.78rem;color:var(--tl)">
                  {{ $exam->starts_at ? $exam->starts_at->format('d.m.Y H:i') : '-' }}
                </td>
                <td>
                  @if($exam->is_active)
                    <span class="badge badge-aktif">Aktif</span>
                  @else
                    <span class="badge badge-pasif">Pasif</span>
                  @endif
                </td>
                <td>
                  <button type="button" class="btn-danger"
                    onclick="confirmDelete(
                      '{{ route('admin.exam.delete', $exam->id) }}',
                      'Sınav Sil',
                      '{{ addslashes($exam->title) }} sınavını silmek istiyor musunuz?'
                    )">Sil</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        @endif
      </div>
    </div>

    <!-- İSTATİSTİK -->
    <div class="tab-pane" id="pane-istatistik">
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px">

        <div class="section">
          <div class="section-hd"><div class="section-title">Kullanıcı Dağılımı</div></div>
          <div style="padding:20px">
            @php
              $total = $stats['users'] > 0 ? $stats['users'] : 1;
              $studentPct = round($stats['students'] / $total * 100);
              $teacherPct = round($stats['teachers'] / $total * 100);
            @endphp
            <div style="margin-bottom:16px">
              <div style="display:flex;justify-content:space-between;font-size:.83rem;font-weight:700;margin-bottom:6px">
                <span style="color:var(--tm)">Öğrenci</span>
                <span style="color:var(--pm)">{{ $stats['students'] }} kullanıcı ({{ $studentPct }}%)</span>
              </div>
              <div class="progress-bar">
                <div class="progress-fill" style="width:{{ $studentPct }}%;background:linear-gradient(90deg,var(--pm),var(--pl))"></div>
              </div>
            </div>
            <div>
              <div style="display:flex;justify-content:space-between;font-size:.83rem;font-weight:700;margin-bottom:6px">
                <span style="color:var(--tm)">Öğretmen</span>
                <span style="color:var(--gr)">{{ $stats['teachers'] }} kullanıcı ({{ $teacherPct }}%)</span>
              </div>
              <div class="progress-bar">
                <div class="progress-fill" style="width:{{ $teacherPct }}%;background:linear-gradient(90deg,var(--gr),#1da18a)"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="section">
          <div class="section-hd"><div class="section-title">Platform Özeti</div></div>
          <div style="padding:20px">
            <div class="stat-row">
              <span class="stat-row-lbl">Toplam Kullanıcı</span>
              <span class="stat-row-val">{{ $stats['users'] }}</span>
            </div>
            <div class="stat-row">
              <span class="stat-row-lbl">Toplam Öğrenci</span>
              <span class="stat-row-val">{{ $stats['students'] }}</span>
            </div>
            <div class="stat-row">
              <span class="stat-row-lbl">Toplam Öğretmen</span>
              <span class="stat-row-val">{{ $stats['teachers'] }}</span>
            </div>
            <div class="stat-row">
              <span class="stat-row-lbl">Soru Bankası</span>
              <span class="stat-row-val">{{ $stats['questions'] }}</span>
            </div>
            <div class="stat-row">
              <span class="stat-row-lbl">Toplam Sınav</span>
              <span class="stat-row-val">{{ $stats['exams'] }}</span>
            </div>
            <div class="stat-row">
              <span class="stat-row-lbl">Çözülen Test</span>
              <span class="stat-row-val">{{ $stats['results'] }}</span>
            </div>
            <div class="stat-row">
              <span class="stat-row-lbl">Toplam Yorum</span>
              <span class="stat-row-val">{{ $stats['reviews'] }}</span>
            </div>
          </div>
        </div>

      </div>
    </div>

  </main>
</div>

<script>
function showTab(name) {
  document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('ac'));
  document.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('ac'));
  document.getElementById('tab-' + name).classList.add('ac');
  document.getElementById('pane-' + name).classList.add('ac');
}

function confirmDelete(action, title, text) {
  document.getElementById('confirmTitle').textContent = title;
  document.getElementById('confirmText').textContent  = text;
  document.getElementById('confirmForm').action       = action;
  document.getElementById('confirmMethod').value      = 'DELETE';
  document.getElementById('confirmModal').classList.add('open');
}

function closeConfirm() {
  document.getElementById('confirmModal').classList.remove('open');
}

document.addEventListener('keydown', e => {
  if (e.key === 'Escape') closeConfirm();
});

function toast(msg, type = 'info') {
  const c = document.getElementById('tw');
  const t = document.createElement('div');
  t.className = 'toast ' + (type === 'ok' ? 'ok' : type === 'err' ? 'err' : type === 'warn' ? 'warn' : '');
  t.innerHTML = msg;
  c.appendChild(t);
  setTimeout(() => { t.classList.add('out'); setTimeout(() => t.remove(), 280); }, 3200);
}

@if(session('success'))
  document.addEventListener('DOMContentLoaded', () => toast('{{ session("success") }}', 'ok'));
@endif
@if(session('error'))
  document.addEventListener('DOMContentLoaded', () => toast('{{ session("error") }}', 'err'));
@endif
</script>
</body>
</html>