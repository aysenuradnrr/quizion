<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizion — Profil Ayarları</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@600;700;800&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Nunito',sans-serif;background:#F4F2FF;color:#24114f;}
.topbar{height:64px;background:#3A1C71;display:flex;align-items:center;padding:0 20px;gap:14px;position:fixed;top:0;left:0;right:0;z-index:100;box-shadow:0 4px 20px rgba(58,28,113,.35);}
.logo{font-family:'Baloo 2',cursive;font-size:1.6rem;font-weight:900;color:white;text-decoration:none;}
.logo span{color:#C084FC;}
.back{margin-left:auto;background:rgba(255,255,255,.12);color:white;text-decoration:none;padding:8px 16px;border-radius:10px;font-size:13px;font-weight:700;}
.main{margin-top:64px;padding:28px 32px;max-width:600px;}
.page-header{margin-bottom:22px;}
.page-header h1{font-size:22px;font-weight:800;}
.page-header p{color:#6b7280;font-size:14px;margin-top:4px;font-weight:600;}
.card{background:white;border-radius:16px;padding:28px;box-shadow:0 1px 8px rgba(58,28,113,.08);}
.avatar-row{display:flex;align-items:center;gap:18px;margin-bottom:28px;}
.avatar{width:64px;height:64px;background:linear-gradient(135deg,#6C3FC5,#9B72E8);border-radius:18px;display:flex;align-items:center;justify-content:center;color:white;font-weight:900;font-size:24px;}
.avatar-name{font-size:18px;font-weight:800;color:#24114f;}
.avatar-role{color:#9B72E8;font-size:13px;font-weight:700;margin-top:3px;}
.form-group{margin-bottom:18px;}
label{display:block;font-weight:800;font-size:13px;color:#24114f;margin-bottom:7px;}
input[type="text"],input[type="email"]{
    width:100%;border:1.5px solid #e5dfff;border-radius:12px;
    padding:13px 16px;font-size:14px;font-weight:700;
    color:#24114f;font-family:'Nunito',sans-serif;outline:none;
    transition:border-color .2s;
}
input:focus{border-color:#6C3FC5;box-shadow:0 0 0 3px rgba(108,63,197,.1);}
.btn-save{
    background:linear-gradient(135deg,#6C3FC5,#9B72E8);
    color:white;border:none;padding:13px 28px;
    border-radius:12px;font-size:14px;font-weight:800;
    cursor:pointer;font-family:'Nunito',sans-serif;
}
.btn-save:hover{opacity:.9;}
.success-msg{background:#D1FAE5;color:#065F46;padding:12px 16px;border-radius:10px;font-size:14px;font-weight:700;margin-bottom:18px;}
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
        <p>Hesap bilgilerini güncelleyebilirsin</p>
    </div>
    <div class="card">
        <div class="avatar-row">
            <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
            <div>
                <div class="avatar-name">{{ $user->name }}</div>
                <div class="avatar-role">Öğretmen · {{ $user->branch ?? 'Branş belirtilmedi' }}</div>
            </div>
        </div>

        @if(session('success'))
        <div class="success-msg">✅ {{ session('success') }}</div>
        @endif

        <form action="{{ route('ogretmen.profil.guncelle') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Ad Soyad</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="form-group">
                <label>E-posta</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="form-group">
                <label>Branş</label>
                <input type="text" name="branch" value="{{ old('branch', $user->branch) }}" placeholder="Örn: Matematik">
            </div>
            <button type="submit" class="btn-save">💾 Kaydet</button>
        </form>
    </div>
</div>
</body>
</html>