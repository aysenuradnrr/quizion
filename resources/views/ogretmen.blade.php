{{--
    ============================================================
    Quizion – Öğretmen Paneli
    ogretmen.blade.php
    Tailwind CSS ile oluşturulmuştur. Ana şablondan extend eder.
    ============================================================
--}}

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Öğretmen Paneli – Quizion</title>

    {{-- Tailwind CDN (üretimde compile edilmiş build kullanın) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Baloo+2:wght@700;800&display=swap" rel="stylesheet"/>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        nunito: ['Nunito', 'sans-serif'],
                        baloo:  ['Baloo 2', 'cursive'],
                    },
                    colors: {
                        purple: {
                            950: '#0d0330',
                            900: '#1e0e4b',
                            800: '#3d1a8e',
                            700: '#5a20c8',
                            600: '#6c35de',
                            500: '#7c3aed',
                            400: '#9b6dff',
                            100: '#ede7ff',
                            50:  '#f8f4ff',
                        },
                        gold: {
                            500: '#f5a623',
                            600: '#e08c00',
                            400: '#ffc04d',
                        },
                    },
                    boxShadow: {
                        'card':   '0 2px 16px rgba(61,26,142,0.09)',
                        'card-hover': '0 10px 32px rgba(61,26,142,0.18)',
                        'glow':   '0 0 24px rgba(108,53,222,0.35)',
                        'gold':   '0 6px 20px rgba(245,166,35,0.4)',
                    },
                },
            },
        };
    </script>

    <style>
        * { box-sizing: border-box; }
        body { font-family: 'Nunito', sans-serif; }

        /* ── Scrollbar ── */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #9b6dff55; border-radius: 4px; }

        /* ── Sidebar ── */
        .sidebar-item {
            display: flex; align-items: center; gap: 11px;
            padding: 10px 14px; border-radius: 12px;
            color: rgba(255,255,255,0.65);
            font-weight: 700; font-size: 0.875rem;
            transition: all .22s ease; cursor: pointer;
            text-decoration: none;
        }
        .sidebar-item:hover  { background: rgba(255,255,255,0.1); color: #fff; transform: translateX(3px); }
        .sidebar-item.active { background: rgba(245,166,35,0.18); color: #f5a623; border-left: 3px solid #f5a623; padding-left: 11px; }

        /* ── Stat card ── */
        .stat-card { transition: transform .25s, box-shadow .25s; }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(61,26,142,0.2); }

        /* ── Pulse badge ── */
        @keyframes pulse-badge {
            0%,100% { box-shadow: 0 0 0 0 rgba(245,166,35,.55); }
            60%      { box-shadow: 0 0 0 8px rgba(245,166,35,0); }
        }
        .pulse-gold { animation: pulse-badge 2s infinite; }

        /* ── Shimmer row ── */
        @keyframes fadeInUp {
            from { opacity:0; transform:translateY(10px); }
            to   { opacity:1; transform:translateY(0); }
        }
        .fade-in { animation: fadeInUp .4s ease forwards; }

        /* ── Tab active ── */
        .tab-btn.active { background: #6c35de; color: #fff; }

        /* ── Modal backdrop ── */
        .modal-backdrop { backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); }

        /* ── Tooltip ── */
        [data-tip]::after {
            content: attr(data-tip);
            position: absolute; bottom: calc(100% + 6px); left: 50%;
            transform: translateX(-50%);
            background: #1e0e4b; color: #fff; font-size: .7rem; font-weight: 700;
            padding: 4px 10px; border-radius: 6px; white-space: nowrap;
            pointer-events: none; opacity: 0; transition: opacity .2s;
        }
        [data-tip]:hover::after { opacity: 1; }
    </style>
</head>

<body class="bg-purple-50 font-nunito text-purple-900 min-h-screen">

{{-- ════════════════════════════════════════════════════
     DUYURU BANDI
════════════════════════════════════════════════════ --}}
<div class="bg-purple-800 text-white text-xs font-bold overflow-hidden h-8 flex items-center">
    <div class="whitespace-nowrap animate-[marquee_30s_linear_infinite] flex gap-20"
         style="animation: marquee 30s linear infinite;">
        <span>📢 Aktif Sınav: <span class="text-gold-400">{{ $aktifSinavSayisi ?? 3 }}</span> sınav şu an devam ediyor</span>
        <span>🏆 Bu haftanın en başarılı sınıfı: <span class="text-gold-400">{{ $enBasariliSinif ?? '7-A' }}</span></span>
        <span>📝 Yeni soru ekleyerek öğrencilerini motive et!</span>
        <span>📢 Aktif Sınav: <span class="text-gold-400">{{ $aktifSinavSayisi ?? 3 }}</span> sınav şu an devam ediyor</span>
        <span>🏆 Bu haftanın en başarılı sınıfı: <span class="text-gold-400">{{ $enBasariliSinif ?? '7-A' }}</span></span>
        <span>📝 Yeni soru ekleyerek öğrencilerini motive et!</span>
    </div>
</div>
<style>@keyframes marquee{ from{transform:translateX(0)} to{transform:translateX(-50%)} }</style>

{{-- ════════════════════════════════════════════════════
     LAYOUT WRAPPER
════════════════════════════════════════════════════ --}}
<div class="flex min-h-screen">

    {{-- ─────────────────────────────────────
         SIDEBAR
    ───────────────────────────────────── --}}
    <aside id="sidebar"
           class="fixed inset-y-0 left-0 z-40 w-64 flex flex-col
                  bg-gradient-to-b from-purple-900 via-purple-800 to-purple-900
                  shadow-2xl transition-transform duration-300 pt-8"
           style="top:32px">

        {{-- Logo --}}
        <div class="px-5 mb-8">
            <a href="/" class="flex items-center gap-2.5">
                <div class="w-9 h-9 rounded-xl bg-purple-700 flex items-center justify-center shadow-glow flex-shrink-0">
                    <svg viewBox="0 0 36 36" fill="none" class="w-7 h-7">
                        <path d="M10 24 L18 12 L26 24" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="18" cy="12" r="2.5" fill="#f5a623"/>
                        <path d="M13 20 L23 20" stroke="rgba(255,255,255,0.4)" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="10" cy="24" r="1.8" fill="white" opacity=".85"/>
                        <circle cx="26" cy="24" r="1.8" fill="white" opacity=".85"/>
                    </svg>
                </div>
                <span class="font-baloo font-800 text-xl text-white">
                    <span class="text-gold-500">Q</span>uizion
                </span>
            </a>
        </div>

        {{-- Öğretmen Profil Kartı --}}
        <div class="mx-4 mb-6 p-3.5 rounded-2xl bg-white/10 border border-white/15">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-gold-500 to-orange-500 flex items-center justify-content-center text-white font-black text-lg flex items-center justify-center shadow-gold flex-shrink-0">
                    {{ mb_substr($ogretmen->ad ?? 'Ö', 0, 1) }}
                </div>
                <div class="min-w-0">
                    <p class="text-white font-bold text-sm truncate">{{ $ogretmen->ad_soyad ?? 'Öğretmen Adı' }}</p>
                    <p class="text-white/55 text-xs font-semibold">{{ $ogretmen->brans ?? 'Matematik' }} Öğretmeni</p>
                </div>
            </div>
        </div>

        {{-- Menü --}}
        <nav class="flex-1 px-3 space-y-1 overflow-y-auto">
            <p class="text-white/30 text-xs font-black uppercase tracking-widest px-3 mb-2">Ana Menü</p>

            <a href="{{ route('ogretmen.dashboard') }}" class="sidebar-item {{ request()->routeIs('ogretmen.dashboard') ? 'active' : '' }}">
                <span class="text-lg">🏠</span> Dashboard
            </a>
            <a href="{{ route('ogretmen.soru-bankasi') }}" class="sidebar-item {{ request()->routeIs('ogretmen.soru*') ? 'active' : '' }}">
                <span class="text-lg">🧠</span> Soru Bankası
                @if(($bekleyenSoru ?? 0) > 0)
                    <span class="ml-auto bg-gold-500 text-white text-xs font-black px-2 py-0.5 rounded-full">{{ $bekleyenSoru }}</span>
                @endif
            </a>
            <a href="{{ route('ogretmen.sinavlarim') }}" class="sidebar-item {{ request()->routeIs('ogretmen.sinav*') ? 'active' : '' }}">
                <span class="text-lg">📋</span> Sınavlarım
            </a>
            <a href="{{ route('ogretmen.ogrenci-raporlari') }}" class="sidebar-item {{ request()->routeIs('ogretmen.rapor*') ? 'active' : '' }}">
                <span class="text-lg">📊</span> Öğrenci Raporları
            </a>

            <div class="h-px bg-white/10 my-3"></div>
            <p class="text-white/30 text-xs font-black uppercase tracking-widest px-3 mb-2">Araçlar</p>

            <a href="{{ route('ogretmen.sinif-listesi') }}" class="sidebar-item">
                <span class="text-lg">👥</span> Sınıf Listesi
            </a>
            <a href="{{ route('ogretmen.takvim') }}" class="sidebar-item">
                <span class="text-lg">📅</span> Sınav Takvimi
            </a>
            <a href="{{ route('ogretmen.rozetler') }}" class="sidebar-item">
                <span class="text-lg">🏅</span> Rozet Yönetimi
            </a>

            <div class="h-px bg-white/10 my-3"></div>

            <a href="{{ route('ogretmen.ayarlar') }}" class="sidebar-item">
                <span class="text-lg">⚙️</span> Ayarlar
            </a>
            <a href="{{ route('logout') }}" class="sidebar-item hover:bg-red-500/20 hover:text-red-300"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <span class="text-lg">🚪</span> Çıkış Yap
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
        </nav>

        {{-- Alt bilgi --}}
        <div class="p-4 border-t border-white/10">
            <p class="text-white/30 text-xs text-center">Quizion © {{ date('Y') }} · Hitit Üniversitesi</p>
        </div>
    </aside>

    {{-- ─────────────────────────────────────
         MAIN CONTENT
    ───────────────────────────────────── --}}
    <div class="flex-1 flex flex-col ml-64">

        {{-- ── NAVBAR ── --}}
        <header class="sticky top-8 z-30 bg-white/90 backdrop-blur-xl border-b border-purple-100
                        flex items-center justify-between px-8 h-16 shadow-sm">

            {{-- Sol: Sayfa başlığı --}}
            <div class="flex items-center gap-3">
                <button onclick="document.getElementById('sidebar').classList.toggle('-translate-x-full')"
                        class="w-9 h-9 rounded-xl bg-purple-50 border border-purple-100
                               flex items-center justify-center text-purple-600
                               hover:bg-purple-100 transition lg:hidden">
                    ☰
                </button>
                <div>
                    <h1 class="font-baloo font-bold text-lg text-purple-900 leading-tight" id="pageTitle">Dashboard</h1>
                    <p class="text-purple-400 text-xs font-semibold hidden sm:block">{{ now()->format('d F Y, l') }}</p>
                </div>
            </div>

            {{-- Sağ: Bildirim + Profil --}}
            <div class="flex items-center gap-3">

                {{-- Arama --}}
                <div class="relative hidden md:block">
                    <input type="text" placeholder="Soru veya öğrenci ara..."
                           class="pl-9 pr-4 py-2 rounded-xl bg-purple-50 border border-purple-100
                                  text-sm font-semibold text-purple-800 placeholder-purple-300
                                  focus:outline-none focus:border-purple-400 focus:bg-white transition w-52"/>
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-purple-300 text-sm">🔍</span>
                </div>

                {{-- Bildirim --}}
                <div class="relative">
                    <button class="w-9 h-9 rounded-xl bg-purple-50 border border-purple-100
                                   flex items-center justify-center text-purple-600
                                   hover:bg-purple-100 transition relative">
                        <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                             stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                        </svg>
                        <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-gold-500 rounded-full border border-white pulse-gold"></span>
                    </button>
                </div>

                {{-- Profil --}}
                <div class="flex items-center gap-2.5 bg-purple-50 border border-purple-100 rounded-xl px-3 py-1.5 cursor-pointer hover:bg-purple-100 transition">
                    <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-purple-600 to-purple-400 flex items-center justify-center text-white font-black text-xs">
                        {{ mb_substr($ogretmen->ad ?? 'Ö', 0, 1) }}
                    </div>
                    <div class="hidden sm:block">
                        <p class="text-purple-900 font-bold text-xs leading-tight">{{ $ogretmen->ad_soyad ?? 'Öğretmen Adı' }}</p>
                        <p class="text-purple-400 text-xs font-semibold">{{ $ogretmen->brans ?? 'Matematik' }}</p>
                    </div>
                    <span class="text-purple-300 text-xs">▾</span>
                </div>
            </div>
        </header>

        {{-- ── PAGE BODY ── --}}
        <main class="flex-1 p-6 space-y-6 overflow-y-auto">

            {{-- ════ 1. KARŞILAMA + ÜST İSTATİSTİK KARTLARI ════ --}}
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-5">

                {{-- Karşılama --}}
                <div class="lg:col-span-2 bg-gradient-to-br from-purple-700 to-purple-500 rounded-2xl p-6
                            text-white shadow-glow relative overflow-hidden">
                    <div class="absolute -top-8 -right-8 w-32 h-32 rounded-full bg-white/5"></div>
                    <div class="absolute bottom-0 left-1/3 w-24 h-24 rounded-full bg-gold-500/10"></div>
                    <p class="text-white/70 text-sm font-bold mb-1">👋 Merhaba,</p>
                    <h2 class="font-baloo text-2xl font-extrabold mb-1">{{ $ogretmen->ad ?? 'Öğretmen' }}!</h2>
                    <p class="text-white/65 text-sm leading-relaxed">
                        Bugün <span class="text-gold-400 font-bold">{{ $bugunSinavSayisi ?? 2 }} sınavın</span> var.<br>
                        Öğrencilerin seni bekliyor! 🚀
                    </p>
                    <button onclick="openSoruModal()"
                            class="mt-4 inline-flex items-center gap-2 bg-gold-500 hover:bg-gold-600
                                   text-white text-sm font-black px-4 py-2 rounded-xl transition shadow-gold">
                        ✏️ Yeni Soru Ekle
                    </button>
                </div>

                {{-- İstatistik Kartları --}}
                @php
                    $statCards = [
                        ['icon'=>'📝','label'=>'Toplam Sorum',   'value'=>$toplamSoru    ?? 148, 'color'=>'purple', 'sub'=>'soru bankasında'],
                        ['icon'=>'🎯','label'=>'Aktif Sınav',    'value'=>$aktifSinav    ?? 3,   'color'=>'gold',   'sub'=>'şu an devam ediyor'],
                        ['icon'=>'👨‍🎓','label'=>'Takip Ettiğim', 'value'=>$toplamOgrenci ?? 86,  'color'=>'teal',   'sub'=>'öğrenci'],
                    ];
                @endphp

                @foreach($statCards as $i => $sc)
                <div class="stat-card bg-white rounded-2xl p-5 shadow-card border border-purple-100 flex flex-col gap-2 fade-in"
                     style="animation-delay: {{ $i * 0.08 }}s">
                    <div class="flex items-center justify-between">
                        <span class="text-2xl">{{ $sc['icon'] }}</span>
                        <span class="text-xs font-bold px-2 py-0.5 rounded-full
                            {{ $sc['color']==='gold' ? 'bg-gold-500/15 text-gold-600' :
                               ($sc['color']==='teal' ? 'bg-teal-50 text-teal-600' : 'bg-purple-100 text-purple-600') }}">
                            Canlı
                        </span>
                    </div>
                    <p class="font-baloo text-3xl font-extrabold text-purple-900">{{ $sc['value'] }}</p>
                    <div>
                        <p class="font-bold text-sm text-purple-700">{{ $sc['label'] }}</p>
                        <p class="text-purple-400 text-xs font-semibold">{{ $sc['sub'] }}</p>
                    </div>
                </div>
                @endforeach

                {{-- Haftanın Soru Canavarı --}}
                <div class="stat-card bg-gradient-to-br from-gold-500 to-orange-400 rounded-2xl p-5 shadow-gold text-white flex flex-col gap-1 fade-in"
                     style="animation-delay:.25s">
                    <span class="text-3xl">🦁</span>
                    <p class="font-baloo text-lg font-extrabold leading-tight">Haftanın<br>Soru Canavarı</p>
                    <p class="font-black text-xl">{{ $haftaninSoruCaNavari ?? '7-A Sınıfı' }}</p>
                    <p class="text-white/75 text-xs font-bold">{{ $haftaninSkor ?? '2.340' }} puan toplandı</p>
                </div>
            </div>

            {{-- ════ 2. SORU EKLEME + AKTİF SINAVLAR ════ --}}
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

                {{-- Hızlı Soru Ekleme Formu --}}
                <div class="bg-white rounded-2xl shadow-card border border-purple-100 overflow-hidden">
                    <div class="flex items-center gap-3 px-6 py-4 border-b border-purple-50 bg-purple-50/60">
                        <span class="text-xl">✏️</span>
                        <h3 class="font-baloo font-bold text-purple-900">Hızlı Soru Ekle</h3>
                        <span class="ml-auto text-xs text-purple-400 font-bold">Soru Bankası</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <form action="{{ route('ogretmen.soru.ekle') }}" method="POST" id="soruForm">
                            @csrf

                            {{-- Soru Metni --}}
                            <div>
                                <label class="block text-xs font-black text-purple-700 uppercase tracking-wide mb-1.5">
                                    Soru Metni <span class="text-red-400">*</span>
                                </label>
                                <textarea name="soru_metni" rows="3" required
                                    placeholder="Sorunuzu buraya yazınız..."
                                    class="w-full px-4 py-3 rounded-xl border border-purple-200 bg-purple-50/40
                                           text-sm font-semibold text-purple-900 placeholder-purple-300
                                           focus:outline-none focus:border-purple-500 focus:bg-white transition resize-none">{{ old('soru_metni') }}</textarea>
                            </div>

                            {{-- Ders + Sınıf Seviyesi --}}
                            <div class="grid grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-black text-purple-700 uppercase tracking-wide mb-1.5">Ders</label>
                                    <select name="ders_id" required
                                        class="w-full px-3 py-2.5 rounded-xl border border-purple-200 bg-purple-50/40
                                               text-sm font-bold text-purple-900
                                               focus:outline-none focus:border-purple-500 transition">
                                        <option value="">Seçiniz…</option>
                                        @foreach($dersler ?? [] as $ders)
                                            <option value="{{ $ders->id }}" {{ old('ders_id') == $ders->id ? 'selected' : '' }}>
                                                {{ $ders->ad }}
                                            </option>
                                        @endforeach
                                        {{-- Fallback --}}
                                        @if(empty($dersler))
                                            <option value="1">Matematik</option>
                                            <option value="2">Fen Bilimleri</option>
                                            <option value="3">Türkçe</option>
                                            <option value="4">Sosyal Bilgiler</option>
                                            <option value="5">İngilizce</option>
                                            <option value="6">Din Kültürü</option>
                                        @endif
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-black text-purple-700 uppercase tracking-wide mb-1.5">Sınıf Seviyesi</label>
                                    <select name="sinif_seviyesi"
                                        class="w-full px-3 py-2.5 rounded-xl border border-purple-200 bg-purple-50/40
                                               text-sm font-bold text-purple-900
                                               focus:outline-none focus:border-purple-500 transition">
                                        <option value="5">5. Sınıf</option>
                                        <option value="6">6. Sınıf</option>
                                        <option value="7">7. Sınıf</option>
                                        <option value="8" selected>8. Sınıf</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Şıklar --}}
                            <div class="space-y-2">
                                <label class="block text-xs font-black text-purple-700 uppercase tracking-wide mb-1">
                                    Şıklar <span class="text-red-400">*</span>
                                </label>
                                @foreach(['A','B','C','D'] as $sik)
                                <div class="flex items-center gap-2.5">
                                    <label class="flex items-center justify-center w-7 h-7 rounded-lg font-black text-xs
                                                  bg-purple-100 text-purple-700 cursor-pointer flex-shrink-0 has-[:checked]:bg-gold-500 has-[:checked]:text-white transition">
                                        <input type="radio" name="dogru_cevap" value="{{ $sik }}" class="hidden" required/>
                                        {{ $sik }}
                                    </label>
                                    <input type="text" name="sik_{{ strtolower($sik) }}" required
                                           placeholder="{{ $sik }} şıkkını girin..."
                                           value="{{ old('sik_'.strtolower($sik)) }}"
                                           class="flex-1 px-3 py-2 rounded-xl border border-purple-200 bg-purple-50/40
                                                  text-sm font-semibold text-purple-900 placeholder-purple-300
                                                  focus:outline-none focus:border-purple-500 focus:bg-white transition"/>
                                </div>
                                @endforeach
                                <p class="text-purple-400 text-xs font-semibold">💡 Doğru cevap için ilgili harf butonuna tıklayın (altın renge döner)</p>
                            </div>

                            {{-- Zorluk --}}
                            <div>
                                <label class="block text-xs font-black text-purple-700 uppercase tracking-wide mb-1.5">Zorluk Seviyesi</label>
                                <div class="flex gap-2">
                                    @foreach(['Kolay'=>'green','Orta'=>'gold','Zor'=>'red'] as $seviye => $renk)
                                    <label class="flex-1 text-center cursor-pointer">
                                        <input type="radio" name="zorluk" value="{{ $seviye }}" class="hidden peer" {{ $seviye==='Orta' ? 'checked' : '' }}/>
                                        <span class="block py-1.5 rounded-xl text-xs font-black border-2 transition
                                            peer-checked:border-purple-600 peer-checked:bg-purple-600 peer-checked:text-white
                                            border-purple-100 text-purple-400 hover:border-purple-300">
                                            {{ $seviye }}
                                        </span>
                                    </label>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit"
                                    class="w-full py-3 rounded-xl bg-gradient-to-r from-purple-600 to-purple-500
                                           text-white font-black text-sm tracking-wide
                                           hover:from-purple-700 hover:to-purple-600 transition shadow-glow">
                                ➕ Soruyu Bankaya Kaydet
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Sınav Oluşturma / Aktif Sınavlar --}}
                <div class="flex flex-col gap-5">

                    {{-- Sınav Paketi Oluştur --}}
                    <div class="bg-white rounded-2xl shadow-card border border-purple-100 overflow-hidden flex-shrink-0">
                        <div class="flex items-center gap-3 px-6 py-4 border-b border-purple-50 bg-purple-50/60">
                            <span class="text-xl">🧩</span>
                            <h3 class="font-baloo font-bold text-purple-900">Sınav Paketi Oluştur</h3>
                        </div>
                        <div class="p-6">
                            <form action="{{ route('ogretmen.sinav.olustur') }}" method="POST" class="space-y-3">
                                @csrf
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-black text-purple-700 uppercase tracking-wide mb-1.5">Sınav Adı</label>
                                        <input type="text" name="sinav_adi" placeholder="Örn: Matematik Deneme 1"
                                               class="w-full px-3 py-2.5 rounded-xl border border-purple-200 bg-purple-50/40
                                                      text-sm font-semibold placeholder-purple-300
                                                      focus:outline-none focus:border-purple-500 focus:bg-white transition"/>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-black text-purple-700 uppercase tracking-wide mb-1.5">Ders</label>
                                        <select name="sinav_ders_id"
                                            class="w-full px-3 py-2.5 rounded-xl border border-purple-200 bg-purple-50/40
                                                   text-sm font-bold focus:outline-none focus:border-purple-500 transition">
                                            @foreach($dersler ?? [] as $ders)
                                                <option value="{{ $ders->id }}">{{ $ders->ad }}</option>
                                            @endforeach
                                            @if(empty($dersler))
                                                <option>Matematik</option>
                                                <option>Fen Bilimleri</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-black text-purple-700 uppercase tracking-wide mb-1.5">Soru Sayısı</label>
                                        <input type="number" name="soru_sayisi" min="1" max="100" value="20"
                                               class="w-full px-3 py-2.5 rounded-xl border border-purple-200 bg-purple-50/40
                                                      text-sm font-semibold focus:outline-none focus:border-purple-500 focus:bg-white transition"/>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-black text-purple-700 uppercase tracking-wide mb-1.5">Süre (dk)</label>
                                        <input type="number" name="sure" min="5" max="180" value="40"
                                               class="w-full px-3 py-2.5 rounded-xl border border-purple-200 bg-purple-50/40
                                                      text-sm font-semibold focus:outline-none focus:border-purple-500 focus:bg-white transition"/>
                                    </div>
                                </div>
                                <button type="submit"
                                        class="w-full py-3 rounded-xl bg-gradient-to-r from-gold-500 to-orange-400
                                               text-white font-black text-sm tracking-wide transition shadow-gold hover:from-gold-600">
                                    🚀 Sınav Oluştur & Kod Üret
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Aktif Sınavlar --}}
                    <div class="bg-white rounded-2xl shadow-card border border-purple-100 overflow-hidden flex-1">
                        <div class="flex items-center justify-between px-6 py-4 border-b border-purple-50 bg-purple-50/60">
                            <div class="flex items-center gap-2">
                                <span class="text-xl">🔴</span>
                                <h3 class="font-baloo font-bold text-purple-900">Aktif Sınavlar</h3>
                            </div>
                            <a href="{{ route('ogretmen.sinavlarim') }}"
                               class="text-xs font-bold text-purple-500 hover:text-purple-700 transition">
                                Tümü →
                            </a>
                        </div>
                        <div class="divide-y divide-purple-50">
                            @forelse($aktifSinavlar ?? [] as $sinav)
                            <div class="flex items-center gap-3 px-6 py-3.5">
                                <div class="w-9 h-9 rounded-xl bg-purple-100 flex items-center justify-center text-sm flex-shrink-0">📋</div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-bold text-sm text-purple-900 truncate">{{ $sinav->ad }}</p>
                                    <p class="text-purple-400 text-xs font-semibold">{{ $sinav->katilimci_sayisi ?? 0 }} öğrenci katıldı</p>
                                </div>
                                <span class="font-black text-xs bg-purple-100 text-purple-700 px-2.5 py-1 rounded-lg tracking-wider">
                                    {{ $sinav->kod }}
                                </span>
                            </div>
                            @empty
                            {{-- Demo veriler --}}
                            @foreach([['Matematik Deneme 1','QZ-2841',24],['Fen 6. Sınıf','QZ-5519',18],['Türkçe Genel','QZ-3302',31]] as $demo)
                            <div class="flex items-center gap-3 px-6 py-3.5">
                                <div class="w-9 h-9 rounded-xl bg-purple-100 flex items-center justify-center text-sm flex-shrink-0">📋</div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-bold text-sm text-purple-900">{{ $demo[0] }}</p>
                                    <p class="text-purple-400 text-xs font-semibold">{{ $demo[2] }} öğrenci katıldı</p>
                                </div>
                                <span class="font-black text-xs bg-purple-100 text-purple-700 px-2.5 py-1 rounded-lg tracking-wider">
                                    {{ $demo[1] }}
                                </span>
                            </div>
                            @endforeach
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            {{-- ════ 3. SORU BANKASI ÖNİZLEME ════ --}}
            <div class="bg-white rounded-2xl shadow-card border border-purple-100 overflow-hidden">
                <div class="flex items-center justify-between px-6 py-4 border-b border-purple-50 bg-purple-50/60 flex-wrap gap-3">
                    <div class="flex items-center gap-2">
                        <span class="text-xl">🧠</span>
                        <h3 class="font-baloo font-bold text-purple-900">Soru Bankası</h3>
                        <span class="ml-2 bg-purple-100 text-purple-600 text-xs font-black px-2.5 py-0.5 rounded-full">
                            {{ $toplamSoru ?? 148 }} soru
                        </span>
                    </div>
                    <div class="flex items-center gap-2">
                        {{-- Ders filtre butonları --}}
                        <div class="flex gap-1.5 flex-wrap">
                            @foreach(['Tümü','Matematik','Fen','Türkçe','İngilizce'] as $filtre)
                            <button onclick="filterDers('{{ $filtre }}')"
                                    class="tab-btn text-xs font-bold px-3 py-1.5 rounded-lg border border-purple-100
                                           text-purple-500 hover:bg-purple-50 transition {{ $filtre==='Tümü' ? 'active' : '' }}">
                                {{ $filtre }}
                            </button>
                            @endforeach
                        </div>
                        <a href="{{ route('ogretmen.soru-bankasi') }}"
                           class="text-xs font-bold text-purple-500 hover:text-purple-700 transition ml-2">
                            Tüm Banka →
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="bg-purple-50/80">
                                <th class="text-left px-6 py-3 text-xs font-black text-purple-500 uppercase tracking-wide w-8">#</th>
                                <th class="text-left px-4 py-3 text-xs font-black text-purple-500 uppercase tracking-wide">Soru Metni</th>
                                <th class="text-left px-4 py-3 text-xs font-black text-purple-500 uppercase tracking-wide">Ders</th>
                                <th class="text-left px-4 py-3 text-xs font-black text-purple-500 uppercase tracking-wide">Zorluk</th>
                                <th class="text-left px-4 py-3 text-xs font-black text-purple-500 uppercase tracking-wide">Doğru Cvp.</th>
                                <th class="text-right px-6 py-3 text-xs font-black text-purple-500 uppercase tracking-wide">İşlemler</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-purple-50">
                        @forelse($sorular ?? [] as $i => $soru)
                            <tr class="hover:bg-purple-50/50 transition fade-in" style="animation-delay:{{ $i*0.04 }}s">
                                <td class="px-6 py-3.5 text-purple-300 font-bold text-xs">{{ $i + 1 }}</td>
                                <td class="px-4 py-3.5">
                                    <p class="font-semibold text-purple-900 line-clamp-2 max-w-xs">{{ $soru->soru_metni }}</p>
                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="bg-purple-100 text-purple-700 text-xs font-black px-2.5 py-1 rounded-lg">{{ $soru->ders->ad ?? '-' }}</span>
                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="text-xs font-black px-2.5 py-1 rounded-lg
                                        {{ $soru->zorluk==='Kolay' ? 'bg-green-100 text-green-700' :
                                           ($soru->zorluk==='Zor'   ? 'bg-red-100 text-red-700'   : 'bg-gold-500/15 text-gold-600') }}">
                                        {{ $soru->zorluk }}
                                    </span>
                                </td>
                                <td class="px-4 py-3.5">
                                    <span class="w-7 h-7 inline-flex items-center justify-center rounded-lg bg-gold-500/20 text-gold-600 font-black text-xs">
                                        {{ $soru->dogru_cevap }}
                                    </span>
                                </td>
                                <td class="px-6 py-3.5 text-right">
                                    <div class="flex items-center justify-end gap-1.5">
                                        <a href="{{ route('ogretmen.soru.duzenle', $soru->id) }}"
                                           class="w-7 h-7 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center hover:bg-purple-200 transition text-xs" title="Düzenle">✏️</a>
                                        <form action="{{ route('ogretmen.soru.sil', $soru->id) }}" method="POST"
                                              onsubmit="return confirm('Bu soruyu silmek istediğinize emin misiniz?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                    class="w-7 h-7 rounded-lg bg-red-50 text-red-400 flex items-center justify-center hover:bg-red-100 transition text-xs" title="Sil">🗑️</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                        {{-- Demo satırlar --}}
                        @php
                            $demoSorular = [
                                ['Bir üçgenin iç açıları toplamı kaç derecedir?','Matematik','Kolay','A'],
                                ['Fotosentez hangi organelde gerçekleşir?','Fen Bilimleri','Orta','C'],
                                ['Türkiye Cumhuriyeti hangi yılda kuruldu?','Sosyal Bilgiler','Kolay','B'],
                                ['x² - 5x + 6 = 0 denkleminin kökleri nedir?','Matematik','Zor','D'],
                                ['Su molekülünün kimyasal formülü nedir?','Fen Bilimleri','Kolay','A'],
                            ];
                        @endphp
                        @foreach($demoSorular as $i => $demo)
                        <tr class="hover:bg-purple-50/50 transition fade-in" style="animation-delay:{{ $i*0.06 }}s">
                            <td class="px-6 py-3.5 text-purple-300 font-bold text-xs">{{ $i+1 }}</td>
                            <td class="px-4 py-3.5 font-semibold text-purple-900 max-w-xs">{{ $demo[0] }}</td>
                            <td class="px-4 py-3.5">
                                <span class="bg-purple-100 text-purple-700 text-xs font-black px-2.5 py-1 rounded-lg">{{ $demo[1] }}</span>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="text-xs font-black px-2.5 py-1 rounded-lg
                                    {{ $demo[2]==='Kolay' ? 'bg-green-100 text-green-700' :
                                       ($demo[2]==='Zor'   ? 'bg-red-100 text-red-700'   : 'bg-gold-500/15 text-gold-600') }}">
                                    {{ $demo[2] }}
                                </span>
                            </td>
                            <td class="px-4 py-3.5">
                                <span class="w-7 h-7 inline-flex items-center justify-center rounded-lg bg-gold-500/20 text-gold-600 font-black text-xs">{{ $demo[3] }}</span>
                            </td>
                            <td class="px-6 py-3.5 text-right">
                                <div class="flex items-center justify-end gap-1.5">
                                    <button class="w-7 h-7 rounded-lg bg-purple-100 text-purple-600 flex items-center justify-center hover:bg-purple-200 transition text-xs">✏️</button>
                                    <button class="w-7 h-7 rounded-lg bg-red-50 text-red-400 flex items-center justify-center hover:bg-red-100 transition text-xs">🗑️</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- ════ 4. ÖĞRENCİ BAŞARI TAKİBİ + ROZET/İSTATİSTİKLER ════ --}}
            <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">

                {{-- Sınıf Listesi Tablosu --}}
                <div class="xl:col-span-2 bg-white rounded-2xl shadow-card border border-purple-100 overflow-hidden">
                    <div class="flex items-center justify-between px-6 py-4 border-b border-purple-50 bg-purple-50/60">
                        <div class="flex items-center gap-2">
                            <span class="text-xl">👥</span>
                            <h3 class="font-baloo font-bold text-purple-900">Öğrenci Başarı Tablosu</h3>
                        </div>
                        <div class="flex gap-1.5">
                            @foreach(['Tümü','7-A','7-B','8-A'] as $sinif)
                            <button class="tab-btn text-xs font-bold px-3 py-1.5 rounded-lg border border-purple-100
                                           text-purple-500 hover:bg-purple-50 transition {{ $sinif==='Tümü'?'active':'' }}">
                                {{ $sinif }}
                            </button>
                            @endforeach
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="bg-purple-50/80">
                                    <th class="text-left px-5 py-3 text-xs font-black text-purple-500 uppercase tracking-wide">Sıra</th>
                                    <th class="text-left px-4 py-3 text-xs font-black text-purple-500 uppercase tracking-wide">Öğrenci</th>
                                    <th class="text-left px-4 py-3 text-xs font-black text-purple-500 uppercase tracking-wide">Sınıf</th>
                                    <th class="text-left px-4 py-3 text-xs font-black text-purple-500 uppercase tracking-wide">Toplam Puan</th>
                                    <th class="text-left px-4 py-3 text-xs font-black text-purple-500 uppercase tracking-wide">Başarı %</th>
                                    <th class="text-left px-4 py-3 text-xs font-black text-purple-500 uppercase tracking-wide">Son Rozet</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-purple-50">
                            @forelse($ogrenciler ?? [] as $i => $ogr)
                                <tr class="hover:bg-purple-50/40 transition">
                                    <td class="px-5 py-3.5">
                                        <span class="w-7 h-7 inline-flex items-center justify-center rounded-lg font-black text-xs
                                            {{ $i===0 ? 'bg-gold-500 text-white' : ($i===1 ? 'bg-purple-200 text-purple-700' : ($i===2 ? 'bg-orange-100 text-orange-700' : 'bg-purple-50 text-purple-400')) }}">
                                            {{ $i+1 }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3.5">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-purple-500 to-purple-400 flex items-center justify-center text-white font-black text-xs flex-shrink-0">
                                                {{ mb_substr($ogr->ad, 0, 1) }}
                                            </div>
                                            <div>
                                                <p class="font-bold text-purple-900">{{ $ogr->ad_soyad }}</p>
                                                <p class="text-purple-400 text-xs">{{ $ogr->ogrenci_no }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3.5">
                                        <span class="bg-purple-100 text-purple-700 text-xs font-black px-2 py-0.5 rounded-lg">{{ $ogr->sinif }}</span>
                                    </td>
                                    <td class="px-4 py-3.5 font-black text-purple-900">{{ number_format($ogr->toplam_puan) }}</td>
                                    <td class="px-4 py-3.5">
                                        <div class="flex items-center gap-2">
                                            <div class="flex-1 bg-purple-100 rounded-full h-1.5 w-20">
                                                <div class="h-1.5 rounded-full bg-gradient-to-r from-purple-600 to-purple-400"
                                                     style="width:{{ $ogr->basari_yuzdesi ?? 0 }}%"></div>
                                            </div>
                                            <span class="text-xs font-bold text-purple-700">%{{ $ogr->basari_yuzdesi ?? 0 }}</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3.5">
                                        <span class="text-lg" title="{{ $ogr->son_rozet_adi ?? 'Rozet yok' }}">{{ $ogr->son_rozet_emoji ?? '—' }}</span>
                                    </td>
                                </tr>
                            @empty
                            {{-- Demo öğrenciler --}}
                            @php
                                $demoOgr = [
                                    ['Ahmet Yılmaz','8-A',3840,92,'🏆'],
                                    ['Zeynep Kaya','7-A',3610,88,'⭐'],
                                    ['Mehmet Demir','8-A',3540,85,'🎯'],
                                    ['Elif Şahin','7-B',3320,81,'🔥'],
                                    ['Ali Çelik','8-A',3200,78,'💡'],
                                    ['Selin Arslan','6-B',3050,74,'📚'],
                                ];
                            @endphp
                            @foreach($demoOgr as $i => $ogr)
                            <tr class="hover:bg-purple-50/40 transition fade-in" style="animation-delay:{{ $i*0.06 }}s">
                                <td class="px-5 py-3.5">
                                    <span class="w-7 h-7 inline-flex items-center justify-center rounded-lg font-black text-xs
                                        {{ $i===0?'bg-gold-500 text-white':($i===1?'bg-slate-200 text-slate-600':($i===2?'bg-orange-100 text-orange-600':'bg-purple-50 text-purple-400')) }}">
                                        {{ $i+1 }}
                                    </span>
                                </td>
                                <td class="px-4 py-3.5">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-purple-500 to-purple-400 flex items-center justify-center text-white font-black text-xs flex-shrink-0">
                                            {{ mb_substr($ogr[0],0,1) }}
                                        </div>
                                        <p class="font-bold text-purple-900 text-sm">{{ $ogr[0] }}</p>
                                    </div>
                                </td>
                                <td class="px-4 py-3.5"><span class="bg-purple-100 text-purple-700 text-xs font-black px-2 py-0.5 rounded-lg">{{ $ogr[1] }}</span></td>
                                <td class="px-4 py-3.5 font-black text-purple-900">{{ number_format($ogr[2]) }}</td>
                                <td class="px-4 py-3.5">
                                    <div class="flex items-center gap-2">
                                        <div class="flex-1 bg-purple-100 rounded-full h-1.5 w-20">
                                            <div class="h-1.5 rounded-full bg-gradient-to-r from-purple-600 to-purple-400" style="width:{{ $ogr[3] }}%"></div>
                                        </div>
                                        <span class="text-xs font-bold text-purple-700">%{{ $ogr[3] }}</span>
                                    </div>
                                </td>
                                <td class="px-4 py-3.5 text-lg">{{ $ogr[4] }}</td>
                            </tr>
                            @endforeach
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Sağ: İstatistik Kartları + Yaklaşan Sınavlar --}}
                <div class="flex flex-col gap-4">

                    {{-- En Başarılı Sınıf --}}
                    <div class="bg-gradient-to-br from-purple-600 to-purple-500 text-white rounded-2xl p-5 shadow-glow">
                        <p class="text-white/65 text-xs font-bold uppercase tracking-wider mb-1">🥇 En Başarılı Sınıf</p>
                        <p class="font-baloo text-3xl font-extrabold">{{ $enBasariliSinif ?? '7-A' }}</p>
                        <p class="text-white/70 text-sm mt-1">Ort. <span class="text-gold-400 font-black">%{{ $enBasariliSinifOrt ?? 91 }}</span> başarı oranı</p>
                        <div class="mt-3 bg-white/10 rounded-xl h-2">
                            <div class="h-2 rounded-xl bg-gold-400" style="width:{{ $enBasariliSinifOrt ?? 91 }}%"></div>
                        </div>
                    </div>

                    {{-- Aktif Öğrenci --}}
                    <div class="bg-white rounded-2xl p-5 shadow-card border border-purple-100">
                        <div class="flex items-center justify-between mb-3">
                            <p class="font-bold text-sm text-purple-700">🔥 Bu Hafta Aktif</p>
                            <span class="text-xs font-black text-purple-400">7 gün</span>
                        </div>
                        <p class="font-baloo text-3xl font-extrabold text-purple-900">{{ $buHaftaAktif ?? 62 }}</p>
                        <p class="text-purple-400 text-xs font-semibold mt-1">öğrenci çalıştı</p>
                        <div class="flex gap-1 mt-3">
                            @foreach([40,65,45,80,70,55,90] as $bar)
                            <div class="flex-1 bg-purple-100 rounded-sm" style="height:32px; display:flex; align-items:flex-end">
                                <div class="w-full rounded-sm bg-gradient-to-t from-purple-600 to-purple-400" style="height:{{ $bar }}%"></div>
                            </div>
                            @endforeach
                        </div>
                        <div class="flex justify-between mt-1">
                            @foreach(['P','S','Ç','P','C','C','P'] as $gun)
                            <span class="flex-1 text-center text-purple-300 text-xs font-bold">{{ $gun }}</span>
                            @endforeach
                        </div>
                    </div>

                    {{-- Yaklaşan Sınavlar --}}
                    <div class="bg-white rounded-2xl shadow-card border border-purple-100 overflow-hidden flex-1">
                        <div class="flex items-center justify-between px-5 py-3.5 border-b border-purple-50 bg-purple-50/60">
                            <div class="flex items-center gap-2">
                                <span>📅</span>
                                <h4 class="font-baloo font-bold text-sm text-purple-900">Yaklaşan Sınavlar</h4>
                            </div>
                            <a href="{{ route('ogretmen.takvim') }}" class="text-xs font-bold text-purple-400 hover:text-purple-600">Tümü →</a>
                        </div>
                        <div class="divide-y divide-purple-50">
                            @forelse($yaklasanSinavlar ?? [] as $sinav)
                            <div class="flex items-center gap-3 px-5 py-3">
                                <div class="w-8 h-8 rounded-xl bg-purple-100 flex items-center justify-center text-sm flex-shrink-0">📋</div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-bold text-xs text-purple-900 truncate">{{ $sinav->ad }}</p>
                                    <p class="text-purple-400 text-xs font-semibold">{{ \Carbon\Carbon::parse($sinav->tarih)->format('d M, H:i') }}</p>
                                </div>
                                <span class="text-purple-300 text-xs">→</span>
                            </div>
                            @empty
                            @foreach([['Matematik Deneme 2','24 May, 20:00'],['Fen 6. Sınıf','25 May, 19:30'],['Türkçe Tekrar','26 May, 18:00']] as $demo)
                            <div class="flex items-center gap-3 px-5 py-3">
                                <div class="w-8 h-8 rounded-xl bg-purple-100 flex items-center justify-center text-sm flex-shrink-0">📋</div>
                                <div class="flex-1 min-w-0">
                                    <p class="font-bold text-xs text-purple-900">{{ $demo[0] }}</p>
                                    <p class="text-purple-400 text-xs font-semibold">{{ $demo[1] }}</p>
                                </div>
                                <span class="text-purple-300 text-xs">→</span>
                            </div>
                            @endforeach
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>

        </main>

        {{-- ── FOOTER ── --}}
        <footer class="border-t border-purple-100 bg-white px-8 py-4 flex items-center justify-between text-xs text-purple-400">
            <span>Quizion © {{ date('Y') }} · <strong class="text-gold-600">Hitit Üniversitesi Projesi</strong></span>
            <div class="flex gap-4">
                <a href="#" class="hover:text-purple-600 transition font-semibold">Gizlilik</a>
                <a href="#" class="hover:text-purple-600 transition font-semibold">Destek</a>
                <a href="#" class="hover:text-purple-600 transition font-semibold">KVKK</a>
            </div>
        </footer>

    </div>{{-- /main content --}}
