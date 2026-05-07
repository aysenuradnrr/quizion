<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bildirimler</title>
<style>
body{font-family:Arial,sans-serif;background:#f4f0ff;padding:40px;color:#1e0e4b}
.card{background:white;border-radius:18px;padding:20px;margin-bottom:14px;box-shadow:0 4px 16px rgba(0,0,0,.08)}
h1{margin-bottom:22px}
.back{display:inline-block;margin-top:20px;text-decoration:none;background:#6c35de;color:white;padding:12px 18px;border-radius:12px;font-weight:bold}
</style>
</head>
<body>

<h1>🔔 Bildirimler</h1>

@forelse($bildirimler as $bildirim)
    <div class="card">
        <strong>{{ $bildirim['title'] }}</strong>
        <p>{{ $bildirim['message'] }}</p>
        <small>{{ $bildirim['time'] }}</small>
    </div>
@empty
    <div class="card">Henüz bildirimin yok.</div>
@endforelse

<a href="{{ route('ogrenci.dashboard') }}" class="back">← Öğrenci Paneline Dön</a>

</body>
</html>