<!DOCTYPE html>
<html lang="tr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quizion - Sınav Koduyla Gir</title>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@600;700;800&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;}
body{min-height:100vh;font-family:'Nunito',sans-serif;background:radial-gradient(circle at top left,rgba(245,166,35,.22),transparent 28%),radial-gradient(circle at bottom right,rgba(108,53,222,.24),transparent 32%),linear-gradient(135deg,#f6f1ff,#efe7ff);color:#24114f;}
.topbar{height:72px;background:rgba(61,26,142,.96);display:flex;align-items:center;justify-content:space-between;padding:0 30px;box-shadow:0 8px 30px rgba(61,26,142,.28);}
.logo{font-family:'Baloo 2',cursive;font-size:2rem;font-weight:900;color:white;text-decoration:none;}
.logo span{color:#f5a623;}
.back{background:white;color:#6c35de;text-decoration:none;padding:11px 18px;border-radius:14px;font-weight:900;}
.page{min-height:calc(100vh - 72px);display:flex;align-items:center;justify-content:center;padding:34px 18px;}
.card{width:100%;max-width:560px;background:white;border:1px solid #eadfff;border-radius:30px;padding:34px;box-shadow:0 18px 55px rgba(74,32,150,.16);position:relative;overflow:hidden;}
.card::before{content:"";position:absolute;width:160px;height:160px;border-radius:50%;background:rgba(245,166,35,.12);top:-55px;right:-55px;}
.card::after{content:"";position:absolute;width:180px;height:180px;border-radius:50%;background:rgba(108,53,222,.10);bottom:-70px;left:-70px;}
.content{position:relative;z-index:2;}
.icon{width:74px;height:74px;border-radius:22px;background:linear-gradient(135deg,#6c35de,#8d61ff);display:flex;align-items:center;justify-content:center;color:white;font-size:2rem;margin:0 auto 18px;box-shadow:0 12px 28px rgba(108,53,222,.28);}
h1{font-family:'Baloo 2',cursive;font-size:2rem;text-align:center;color:#24114f;margin-bottom:8px;}
.desc{text-align:center;color:#6e5e99;font-weight:700;line-height:1.7;margin-bottom:26px;}
.form-box{background:#faf8ff;border:1px solid #eadfff;border-radius:22px;padding:22px;}
label{display:block;color:#24114f;font-weight:900;margin-bottom:10px;}
input[name="exam_code"]{
    width:100%;border:1.5px solid #ddd2ff;border-radius:18px;
    padding:18px;text-align:center;font-size:1.25rem;
    font-weight:900;letter-spacing:4px;color:#24114f;
    outline:none;text-transform:uppercase;
    font-family:'Nunito',sans-serif;
    transition:border-color .2s;
}
input[name="exam_code"]:focus{border-color:#6c35de;box-shadow:0 0 0 4px rgba(108,53,222,.12);}
input[name="exam_code"].has-error{border-color:#ef4444;box-shadow:0 0 0 4px rgba(239,68,68,.1);}
.error-msg{color:#ef4444;font-size:13px;font-weight:700;margin-top:8px;text-align:center;}
button{width:100%;margin-top:16px;border:none;border-radius:18px;padding:17px;background:linear-gradient(135deg,#f5a623,#ff7a35);color:white;font-size:1rem;font-weight:900;cursor:pointer;box-shadow:0 12px 28px rgba(245,166,35,.25);font-family:'Nunito',sans-serif;}
button:hover{transform:translateY(-1px);}
.help{margin-top:15px;color:#8a7aac;font-weight:700;font-size:.84rem;text-align:center;line-height:1.6;}
.mini-cards{display:grid;grid-template-columns:1fr 1fr;gap:12px;margin-top:18px;}
.mini{background:white;border:1px solid #eadfff;border-radius:18px;padding:14px;text-align:center;}
.mini div{font-size:1.4rem;margin-bottom:5px;}
.mini span{color:#6e5e99;font-size:.78rem;font-weight:800;}
@media(max-width:600px){.topbar{padding:0 16px;}.logo{font-size:1.5rem;}.card{padding:26px 20px;}.mini-cards{grid-template-columns:1fr;}}
</style>
</head>
<body>

<div class="topbar">
    <a href="{{ route('home') }}" class="logo">Quiz<span>ion</span></a>
    <a href="{{ route('ogrenci.dashboard') }}" class="back">← Panele Dön</a>
</div>

<div class="page">
    <div class="card">
        <div class="content">
            <div class="icon">🔑</div>
            <h1>Sınav Koduyla Gir</h1>
            <div class="desc">Öğretmeninin verdiği online sınav kodunu girerek sınava hızlıca katılabilirsin.</div>

            {{-- HATA MESAJI --}}
            @if($errors->any())
            <div class="error-msg" style="margin-bottom:14px;">
                {{ $errors->first('exam_code') }}
            </div>
            @endif

            {{-- BAŞARI MESAJI (yanlış yönlendirme vs) --}}
            @if(session('error'))
            <div class="error-msg" style="margin-bottom:14px;">{{ session('error') }}</div>
            @endif

            <div class="form-box">
                <form action="{{ route('ogrenci.sinav.kodu.dogrula') }}" method="POST">
                    @csrf
                    <label>Sınav Kodu</label>
                    <input
                        type="text"
                        name="exam_code"
                        placeholder="ABX92K"
                        maxlength="10"
                        autocomplete="off"
                        autofocus
                        value="{{ old('exam_code') }}"
                        class="{{ $errors->has('exam_code') ? 'has-error' : '' }}"
                    >
                    <button type="submit">🚀 Sınava Katıl</button>
                </form>
                <div class="help">Kod büyük/küçük harf fark etmeden kullanılabilir.</div>
            </div>

            <div class="mini-cards">
                <div class="mini"><div>📅</div><span>Yaklaşan sınavlara hızlı giriş</span></div>
                <div class="mini"><div>🔔</div><span>Öğretmen koduyla erişim</span></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>