</div>{{-- /layout --}}

{{-- ════ JAVASCRIPT ════ --}}
<script>
    // Tab butonları
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const group = this.closest('.flex');
            group.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Ders filtresi (demo amaçlı)
    function filterDers(ders) {
        console.log('Filtre:', ders);
        // Gerçek uygulamada AJAX ile filtrelenecek
    }

    // Sayfa yüklendiğinde sidebar aktif menüyü belirle
    document.querySelectorAll('.sidebar-item').forEach(item => {
        if (item.getAttribute('href') === window.location.pathname) {
            item.classList.add('active');
        }
    });

    // Mobil sidebar toggle
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('-translate-x-full');
    }

    // Yükleme animasyonları
    const observer = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.style.opacity = '1';
                e.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-in').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(10px)';
        observer.observe(el);
    });

    // Flash mesajları (Laravel session)
    @if(session('success'))
        showToast('✅ {{ session("success") }}', 'success');
    @endif
    @if(session('error'))
        showToast('❌ {{ session("error") }}', 'error');
    @endif

    function showToast(msg, type) {
        const toast = document.createElement('div');
        toast.className = `fixed bottom-6 right-6 z-50 px-5 py-3 rounded-2xl text-white font-bold text-sm shadow-lg
            ${type === 'success' ? 'bg-green-500' : 'bg-red-500'}`;
        toast.style.cssText = 'animation: fadeInUp .3s ease; max-width:320px';
        toast.textContent = msg;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 4000);
    }
</script>

</body>
</html>
