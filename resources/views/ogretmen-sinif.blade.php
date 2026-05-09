<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizion — Sınıf Yönetimi</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@600;700;800&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{font-family:'Nunito',sans-serif;background:#F4F2FF;color:#24114f;}
.topbar{height:64px;background:#3A1C71;display:flex;align-items:center;padding:0 20px;gap:14px;position:fixed;top:0;left:0;right:0;z-index:100;box-shadow:0 4px 20px rgba(58,28,113,.35);}
.logo{font-family:'Baloo 2',cursive;font-size:1.6rem;font-weight:900;color:white;text-decoration:none;}
.logo span{color:#C084FC;}
.back{margin-left:auto;background:rgba(255,255,255,.12);color:white;text-decoration:none;padding:8px 16px;border-radius:10px;font-size:13px;font-weight:700;}
.back:hover{background:rgba(255,255,255,.2);}
.main{margin-top:64px;padding:28px 32px;}
.page-header{margin-bottom:22px;}
.page-header h1{font-size:22px;font-weight:800;color:#24114f;}
.page-header p{color:#6b7280;font-size:14px;margin-top:4px;font-weight:600;}
.grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;}
.card{background:white;border-radius:16px;padding:22px 24px;box-shadow:0 1px 8px rgba(58,28,113,.08);margin-bottom:18px;}
.card-title{font-size:15px;font-weight:800;color:#24114f;margin-bottom:14px;display:flex;align-items:center;gap:8px;}
.sinif-badge{background:linear-gradient(135deg,#6C3FC5,#9B72E8);color:white;border-radius:10px;padding:4px 12px;font-size:13px;font-weight:800;}
.ogrenci-row{display:flex;align-items:center;gap:12px;padding:10px 0;border-bottom:1px solid #f3f0ff;}
.ogrenci-row:last-child{border-bottom:none;}
.ogrenci-av{width:36px;height:36px;border-radius:10px;background:linear-gradient(135deg,#6C3FC5,#9B72E8);display:flex;align-items:center;justify-content:center;color:white;font-weight:900;font-size:14px;flex-shrink:0;}
.ogrenci-name{font-weight:700;font-size:13px;color:#24114f;}
.ogrenci-meta{font-size:11px;color:#9ca3af;margin-top:2px;}
.ogrenci-no{margin-left:auto;background:#f3f0ff;color:#6C3FC5;border-radius:8px;padding:3px 10px;font-size:11px;font-weight:800;}
.sinav-row{display:flex;align-items:center;justify-content:space-between;padding:10px 0;border-bottom:1px solid #f3f0ff;gap:10px;}
.sinav-row:last-child{border-bottom:none;}
.sinav-title{font-weight:700;font-size:13px;color:#24114f;}
.sinav-meta{font-size:11px;color:#9ca3af;margin-top:2px;}
.pin-tag{background:#EDE9FF;color:#6C3FC5;font-weight:900;font-size:12px;letter-spacing:2px;padding:3px 10px;border-radius:7px;}
.badge-a{background:#D1FAE5;color:#065F46;font-size:10px;padding:2px 8px;border-radius:5px;font-weight:800;}
.badge-p{background:#F3F4F6;color:#6B7280;font-size:10px;padding:2px 8px;border-radius:5px;font-weight:800;}
.empty-state{text-align:center;padding:28px 0;color:#9ca3af;}
.empty-state .big{font-size:32px;margin-bottom:8px;}
.section-header{font-size:13px;font-weight:900;text-transform:uppercase;letter-spacing:1px;color:#9ca3af;margin-bottom:12px;padding-bottom:6px;border-bottom:2px solid #f3f0ff;}
.info-box{background:#EDE9FF;border-radius:12px;padding:14px 18px;margin-bottom:18px;font-size:13px;color:#4C1D95;font-weight:700;line-height:1.6;}
@media(max-width:768px){.grid{grid-template-columns:1fr;}.main{padding:20px 14px;}}
</style>
</head>
<body>
<div class="topbar">
    <a href="{{ route('ogretmen.dashboard') }}" class="logo">Quiz<span>ion</span></a>
    <a href="{{ route('ogretmen.dashboard') }}" class="back">← Panele Dön</a>
</div>

<div class="main">
    <div class="page-header">
        <h1>🏫 Sınıf Yönetimi</h1>
        <p>Sorumlu olduğun öğrenciler ve sınıf bazında sınavlar</p>
    </div>

    @if($ogrenciler->isEmpty() && $sinavlar->isEmpty())
    <div class="card">
        <div class="info-box">
            ℹ️ Henüz sana atanmış öğrenci yok. Öğrenciler kayıt olurken veya yönetici panelinden sana atanabilirler.
        </div>
        <div class="empty-state">
            <div class="big">🏫</div>
            <p>Sınıf verisi bulunamadı.</p>
        </div>
    </div>
    @else

    <div class="grid">

        {{-- SOL: Öğrenci listesi (sınıf bazında) --}}
        <div>
            <div class="card">
                <div class="card-title">👥 Öğrenci Listesi</div>

                @if($ogrenciler->isEmpty())
                    <div class="info-box">
                        Sana henüz öğrenci atanmamış. Öğrenciler <code>users.teacher_id</code> ile bağlandığında burada görünür.
                    </div>
                @else
                    @foreach($ogrenciler as $sinif => $grupOgrenciler)
                    <div style="margin-bottom:20px;">
                        <div class="section-header">
                            {{ $sinif }}. Sınıf
                            <span style="background:#EDE9FF;color:#6C3FC5;border-radius:6px;padding:2px 8px;font-size:11px;">
                                {{ $grupOgrenciler->count() }} öğrenci
                            </span>
                        </div>

                        @foreach($grupOgrenciler as $ogr)
                        <div class="ogrenci-row">
                            <div class="ogrenci-av">{{ strtoupper(substr($ogr->name, 0, 1)) }}</div>
                            <div>
                                <div class="ogrenci-name">{{ $ogr->name }} {{ $ogr->surname }}</div>
                                <div class="ogrenci-meta">{{ $ogr->email }}</div>
                            </div>
                            @if($ogr->school_number)
                                <div class="ogrenci-no">No: {{ $ogr->school_number }}</div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                @endif
            </div>
        </div>

        {{-- SAĞ: Sınıf bazında sınavlar --}}
        <div>
            <div class="card">
                <div class="card-title">📋 Sınıf Bazında Sınavlar</div>

                @if($sinavlar->isEmpty())
                    <div class="empty-state">
                        <div class="big">📭</div>
                        <p>Henüz sınav oluşturulmadı.</p>
                        <a href="{{ route('ogretmen.sinav.olustur') }}" style="color:#6C3FC5;font-weight:800;font-size:13px;">Sınav Oluştur →</a>
                    </div>
                @else
                    @foreach($sinavlar as $sinif => $grupSinavlar)
                    <div style="margin-bottom:20px;">
                        <div class="section-header">
                            {{ $sinif }}. Sınıf
                            <span style="background:#EDE9FF;color:#6C3FC5;border-radius:6px;padding:2px 8px;font-size:11px;">
                                {{ $grupSinavlar->count() }} sınav
                            </span>
                        </div>

                        @foreach($grupSinavlar as $sinav)
                        <div class="sinav-row">
                            <div>
                                <div class="sinav-title">{{ $sinav->title }}</div>
                                <div class="sinav-meta">
                                    {{ $sinav->ders ?? 'Genel' }} · {{ \Carbon\Carbon::parse($sinav->starts_at)->format('d.m.Y H:i') }} · {{ $sinav->duration }}dk
                                </div>
                            </div>
                            <div style="display:flex;flex-direction:column;align-items:flex-end;gap:5px;">
                                <span class="pin-tag">{{ $sinav->exam_code }}</span>
                                <span class="{{ $sinav->is_active ? 'badge-a' : 'badge-p' }}">
                                    {{ $sinav->is_active ? 'Aktif' : 'Pasif' }}
                                </span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endforeach
                @endif
            </div>
        </div>

    </div>
    @endif
</div>
</body>
</html>
