<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizion — Analiz Odası</title>
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
.card{background:white;border-radius:16px;padding:22px 24px;box-shadow:0 1px 8px rgba(58,28,113,.08);margin-bottom:22px;}
.card-title{font-size:15px;font-weight:800;color:#24114f;margin-bottom:16px;display:flex;align-items:center;gap:8px;}

/* Özet tablosu */
table{width:100%;border-collapse:collapse;}
thead th{text-align:left;font-size:11px;color:#9ca3af;font-weight:800;text-transform:uppercase;letter-spacing:.5px;padding:8px 12px;border-bottom:2px solid #f3f0ff;}
tbody td{padding:13px 12px;font-size:13px;color:#374151;border-bottom:1px solid #faf5ff;font-weight:600;}
tbody tr:last-child td{border-bottom:none;}
tbody tr:hover{background:#fdfbff;}
.pin{background:#EDE9FF;color:#6C3FC5;font-weight:900;font-size:13px;letter-spacing:3px;padding:4px 12px;border-radius:8px;display:inline-block;}
.bar-wrap{display:flex;align-items:center;gap:8px;}
.bar-bg{background:#f3f0ff;border-radius:4px;height:8px;width:90px;flex-shrink:0;}
.bar-fill{background:linear-gradient(90deg,#6C3FC5,#9B72E8);height:8px;border-radius:4px;}
.badge-a{background:#D1FAE5;color:#065F46;font-size:11px;padding:3px 10px;border-radius:6px;font-weight:800;}
.badge-p{background:#F3F4F6;color:#6B7280;font-size:11px;padding:3px 10px;border-radius:6px;font-weight:800;}

/* Akordeon: bireysel detay */
.detail-toggle{background:none;border:none;color:#6C3FC5;font-size:12px;font-weight:800;cursor:pointer;font-family:'Nunito',sans-serif;padding:4px 8px;border-radius:6px;background:#EDE9FF;}
.detail-toggle:hover{background:#DDD5FF;}
.detail-panel{display:none;margin-top:16px;border-top:1px solid #f3f0ff;padding-top:16px;}
.detail-panel.open{display:block;}
.detail-table thead th{font-size:10px;}
.detail-table tbody td{font-size:12px;padding:10px 12px;}
.puan-chip{display:inline-block;padding:3px 10px;border-radius:8px;font-weight:800;font-size:12px;}
.puan-chip.iyi{background:#D1FAE5;color:#065F46;}
.puan-chip.orta{background:#FEF3C7;color:#92400E;}
.puan-chip.kotu{background:#FEE2E2;color:#991B1B;}

.empty{text-align:center;padding:36px 0;color:#9ca3af;}
.empty .big{font-size:38px;margin-bottom:10px;}

/* Sınav bazlı öğrenci kartları */
.sinav-block{border:1.5px solid #EDE9FF;border-radius:14px;padding:18px;margin-bottom:14px;}
.sinav-block-header{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:10px;}
.sinav-block-title{font-weight:800;font-size:14px;color:#24114f;}
.meta-chips{display:flex;gap:8px;flex-wrap:wrap;margin-top:6px;}
.chip{background:#f3f0ff;color:#6C3FC5;border-radius:8px;padding:3px 10px;font-size:11px;font-weight:800;}

@media(max-width:768px){.main{padding:20px 14px;}table{font-size:12px;}.bar-bg{width:60px;}}
</style>
</head>
<body>
<div class="topbar">
    <a href="{{ route('ogretmen.dashboard') }}" class="logo">Quiz<span>ion</span></a>
    <a href="{{ route('ogretmen.dashboard') }}" class="back">← Panele Dön</a>
</div>

<div class="main">
    <div class="page-header">
        <h1>📊 Analiz Odası</h1>
        <p>Tüm sınav sonuçları, öğrenci doğru/yanlış/boş detayları</p>
    </div>

    @if($sinavlar->count() > 0)

        
 {{-- — LİDERLİK TABLOSU — --}}
@foreach($sinavlar as $s)
    @php $o = $ozet[$s->id] ?? []; @endphp
    @if(count($o['liderler'] ?? []) > 0)
        <div class="card" style="margin-bottom:22px;">
            <div class="card-title">🏆 {{ $s->title }} - Liderlik Tablosu</div>
            <div style="display:flex;gap:16px;flex-wrap:wrap;">
                @foreach($o['liderler'] as $l)
                    @php 
                        $madalya = ['🥇','🥈','🥉'][$l['sira']-1] ?? '🏅';
                        $bg      = ['#FEF9C3','#F3F4F6','#FEF3C7'][$l['sira']-1] ?? '#f9f9f9';
                    @endphp
                    <div style="flex:1;min-width:160px;background:{{ $bg }};border-radius:16px;padding:15px;text-align:center;">
                        <div style="font-size:2.4rem;">{{ $madalya }}</div>
                        <div style="font-weight:900;font-size:14px;color:#24114f;margin-top:6px;">{{ $l['ad'] }}</div>
                        <div style="font-size:2rem;font-weight:900;color:#6C3FC5;margin-top:4px;">{{ $l['puan'] }}</div>
                        <div style="font-size:11px;color:#6b7280;margin-top:4px;">✅ {{ $l['dogru'] }} Doğru</div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endforeach


       {{-- ── ÖZET TABLO ── --}}
        <div class="card">
            <div class="card-title">📋 Sınav Özeti</div>
            <table>
                <thead>
                    <tr>
                        <th>Sınav</th>
                        <th>PIN</th>
                        <th>Sınıf</th>
                        <th>Katılım</th>
                        <th>Ort. Puan</th>
                        <th>En Yüksek</th>
                        <th>Tarih</th>
                        <th>Durum</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sinavlar as $s)
                    @php $o = $ozet[$s->id] ?? ['katilimci'=>0,'ortalama'=>0,'en_yuksek'=>0]; @endphp
                    <tr>
                        <td><strong>{{ $s->title }}</strong></td>
                        <td><span class="pin">{{ $s->exam_code }}</span></td>
                        <td>{{ $s->grade }}</td>
                        <td>{{ $o['katilimci'] }} öğrenci</td>
                        <td>
                            <div class="bar-wrap">
                                <div class="bar-bg">
                                    <div class="bar-fill" style="width:{{ min($o['ortalama'],100) }}%"></div>
                                </div>
                                <strong>{{ $o['ortalama'] }}</strong>
                            </div>
                        </td>
                        <td><strong>{{ $o['en_yuksek'] }}</strong></td>
                        <td>{{ \Carbon\Carbon::parse($s->starts_at)->format('d.m.Y') }}</td>
                        <td><span class="{{ $s->is_active ? 'badge-a' : 'badge-p' }}">{{ $s->is_active ? 'Aktif' : 'Pasif' }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ── BİREYSEL DETAY (her sınav için açılır panel) ── --}}
        <div class="card">
            <div class="card-title">👤 Öğrenci Bazında Detay</div>

            @foreach($sinavlar as $s)
            @php $o = $ozet[$s->id] ?? []; @endphp
            <div class="sinav-block">
                <div class="sinav-block-header">
                    <div>
                        <div class="sinav-block-title">{{ $s->title }}</div>
                        <div class="meta-chips">
                            <span class="chip">{{ $s->grade }}. Sınıf</span>
                            <span class="chip">{{ $s->ders ?? 'Genel' }}</span>
                            <span class="chip">{{ $o['katilimci'] ?? 0 }} katılımcı</span>
                            <span class="chip">Ort: {{ $o['ortalama'] ?? 0 }}</span>
                        </div>
                    </div>
                    @if(($o['katilimci'] ?? 0) > 0)
                    <button class="detail-toggle" onclick="toggleDetail('detail-{{ $s->id }}', this)">
                        + Detayları Gör
                    </button>
                    @else
                        <span style="font-size:12px;color:#9ca3af;font-weight:700;">Henüz katılımcı yok</span>
                    @endif
                </div>

                @if(($o['katilimci'] ?? 0) > 0)
                <div class="detail-panel" id="detail-{{ $s->id }}">
                    <table class="detail-table">
                        <thead>
                            <tr>
                                <th>Öğrenci</th>
                                <th>Doğru</th>
                                <th>Yanlış</th>
                                <th>Boş</th>
                                <th>Puan</th>
                                <th>Tarih</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($o['detay'] as $d)
                            <tr>
                                <td><strong>{{ $d['isim'] }}</strong></td>
                                <td style="color:#059669;font-weight:800;">✅ {{ $d['dogru'] }}</td>
                                <td style="color:#dc2626;font-weight:800;">❌ {{ $d['yanlis'] }}</td>
                                <td style="color:#9ca3af;font-weight:800;">— {{ $d['bos'] }}</td>
                                <td>
                                    <span class="puan-chip {{ $d['puan'] >= 70 ? 'iyi' : ($d['puan'] >= 50 ? 'orta' : 'kotu') }}">
                                        %{{ $d['puan'] }}
                                    </span>
                                </td>
                                <td>{{ $d['tarih'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
            @endforeach
        </div>

    @else
    <div class="card">
        <div class="empty">
            <div class="big">📭</div>
            <p>Henüz sınav oluşturmadınız.<br>
               <a href="{{ route('ogretmen.sinav.olustur') }}" style="color:#6C3FC5;font-weight:800;">İlk sınavı oluştur →</a>
            </p>
        </div>
    </div>
    @endif
</div>

<script>
function toggleDetail(id, btn) {
    const panel = document.getElementById(id);
    panel.classList.toggle('open');
    btn.textContent = panel.classList.contains('open') ? '− Detayları Gizle' : '+ Detayları Gör';
}
</script>
</body>
</html>
