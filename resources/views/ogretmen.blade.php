<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizion — Öğretmen Paneli</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@600;700;800&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Nunito',sans-serif;background:#F4F2FF;color:#24114f;}

/* ── TOPBAR ── */
.topbar{
    height:64px;background:#3A1C71;
    display:flex;align-items:center;padding:0 20px;gap:14px;
    position:fixed;top:0;left:0;right:0;z-index:100;
    box-shadow:0 4px 20px rgba(58,28,113,.35);
}
.logo{font-family:'Baloo 2',cursive;font-size:1.6rem;font-weight:900;color:white;text-decoration:none;}
.logo span{color:#C084FC;}
.hamburger{background:none;border:none;cursor:pointer;display:flex;flex-direction:column;gap:5px;padding:6px;}
.hamburger span{display:block;width:22px;height:2px;background:white;border-radius:2px;transition:all .3s;}
.topbar-right{margin-left:auto;display:flex;align-items:center;gap:12px;}
.user-badge{background:rgba(192,132,252,.25);color:#E9D5FF;border-radius:10px;padding:6px 14px;font-size:13px;font-weight:700;}
.cikis-btn{background:transparent;border:1px solid rgba(255,255,255,.3);color:white;padding:6px 14px;border-radius:10px;font-size:13px;cursor:pointer;font-family:'Nunito',sans-serif;}
.cikis-btn:hover{background:rgba(255,255,255,.1);}

/* ── SIDEBAR ── */
.sidebar-overlay{position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:150;opacity:0;pointer-events:none;transition:opacity .3s;}
.sidebar-overlay.open{opacity:1;pointer-events:all;}
.sidebar{
    position:fixed;top:0;left:-270px;width:270px;height:100%;
    background:#3A1C71;z-index:200;transition:left .3s ease;
    display:flex;flex-direction:column;overflow-y:auto;
}
.sidebar.open{left:0;}
.sidebar-header{display:flex;align-items:center;justify-content:space-between;padding:18px 18px 14px;}
.sidebar-logo{font-family:'Baloo 2',cursive;font-size:1.5rem;font-weight:900;color:white;}
.sidebar-logo span{color:#C084FC;}
.close-btn{background:none;border:none;color:rgba(255,255,255,.6);font-size:22px;cursor:pointer;line-height:1;}
.close-btn:hover{color:white;}

.sidebar-profile{background:rgba(255,255,255,.09);margin:0 12px 6px;border-radius:14px;padding:14px 16px;}
.profile-row{display:flex;align-items:center;gap:12px;}
.avatar{width:40px;height:40px;background:linear-gradient(135deg,#C084FC,#9B72E8);border-radius:12px;display:flex;align-items:center;justify-content:center;color:white;font-weight:900;font-size:15px;flex-shrink:0;}
.profile-name{color:white;font-weight:800;font-size:14px;}
.profile-role{color:rgba(255,255,255,.45);font-size:12px;margin-top:2px;}
.xp-row{display:flex;justify-content:space-between;align-items:center;margin-top:10px;}
.xp-label{color:rgba(255,255,255,.45);font-size:11px;}
.xp-bg{flex:1;height:5px;background:rgba(255,255,255,.15);border-radius:3px;margin:0 10px;}
.xp-fill{height:5px;border-radius:3px;background:linear-gradient(90deg,#C084FC,#9B72E8);width:55%;}

.menu-title{color:rgba(255,255,255,.3);font-size:10px;font-weight:900;text-transform:uppercase;letter-spacing:1.2px;padding:14px 18px 5px;}
.sidebar nav a{
    display:flex;align-items:center;gap:12px;
    color:rgba(255,255,255,.72);text-decoration:none;
    padding:11px 18px;font-size:14px;font-weight:700;
    transition:background .2s,color .2s;
}
.sidebar nav a:hover,.sidebar nav a.active{background:rgba(255,255,255,.12);color:white;}
.sidebar nav a .ico{font-size:16px;width:22px;text-align:center;}
.sidebar-footer{margin-top:auto;padding:10px 12px 18px;}
.logout-btn{
    width:100%;background:rgba(239,68,68,.15);border:1px solid rgba(239,68,68,.3);
    color:rgba(255,150,150,.9);padding:10px;border-radius:12px;
    font-size:14px;font-weight:700;cursor:pointer;font-family:'Nunito',sans-serif;
}
.logout-btn:hover{background:rgba(239,68,68,.25);}

/* ── CONTENT ── */
.main{margin-top:64px;padding:28px 32px;}
.page-header{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:24px;flex-wrap:wrap;gap:14px;}
.page-header h1{font-size:22px;font-weight:800;color:#24114f;}
.page-header p{color:#6b7280;font-size:14px;margin-top:4px;}
.btn-primary{
    background:linear-gradient(135deg,#6C3FC5,#9B72E8);
    color:white;border:none;padding:11px 22px;
    border-radius:12px;font-size:14px;font-weight:800;cursor:pointer;
    text-decoration:none;display:inline-flex;align-items:center;gap:8px;
    font-family:'Nunito',sans-serif;
}
.btn-primary:hover{opacity:.9;}
.btn-outline{
    background:white;color:#6C3FC5;
    border:1.5px solid #C084FC;
    padding:10px 20px;border-radius:12px;
    font-size:14px;font-weight:800;cursor:pointer;
    text-decoration:none;display:inline-flex;align-items:center;gap:8px;
    font-family:'Nunito',sans-serif;
}

/* Welcome */
.welcome-card{
    background:#EDE9FF;border-radius:16px;
    padding:18px 22px;margin-bottom:22px;
    border-left:4px solid #6C3FC5;display:flex;align-items:flex-start;gap:14px;
}
.welcome-card .wc-icon{font-size:32px;flex-shrink:0;}
.welcome-card h3{color:#3A1C71;font-size:15px;font-weight:800;}
.welcome-card p{color:#6b7280;font-size:13px;margin-top:4px;}

/* Stats */
.stats-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:22px;}
.stat-card{
    background:white;border-radius:16px;padding:20px;
    box-shadow:0 1px 8px rgba(58,28,113,.08);position:relative;overflow:hidden;
}
.stat-card::before{
    content:'';position:absolute;top:-24px;right:-24px;
    width:80px;height:80px;border-radius:50%;
    background:#EDE9FF;opacity:.6;
}
.stat-card .s-icon{font-size:22px;margin-bottom:10px;}
.stat-card .s-num{font-size:26px;font-weight:900;color:#24114f;}
.stat-card .s-lbl{color:#6b7280;font-size:13px;font-weight:700;margin-top:3px;}
.stat-card .s-hint{color:#9B72E8;font-size:12px;margin-top:6px;font-weight:700;}

/* Kod tablosu */
.card-box{background:white;border-radius:16px;padding:22px 24px;box-shadow:0 1px 8px rgba(58,28,113,.08);margin-bottom:22px;}
.card-box-title{font-size:15px;font-weight:800;color:#24114f;margin-bottom:16px;display:flex;align-items:center;gap:8px;}
table{width:100%;border-collapse:collapse;}
thead th{text-align:left;font-size:11px;color:#9ca3af;font-weight:800;text-transform:uppercase;letter-spacing:.5px;padding:8px 12px;border-bottom:1px solid #f3f0ff;}
tbody td{padding:12px;font-size:13px;color:#374151;border-bottom:1px solid #faf5ff;font-weight:600;}
tbody tr:last-child td{border-bottom:none;}
tbody tr:hover{background:#fdfbff;}
.pin{background:#EDE9FF;color:#6C3FC5;font-weight:900;font-size:14px;letter-spacing:3px;padding:4px 12px;border-radius:8px;display:inline-block;}
.badge-active{background:#D1FAE5;color:#065F46;font-size:11px;padding:3px 10px;border-radius:6px;font-weight:800;}
.badge-off{background:#F3F4F6;color:#6B7280;font-size:11px;padding:3px 10px;border-radius:6px;font-weight:800;}

/* Quick grid */
.quick-grid{display:grid;grid-template-columns:repeat(2,1fr);gap:14px;}
.qcard{
    background:white;border-radius:16px;padding:20px 22px;
    box-shadow:0 1px 8px rgba(58,28,113,.08);
    cursor:pointer;text-decoration:none;display:block;
    transition:box-shadow .2s,transform .2s;border:1.5px solid transparent;
}
.qcard:hover{box-shadow:0 6px 22px rgba(108,63,197,.18);transform:translateY(-2px);border-color:#C084FC;}
.qcard .qico{font-size:26px;margin-bottom:10px;}
.qcard h4{font-size:14px;font-weight:800;color:#24114f;}
.qcard p{font-size:13px;color:#6b7280;margin-top:4px;font-weight:600;}

/* Boş durum */
.empty{text-align:center;padding:36px 0;color:#9ca3af;}
.empty .big{font-size:38px;margin-bottom:10px;}
.empty p{font-size:14px;font-weight:600;}

@media(max-width:768px){
    .stats-grid{grid-template-columns:repeat(2,1fr);}
    .quick-grid{grid-template-columns:1fr;}
    .main{padding:20px 16px;}
}
</style>
</head>
<body>

{{-- TOPBAR --}}
<div class="topbar">
    <button class="hamburger" id="hamburgerBtn">
        <span></span><span></span><span></span>
    </button>
    <a href="{{ route('ogretmen.dashboard') }}" class="logo">Quiz<span>ion</span></a>
    <div class="topbar-right">
        <span class="user-badge">{{ $user->name }}</span>
        <form action="{{ route('logout') }}" method="POST" style="display:inline">
            @csrf
            <button type="submit" class="cikis-btn">Çıkış</button>
        </form>
    </div>
</div>

{{-- OVERLAY --}}
<div class="sidebar-overlay" id="overlay"></div>

{{-- SIDEBAR --}}
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">Quiz<span>ion</span></div>
        <button class="close-btn" id="closeBtn">✕</button>
    </div>

    <div class="sidebar-profile">
        <div class="profile-row">
            <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
            <div>
                <div class="profile-name">{{ $user->name }}</div>
                <div class="profile-role">Öğretmen · {{ $user->branch ?? '—' }}</div>
            </div>
        </div>
        <div class="xp-row">
            <span class="xp-label">Uzman Öğretmen</span>
            <div class="xp-bg"><div class="xp-fill"></div></div>
            <span class="xp-label">XP</span>
        </div>
    </div>

    <div class="menu-title">Öğretmen Paneli</div>
    <nav>
        <a href="{{ route('ogretmen.dashboard') }}" class="active">
            <span class="ico">🏠</span> Anasayfa
        </a>
        <a href="{{ route('ogretmen.soru.ekle') }}">
            <span class="ico">✏️</span> Soru Üretim Merkezi
        </a>
        <a href="{{ route('ogretmen.analiz') }}">
            <span class="ico">📊</span> Analiz Odası
        </a>
        <a href="{{ route('ogretmen.sinif') }}">
            <span class="ico">🏫</span> Sınıf Yönetimi
        </a>
        <a href="{{ route('ogretmen.profil') }}">
            <span class="ico">⚙️</span> Profil Ayarları
        </a>
    </nav>

    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">🚪 Çıkış Yap</button>
        </form>
    </div>
</div>

{{-- ANA İÇERİK --}}
<div class="main">
    <div class="page-header">
        <div>
            <h1>Merhaba, {{ $user->name }}! 🎉</h1>
            <p>Öğretmen panelinize hoş geldiniz. Branş: {{ $user->branch ?? '—' }}</p>
        </div>
        <div style="display:flex;gap:10px;flex-wrap:wrap;">
            <a href="{{ route('ogretmen.analiz') }}" class="btn-outline">📊 Analiz Odası</a>
            <a href="{{ route('ogretmen.sinav.olustur') }}" class="btn-primary">➕ Sınav Oluştur</a>
        </div>
    </div>

    {{-- Hoş geldin --}}
    @if(count($sonSinavlar) === 0)
    <div class="welcome-card">
        <div class="wc-icon">🎓</div>
        <div>
            <h3>Quizion Öğretmen Paneli Hazır!</h3>
            <p>Sınav oluşturduğunda öğrencilerin yaklaşan sınavlar alanında otomatik görünür. İlk sınavını oluştur!</p>
        </div>
    </div>
    @endif

    {{-- İstatistikler --}}
    <div class="stats-grid">
        <div class="stat-card">
            <div class="s-icon">🏫</div>
            <div class="s-num">{{ $sonSinavlar->where('is_active',true)->count() }}</div>
            <div class="s-lbl">Aktif Sınav</div>
            <div class="s-hint">Sınav oluşturun</div>
        </div>
        <div class="stat-card">
            <div class="s-icon">📋</div>
            <div class="s-num">{{ $sonSinavlar->count() }}</div>
            <div class="s-lbl">Toplam Sınav</div>
            <div class="s-hint">Son 10 sınav</div>
        </div>
        <div class="stat-card">
            <div class="s-icon">👥</div>
            <div class="s-num">{{ \App\Models\User::where('role','ogrenci')->count() }}</div>
            <div class="s-lbl">Toplam Öğrenci</div>
            <div class="s-hint">Tüm sistemde</div>
        </div>
        <div class="stat-card">
            <div class="s-icon">📝</div>
            <div class="s-num">{{ \App\Models\Question::count() }}</div>
            <div class="s-lbl">Soru Bankası</div>
            <div class="s-hint">Sistemdeki soru</div>
        </div>
    </div>

    {{-- Aktif sınav kodları --}}
    <div class="card-box">
        <div class="card-box-title">🔑 Aktif Sınav Kodları</div>
        @if($sonSinavlar->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Sınav Adı</th>
                    <th>PIN Kodu</th>
                    <th>Ders</th>
                    <th>Sınıf</th>
                    <th>Tarih</th>
                    <th>Durum</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sonSinavlar as $sinav)
                <tr>
                    <td><strong>{{ $sinav->title }}</strong></td>
                    <td><span class="pin">{{ $sinav->exam_code }}</span></td>
                    <td>{{ $sinav->ders ?? '-' }}</td>
                    <td>{{ $sinav->grade }}</td>
                    <td>{{ \Carbon\Carbon::parse($sinav->starts_at)->format('d.m.Y H:i') }}</td>
                    <td>
                        @if($sinav->isFinished())
                            <span style="font-size:12px;color:#9ca3af;font-weight:700;">✅ Tamamlandı</span>

                        @elseif($sinav->is_active)
                            <form action="{{ route('ogretmen.sinav.durdur', $sinav) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" style="background:#dc2626;color:white;border:none;padding:7px 16px;border-radius:10px;font-weight:800;cursor:pointer;font-size:13px;">
                                    ⏹ Durdur
                                </button>
                            </form>
                            <span class="sinav-countdown"
                                data-bitis="{{ $sinav->started_at ? $sinav->started_at->addMinutes($sinav->duration)->timestamp : 0 }}"
                                style="margin-left:8px;font-weight:900;color:#6C3FC5;font-size:13px;">
                            </span>

                        @elseif($sinav->started_at)
                            <form action="{{ route('ogretmen.sinav.baslat', $sinav) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" style="background:#d97706;color:white;border:none;padding:7px 16px;border-radius:10px;font-weight:800;cursor:pointer;font-size:13px;">
                                    ▶ Devam Ettir
                                </button>
                            </form>
                            <span style="font-size:11px;color:#6b7280;margin-left:6px;">⏸ Duraklatıldı</span>

                        @else
                            <form action="{{ route('ogretmen.sinav.baslat', $sinav) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" style="background:#16a34a;color:white;border:none;padding:7px 16px;border-radius:10px;font-weight:800;cursor:pointer;font-size:13px;">
                                    ▶ Sınavı Başlat
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="empty">
            <div class="big">📭</div>
            <p>Henüz sınav oluşturulmadı.<br>
               <a href="{{ route('ogretmen.sinav.olustur') }}" style="color:#6C3FC5;font-weight:800;">İlk sınavı oluştur →</a>
            </p>
        </div>
        @endif
    </div>

    {{-- Hızlı işlemler --}}
    <div class="card-box-title" style="font-size:15px;font-weight:800;color:#24114f;margin-bottom:14px;">⚡ Hızlı İşlemler</div>
    <div class="quick-grid">
        <a href="{{ route('ogretmen.soru.ekle') }}" class="qcard">
            <div class="qico">🧠</div>
            <h4>Soru Üret</h4>
            <p>Yeni soru oluştur ve sisteme kaydet</p>
        </a>
        <a href="{{ route('ogretmen.sinav.olustur') }}" class="qcard">
            <div class="qico">📋</div>
            <h4>Sınav Oluştur</h4>
            <p>Öğrenciler için yeni sınav hazırla</p>
        </a>
        <a href="{{ route('ogretmen.sinif') }}" class="qcard">
            <div class="qico">🏫</div>
            <h4>Sınıf Durumu</h4>
            <p>Sınıf seviyesine göre sınavları takip et</p>
        </a>
        <a href="{{ route('ogretmen.analiz') }}" class="qcard">
            <div class="qico">📊</div>
            <h4>Analiz Odası</h4>
            <p>Öğrenci sonuçlarını görüntüle</p>
        </a>
    </div>
</div>

<script>
const btn=document.getElementById('hamburgerBtn'),
      sb=document.getElementById('sidebar'),
      ov=document.getElementById('overlay'),
      cl=document.getElementById('closeBtn');
function openSidebar(){sb.classList.add('open');ov.classList.add('open');}
function closeSidebar(){sb.classList.remove('open');ov.classList.remove('open');}
btn.addEventListener('click',openSidebar);
cl.addEventListener('click',closeSidebar);
ov.addEventListener('click',closeSidebar);

document.querySelectorAll('.sinav-countdown').forEach(el => {
    const bitis = parseInt(el.dataset.bitis);
    if (!bitis) return;
    setInterval(() => {
        const kalan = bitis - Math.floor(Date.now() / 1000);
        if (kalan <= 0) { el.textContent = '⏰ Süre doldu'; return; }
        const dk = Math.floor(kalan / 60);
        const sn = kalan % 60;
        el.textContent = `⏱ ${String(dk).padStart(2,'0')}:${String(sn).padStart(2,'0')}`;
    }, 1000);
});
</script>
</body>
</html>
