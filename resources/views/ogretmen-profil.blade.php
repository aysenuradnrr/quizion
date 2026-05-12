<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizion — Profil Ayarları</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@600;700;800&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
:root{
    --pu:#3A1C71;
    --pm:#6C3FC5;
    --pl:#9B72E8;
    --or:#F5A623;
    --bg:#F4F2FF;
    --td:#24114f;
    --tm:#6b5b88;
    --bd:#e9ddff;
}
body{
    font-family:'Nunito',sans-serif;
    background:linear-gradient(135deg,#F4F2FF,#FFF7EA);
    color:var(--td);
    min-height:100vh;
}
.topbar{
    height:72px;
    background:linear-gradient(90deg,#2b0a69,#3A1C71);
    display:flex;
    align-items:center;
    padding:0 26px;
    gap:14px;
    position:fixed;
    top:0;
    left:0;
    right:0;
    z-index:100;
    box-shadow:0 8px 30px rgba(58,28,113,.35);
}
.logo{
    font-family:'Baloo 2',cursive;
    font-size:1.9rem;
    font-weight:900;
    color:white;
    text-decoration:none;
}
.logo span{color:var(--or);}
.back{
    margin-left:auto;
    background:rgba(255,255,255,.14);
    color:white;
    text-decoration:none;
    padding:10px 17px;
    border-radius:14px;
    font-size:14px;
    font-weight:900;
}
.main{
    margin-top:72px;
    padding:34px 32px 60px;
    max-width:1180px;
}
.page-header{
    margin-bottom:24px;
}
.page-header h1{
    font-family:'Baloo 2',cursive;
    font-size:2.1rem;
    font-weight:900;
    color:var(--pu);
}
.page-header p{
    color:var(--tm);
    font-size:15px;
    margin-top:4px;
    font-weight:800;
}
.card{
    background:rgba(255,255,255,.94);
    border:1px solid var(--bd);
    border-radius:30px;
    padding:30px;
    box-shadow:0 18px 45px rgba(61,26,142,.12);
    backdrop-filter:blur(10px);
}
.profile-layout{
    display:grid;
    grid-template-columns:300px 1fr;
    gap:30px;
    align-items:start;
}
.profile-side{
    position:sticky;
    top:100px;
    text-align:center;
    background:linear-gradient(135deg,#fbf9ff,#fff4df);
    border:1px solid var(--bd);
    border-radius:26px;
    padding:26px 22px;
}
.avatar{
    width:112px;
    height:112px;
    margin:0 auto 16px;
    background:linear-gradient(135deg,var(--pm),var(--pl));
    border-radius:32px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-weight:900;
    font-size:42px;
    box-shadow:0 18px 35px rgba(108,63,197,.28);
}
.avatar-name{
    font-size:20px;
    font-weight:900;
    color:var(--td);
}
.avatar-role{
    color:var(--pm);
    font-size:14px;
    font-weight:900;
    margin-top:4px;
}
.profile-info{
    margin-top:22px;
    padding-top:18px;
    border-top:1px dashed var(--bd);
    text-align:left;
}
.info-row{
    background:white;
    border:1px solid #efe8ff;
    border-radius:16px;
    padding:13px 14px;
    margin-bottom:10px;
    font-weight:800;
    color:var(--tm);
}
.info-row strong{
    display:block;
    color:var(--td);
    margin-top:3px;
    word-break:break-word;
}
.form-area{
    background:white;
    border:1px solid #efe8ff;
    border-radius:26px;
    padding:28px;
}
.form-title{
    display:flex;
    align-items:center;
    gap:10px;
    font-family:'Baloo 2',cursive;
    color:var(--pu);
    font-size:1.55rem;
    font-weight:900;
    margin-bottom:20px;
}
.success-msg{
    background:#D1FAE5;
    color:#065F46;
    padding:13px 16px;
    border-radius:14px;
    font-size:14px;
    font-weight:900;
    margin-bottom:18px;
    border:1px solid #9beac9;
}
.form-group{margin-bottom:18px;}
label{
    display:block;
    font-weight:900;
    font-size:14px;
    color:var(--td);
    margin-bottom:8px;
}
input[type="text"],input[type="email"]{
    width:100%;
    border:2px solid #e5dfff;
    border-radius:17px;
    padding:16px 18px;
    font-size:15px;
    font-weight:800;
    color:var(--td);
    font-family:'Nunito',sans-serif;
    outline:none;
    transition:.2s;
    background:#fff;
}
input:focus{
    border-color:var(--pm);
    box-shadow:0 0 0 4px rgba(108,63,197,.12);
}
.btn-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:14px;
    margin-top:24px;
}
.btn-cancel,
.btn-save{
    border:none;
    padding:15px 26px;
    border-radius:17px;
    font-size:15px;
    font-weight:900;
    cursor:pointer;
    font-family:'Nunito',sans-serif;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    justify-content:center;
}
.btn-cancel{
    background:#f3edff;
    color:var(--pm);
}
.btn-save{
    background:linear-gradient(135deg,var(--pm),var(--pu));
    color:white;
    box-shadow:0 12px 25px rgba(108,53,222,.28);
}
.btn-save:hover,.btn-cancel:hover{transform:translateY(-1px);}
.quick-box{
    margin-top:22px;
    background:#faf8ff;
    border:1px solid var(--bd);
    border-radius:22px;
    padding:18px;
}
.quick-box h3{
    font-family:'Baloo 2',cursive;
    color:var(--pu);
    font-size:1.25rem;
    margin-bottom:12px;
}
.quick-links{
    display:grid;
    grid-template-columns:repeat(2,1fr);
    gap:10px;
}
.quick-links a{
    text-decoration:none;
    color:var(--td);
    background:white;
    border:1px solid #eee5ff;
    border-radius:15px;
    padding:13px 14px;
    font-weight:900;
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.quick-links a:hover{
    border-color:var(--pl);
    background:#f6f1ff;
}
.error{
    color:#dc2626;
    font-size:13px;
    font-weight:800;
    margin-top:6px;
}
@media(max-width:900px){
    .profile-layout{grid-template-columns:1fr;}
    .profile-side{position:static;}
    .quick-links{grid-template-columns:1fr;}
}
@media(max-width:650px){
    .topbar{padding:0 16px;}
    .logo{font-size:1.55rem;}
    .main{padding:26px 18px 50px;}
    .card,.form-area{padding:22px;}
    .btn-row{flex-direction:column;}
    .btn-cancel,.btn-save{width:100%;}
}
</style>
</head>
<body>
<div class="topbar">
    <a href="{{ route('ogretmen.dashboard') }}" class="logo">Quiz<span>ion</span></a>
    <a href="{{ route('ogretmen.dashboard') }}" class="back">← Panele Dön</a>
</div>

<div class="main">
    <div class="page-header">
        <h1>⚙️ Profil Ayarları</h1>
        <p>Hesap bilgilerini modern profil panelinden güncelleyebilirsin.</p>
    </div>

    <div class="card">
        <div class="profile-layout">
            <div class="profile-side">
                <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
                <div class="avatar-name">{{ $user->name }}</div>
                <div class="avatar-role">Öğretmen · {{ $user->branch ?? 'Branş belirtilmedi' }}</div>

                <div class="profile-info">
                    <div class="info-row">
                        ✉️ E-posta
                        <strong>{{ $user->email }}</strong>
                    </div>
                    <div class="info-row">
                        📚 Branş
                        <strong>{{ $user->branch ?? 'Belirtilmedi' }}</strong>
                    </div>
                    <div class="info-row">
                        🟢 Hesap Durumu
                        <strong>Aktif</strong>
                    </div>
                </div>
            </div>

            <div>
                <div class="form-area">
                    <div class="form-title">👤 Kişisel Bilgiler</div>

                    @if(session('success'))
                    <div class="success-msg">✅ {{ session('success') }}</div>
                    @endif

                    <form action="{{ route('ogretmen.profil.guncelle') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Ad Soyad</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>E-posta</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Branş</label>
                            <input type="text" name="branch" value="{{ old('branch', $user->branch) }}" placeholder="Örn: Matematik">
                            @error('branch')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="btn-row">
                            <a href="{{ route('ogretmen.dashboard') }}" class="btn-cancel">Vazgeç</a>
                            <button type="submit" class="btn-save">💾 Kaydet</button>
                        </div>
                    </form>
                </div>

                <div class="quick-box">
                    <h3>⚡ Hızlı İşlemler</h3>
                    <div class="quick-links">
                        <a href="{{ route('ogretmen.dashboard') }}">Panele Git <span>→</span></a>
                        <a href="{{ route('ogretmen.sinav.olustur') }}">Sınav Oluştur <span>→</span></a>
                        <a href="{{ route('ogretmen.soru.ekle') }}">Soru Ekle <span>→</span></a>
                        <a href="{{ route('ogretmen.analiz') }}">Analiz Odası <span>→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
