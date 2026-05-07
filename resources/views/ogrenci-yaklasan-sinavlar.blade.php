<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Yaklaşan Sınavlar</title>

<style>
body{
    font-family:Arial,sans-serif;
    background:#f4f0ff;
    padding:40px;
}
.card{
    background:white;
    border-radius:18px;
    padding:20px;
    margin-bottom:15px;
    box-shadow:0 4px 16px rgba(0,0,0,.08);
}
h1{
    color:#3d1a8e;
    margin-bottom:25px;
}
.exam-title{
    font-size:20px;
    font-weight:bold;
    color:#222;
}
.exam-info{
    margin-top:8px;
    color:#666;
}
.back{
    display:inline-block;
    margin-top:20px;
    text-decoration:none;
    background:#6c35de;
    color:white;
    padding:12px 18px;
    border-radius:12px;
}
</style>
</head>
<body>

<h1>📅 Yaklaşan Sınavlar</h1>

@forelse($yaklasanSinavlar as $sinav)
    <div class="card">
        <div class="exam-title">{{ $sinav->title }}</div>

        <div class="exam-info">
            Ders: {{ $sinav->ders }}
        </div>

        <div class="exam-info">
            Sınıf: {{ $sinav->grade }}. Sınıf
        </div>

        <div class="exam-info">
            Tarih: {{ $sinav->starts_at->format('d.m.Y H:i') }}
        </div>

        <div class="exam-info">
            Süre: {{ $sinav->duration }} dakika
        </div>

        <div class="exam-info">
            Kod: <strong>{{ $sinav->exam_code }}</strong>
        </div>
    </div>
@empty
    <div class="card">
        Yaklaşan sınav bulunmuyor.
    </div>
@endforelse

<a href="{{ route('ogrenci.dashboard') }}" class="back">
    ← Öğrenci Paneline Dön
</a>

</body>
</html>