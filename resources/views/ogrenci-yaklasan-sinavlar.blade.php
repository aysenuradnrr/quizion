<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Yaklaşan Sınavlar</title>

<style>
*{box-sizing:border-box;margin:0;padding:0}
body{
    font-family:Arial,sans-serif;
    background:linear-gradient(135deg,#f4f0ff,#fff7ea);
    min-height:100vh;
    padding:38px;
    color:#24114f;
}
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:15px;
    margin-bottom:28px;
}
h1{
    color:#3d1a8e;
    font-size:34px;
}
.back{
    text-decoration:none;
    background:#6c35de;
    color:white;
    padding:13px 20px;
    border-radius:14px;
    font-weight:800;
}
.card{
    background:white;
    border-radius:24px;
    padding:24px;
    margin-bottom:17px;
    box-shadow:0 10px 28px rgba(61,26,142,.10);
    border:1px solid #eadfff;
    display:grid;
    grid-template-columns:1fr auto;
    gap:18px;
}
.exam-title{
    font-size:21px;
    font-weight:900;
    color:#24114f;
    margin-bottom:12px;
}
.exam-grid{
    display:grid;
    grid-template-columns:repeat(2,minmax(180px,1fr));
    gap:9px 18px;
}
.exam-info{
    color:#665783;
    font-weight:700;
}
.code{
    display:inline-block;
    background:#f0e9ff;
    color:#4c1d95;
    padding:5px 10px;
    border-radius:10px;
    font-weight:900;
    letter-spacing:1px;
}
.status{
    align-self:center;
    padding:10px 15px;
    border-radius:999px;
    font-weight:900;
    white-space:nowrap;
}
.status.active{background:#dcfff0;color:#08784d}
.status.upcoming{background:#fff3d8;color:#9a5b00}
.status.finished{background:#eeeeee;color:#555}
.status.stopped{background:#ffe4e4;color:#a10000}
.empty{
    background:white;
    border-radius:22px;
    padding:35px;
    text-align:center;
    color:#665783;
    font-weight:800;
}
@media(max-width:750px){
    body{padding:22px}
    .header{flex-direction:column;align-items:flex-start}
    .card{grid-template-columns:1fr}
    .exam-grid{grid-template-columns:1fr}
    h1{font-size:27px}
}
</style>
</head>
<body>

<div class="header">
    <h1>Yaklaşan Sınavlar</h1>
    <a href="{{ route('ogrenci.dashboard') }}" class="back">← Öğrenci Paneline Dön</a>
</div>

@forelse($yaklasanSinavlar as $sinav)
    @php
        if ($sinav->isFinished()) {
            $durumText = 'Bitti';
            $durumClass = 'finished';
        } elseif ($sinav->is_active) {
            $durumText = 'Devam Ediyor';
            $durumClass = 'active';
        } elseif ($sinav->started_at && !$sinav->is_active) {
            $durumText = 'Durduruldu';
            $durumClass = 'stopped';
        } else {
            $durumText = 'Yaklaşan';
            $durumClass = 'upcoming';
        }
    @endphp

    <div class="card">
        <div>
            <div class="exam-title">{{ $sinav->title }}</div>

            <div class="exam-grid">
                <div class="exam-info">Ders: {{ $sinav->ders }}</div>
                <div class="exam-info">Sınıf: {{ $sinav->grade }}. Sınıf</div>
                <div class="exam-info">Tarih: {{ $sinav->starts_at->format('d.m.Y H:i') }}</div>
                <div class="exam-info">Süre: {{ $sinav->duration }} dakika</div>
                <div class="exam-info">Kod: <span class="code">{{ $sinav->exam_code }}</span></div>
            </div>
        </div>

        <div class="status {{ $durumClass }}">
            {{ $durumText }}
        </div>
    </div>
@empty
    <div class="empty">
        Yaklaşan sınav bulunmuyor.
    </div>
@endforelse

</body>
</html>