{{--

    Kayıt Formu
    Konum: resources/views/auth/register.blade.php
    Tasarım: Quizion mor/altın renk teması ile uyumlu
--}}
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Kayıt Ol – Quizion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@700;800&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: { extend: {
                fontFamily: { nunito: ['Nunito','sans-serif'], baloo: ['Baloo 2','cursive'] },
                colors: {
                    purple: { 950:'#0d0330',900:'#1e0e4b',800:'#3d1a8e',700:'#5a20c8',600:'#6c35de',500:'#7c3aed',400:'#9b6dff',100:'#ede7ff',50:'#f8f4ff' },
                    gold:   { 500:'#f5a623', 600:'#e08c00' }
                }
            }}
        };
    </script>
    <style>
        body { font-family: 'Nunito', sans-serif; }
        .input-field {
            width:100%; padding:12px 16px; border-radius:12px;
            border:1.5px solid #ede7ff; background:#f8f4ff;
            font-size:.9rem; font-weight:600; color:#1e0e4b;
            outline:none; transition:all .2s;
        }
        .input-field:focus { border-color:#6c35de; background:#fff; box-shadow:0 0 0 3px rgba(108,53,222,.12); }
        .input-field::placeholder { color:#9b6dff88; }
        label.form-label { display:block; font-size:.75rem; font-weight:800; text-transform:uppercase; letter-spacing:.5px; color:#5a20c8; margin-bottom:6px; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-900 via-purple-800 to-purple-600 flex items-center justify-center p-4">

    {{-- Arkaplan süslemeleri --}}
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-48 h-48 rounded-full bg-white/5 blur-2xl"></div>
        <div class="absolute bottom-10 right-10 w-64 h-64 rounded-full bg-gold-500/10 blur-3xl"></div>
    </div>

    <div class="relative w-full max-w-md">

        {{-- Logo --}}
        <div class="text-center mb-6">
            <a href="/" class="inline-flex items-center gap-2.5">
                <div class="w-10 h-10 rounded-2xl bg-purple-700 flex items-center justify-center shadow-lg">
                    <svg viewBox="0 0 36 36" fill="none" class="w-7 h-7">
                        <path d="M10 24 L18 12 L26 24" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="18" cy="12" r="2.5" fill="#f5a623"/>
                        <path d="M13 20 L23 20" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round"/>
                    </svg>
                </div>
                <span class="font-baloo text-2xl font-extrabold text-white"><span class="text-gold-500">Q</span>uizion</span>
            </a>
        </div>

        {{-- Kart --}}
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            {{-- Üst başlık --}}
            <div class="bg-gradient-to-r from-purple-700 to-purple-500 px-8 py-6 text-center">
                <h1 class="font-baloo text-2xl font-extrabold text-white mb-1">Hesap Oluştur</h1>
                <p class="text-white/70 text-sm font-semibold">14 gün ücretsiz, kredi kartı yok!</p>
            </div>

            <form method="POST" action="{{ route('register') }}" class="px-8 py-6 space-y-4">
                @csrf

                {{-- Hata mesajları --}}
                @if($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-xl p-4">
                    @foreach($errors->all() as $error)
                        <p class="text-red-600 text-sm font-semibold">⚠️ {{ $error }}</p>
                    @endforeach
                </div>
                @endif

                {{-- Ad Soyad --}}
                <div>
                    <label class="form-label">Ad Soyad</label>
                    <input type="text" name="name" value="{{ old('name') }}" required
                           class="input-field" placeholder="Adınız Soyadınız"/>
                </div>

                {{-- E-posta --}}
                <div>
                    <label class="form-label">E-posta</label>
                    <input type="email" name="email" value="{{ old('email') }}" required
                           class="input-field" placeholder="ornek@email.com"/>
                </div>

                {{-- ROL SEÇİMİ --}}
                <div>
                    <label class="form-label">Ben bir...</label>
                    <div class="grid grid-cols-2 gap-3">
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="ogrenci" class="hidden peer"
                                   {{ old('role', 'ogrenci') === 'ogrenci' ? 'checked' : '' }}
                                   onchange="switchRole('ogrenci')"/>
                            <div class="peer-checked:border-purple-600 peer-checked:bg-purple-50 peer-checked:text-purple-800
                                        border-2 border-gray-200 rounded-2xl p-4 text-center transition">
                                <div class="text-3xl mb-1">🎒</div>
                                <p class="font-black text-sm">Öğrenciyim</p>
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="ogretmen" class="hidden peer"
                                   {{ old('role') === 'ogretmen' ? 'checked' : '' }}
                                   onchange="switchRole('ogretmen')"/>
                            <div class="peer-checked:border-purple-600 peer-checked:bg-purple-50 peer-checked:text-purple-800
                                        border-2 border-gray-200 rounded-2xl p-4 text-center transition">
                                <div class="text-3xl mb-1">🧑‍🏫</div>
                                <p class="font-black text-sm">Öğretmenim</p>
                            </div>
                        </label>
                    </div>
                </div>

                {{-- ÖĞRENCİ'YE ÖZEL ALANLAR --}}
                <div id="alanlar-ogrenci" class="{{ old('role') === 'ogretmen' ? 'hidden' : '' }} space-y-4">
                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label class="form-label">Öğrenci No</label>
                            <input type="text" name="ogrenci_no" value="{{ old('ogrenci_no') }}"
                                   class="input-field" placeholder="12345678"/>
                        </div>
                        <div>
                            <label class="form-label">Sınıf</label>
                            <select name="sinif" class="input-field">
                                @foreach(['5-A','5-B','6-A','6-B','7-A','7-B','8-A','8-B'] as $s)
                                    <option value="{{ $s }}" {{ old('sinif') === $s ? 'selected' : '' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- ÖĞRETMEN'E ÖZEL ALANLAR --}}
                <div id="alanlar-ogretmen" class="{{ old('role') !== 'ogretmen' ? 'hidden' : '' }} space-y-4">
                    <div>
                        <label class="form-label">Branş</label>
                        <select name="brans" class="input-field">
                            @foreach(['Matematik','Fen Bilimleri','Türkçe','Sosyal Bilgiler','İngilizce','Din Kültürü','Beden Eğitimi'] as $b)
                                <option value="{{ $b }}" {{ old('brans') === $b ? 'selected' : '' }}>{{ $b }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="form-label">Okul Adı</label>
                        <input type="text" name="okul" value="{{ old('okul') }}"
                               class="input-field" placeholder="Örn: Atatürk Ortaokulu"/>
                    </div>
                </div>

                {{-- Şifre --}}
                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="form-label">Şifre</label>
                        <input type="password" name="password" required
                               class="input-field" placeholder="En az 8 karakter"/>
                    </div>
                    <div>
                        <label class="form-label">Şifre Tekrar</label>
                        <input type="password" name="password_confirmation" required
                               class="input-field" placeholder="Şifreyi tekrar girin"/>
                    </div>
                </div>

                {{-- Kayıt butonu --}}
                <button type="submit"
                        class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-purple-700 to-purple-500
                               text-white font-black text-base tracking-wide shadow-lg
                               hover:from-purple-800 hover:to-purple-600 transition">
                    🚀 Ücretsiz Hesap Oluştur
                </button>

                {{-- Giriş linki --}}
                <p class="text-center text-purple-500 text-sm font-semibold">
                    Zaten hesabın var mı?
                    <a href="{{ route('login') }}" class="text-purple-700 font-black hover:underline">Giriş Yap →</a>
                </p>
            </form>
        </div>
    </div>

    <script>
        function switchRole(rol) {
            const ogrenci  = document.getElementById('alanlar-ogrenci');
            const ogretmen = document.getElementById('alanlar-ogretmen');
            if (rol === 'ogrenci') {
                ogrenci.classList.remove('hidden');
                ogretmen.classList.add('hidden');
                // Öğretmen alanlarını temizle (required olmasın)
                ogretmen.querySelectorAll('input,select').forEach(el => el.removeAttribute('required'));
                ogrenci.querySelectorAll('input,select').forEach(el => el.setAttribute('required',''));
            } else {
                ogretmen.classList.remove('hidden');
                ogrenci.classList.add('hidden');
                ogrenci.querySelectorAll('input,select').forEach(el => el.removeAttribute('required'));
                ogretmen.querySelectorAll('input,select').forEach(el => el.setAttribute('required',''));
            }
        }
    </script>
</body>
</html>
