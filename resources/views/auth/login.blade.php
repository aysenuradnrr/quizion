{{--
    Giriş Formu
    Konum: resources/views/auth/login.blade.php
    Bu view aynı zamanda welcome.blade.php'deki modal ile eşleşir.
--}}
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Giriş Yap – Quizion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@700;800&display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: { extend: {
                fontFamily: { nunito:['Nunito','sans-serif'], baloo:['Baloo 2','cursive'] },
                colors: {
                    purple:{950:'#0d0330',900:'#1e0e4b',800:'#3d1a8e',700:'#5a20c8',600:'#6c35de',500:'#7c3aed',400:'#9b6dff',100:'#ede7ff',50:'#f8f4ff'},
                    gold:{500:'#f5a623',600:'#e08c00'}
                }
            }}
        };
    </script>
    <style>
        body { font-family:'Nunito',sans-serif; }
        .input-field { width:100%; padding:12px 16px; border-radius:12px; border:1.5px solid #ede7ff; background:#f8f4ff; font-size:.9rem; font-weight:600; color:#1e0e4b; outline:none; transition:all .2s; }
        .input-field:focus { border-color:#6c35de; background:#fff; box-shadow:0 0 0 3px rgba(108,53,222,.12); }
        .input-field::placeholder { color:#9b6dff88; }
        .form-label { display:block; font-size:.75rem; font-weight:800; text-transform:uppercase; letter-spacing:.5px; color:#5a20c8; margin-bottom:6px; }
        .tab-btn.active { background:#6c35de; color:#fff; }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-purple-900 via-purple-800 to-purple-600 flex items-center justify-center p-4">

    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-10 left-10 w-48 h-48 rounded-full bg-white/5 blur-2xl"></div>
        <div class="absolute bottom-10 right-10 w-64 h-64 rounded-full bg-gold-500/10 blur-3xl"></div>
    </div>

    <div class="relative w-full max-w-sm">

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

        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

            {{-- Başlık --}}
            <div class="bg-gradient-to-r from-purple-700 to-purple-500 px-8 py-6 text-center">
                <h1 class="font-baloo text-2xl font-extrabold text-white mb-1">Tekrar Hoş Geldin!</h1>
                <p class="text-white/70 text-sm font-semibold">Hesabına giriş yap, öğrenmeye devam et</p>
            </div>

            {{-- Session mesajları --}}
            @if(session('error'))
            <div class="mx-6 mt-4 bg-red-50 border border-red-200 rounded-xl px-4 py-3">
                <p class="text-red-600 text-sm font-bold">⚠️ {{ session('error') }}</p>
            </div>
            @endif

            @if(session('warning'))
            <div class="mx-6 mt-4 bg-yellow-50 border border-yellow-200 rounded-xl px-4 py-3">
                <p class="text-yellow-700 text-sm font-bold">{{ session('warning') }}</p>
            </div>
            @endif

            {{-- Tab seçimi --}}
            <div class="flex mx-6 mt-6 bg-purple-50 rounded-2xl p-1 gap-1">
                <button type="button" id="tab-ogrenci" onclick="switchTab('ogrenci')"
                        class="tab-btn active flex-1 py-2.5 rounded-xl text-sm font-black transition text-purple-600">
                    🎒 Öğrenci
                </button>
                <button type="button" id="tab-ogretmen" onclick="switchTab('ogretmen')"
                        class="tab-btn flex-1 py-2.5 rounded-xl text-sm font-black transition text-purple-600">
                    🧑‍🏫 Öğretmen
                </button>
            </div>

            <form method="POST" action="{{ route('login') }}" class="px-6 pt-5 pb-6 space-y-4">
                @csrf

                @if($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-xl p-3">
                    @foreach($errors->all() as $error)
                        <p class="text-red-600 text-sm font-semibold">{{ $error }}</p>
                    @endforeach
                </div>
                @endif

                {{-- Öğrenci: Öğrenci No --}}
                <div id="alan-ogrenci-no">
                    <label class="form-label">Öğrenci Numarası</label>
                    <input type="text" name="login_id" value="{{ old('login_id') }}"
                           class="input-field" placeholder="12345678" autocomplete="off"/>
                    <p class="text-purple-400 text-xs font-semibold mt-1">
                        💡 Öğrenci numaranla giriş yapabilirsin
                    </p>
                </div>

                {{-- Öğretmen: E-posta (gizli başlangıçta) --}}
                <div id="alan-email" class="hidden">
                    <label class="form-label">E-posta Adresi</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="input-field" placeholder="ogretmen@okul.edu.tr"/>
                </div>

                {{-- Şifre --}}
                <div>
                    <label class="form-label">Şifre</label>
                    <input type="password" name="password" required
                           class="input-field" placeholder="••••••••"/>
                </div>

                {{-- Beni hatırla + Şifremi unuttum --}}
                <div class="flex items-center justify-between">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-purple-200 text-purple-600"/>
                        <span class="text-sm font-bold text-purple-600">Beni hatırla</span>
                    </label>
                    <a href="#" class="text-sm font-bold text-purple-400 hover:text-purple-600 transition">
                        Şifremi unuttum?
                    </a>
                </div>

                {{-- Giriş butonu --}}
                <button type="submit"
                        class="w-full py-3.5 rounded-2xl bg-gradient-to-r from-purple-700 to-purple-500
                               text-white font-black text-base tracking-wide shadow-lg
                               hover:from-purple-800 hover:to-purple-600 transition">
                    🚀 Giriş Yap
                </button>

                <p class="text-center text-purple-500 text-sm font-semibold">
                    Hesabın yok mu?
                    <a href="{{ route('register') }}" class="text-purple-700 font-black hover:underline">Ücretsiz Kayıt Ol →</a>
                </p>
            </form>
        </div>

        <p class="text-center text-white/40 text-xs mt-4">
            Quizion © {{ date('Y') }} · Hitit Üniversitesi Projesi
        </p>
    </div>

    <script>
        let aktifTab = 'ogrenci';

        function switchTab(tab) {
            aktifTab = tab;
            document.getElementById('tab-ogrenci').classList.toggle('active',  tab === 'ogrenci');
            document.getElementById('tab-ogretmen').classList.toggle('active', tab === 'ogretmen');
            document.getElementById('alan-ogrenci-no').classList.toggle('hidden', tab !== 'ogrenci');
            document.getElementById('alan-email').classList.toggle('hidden',       tab !== 'ogretmen');
        }
    </script>
</body>
</html>
