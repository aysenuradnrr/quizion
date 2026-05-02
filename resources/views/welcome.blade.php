<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! tailwindcss v4.0.7 | MIT License | https://tailwindcss.com */ @layer properties{@supports (((-webkit-hyphens:none)) and (not (margin-trim:inline))) or ((-moz-orient:inline) and (not (color:rgb(from red r g b)))){*,:before,:after,::backdrop{--tw-translate-x:0;--tw-translate-y:0;--tw-translate-z:0;--tw-rotate-x:initial;--tw-rotate-y:initial;--tw-rotate-z:initial;--tw-skew-x:initial;--tw-skew-y:initial;--tw-space-x-reverse:0;--tw-border-style:solid;--tw-leading:initial;--tw-font-weight:initial;--tw-tracking:initial;--tw-shadow:0 0 #0000;--tw-shadow-color:initial;--tw-shadow-alpha:100%;--tw-inset-shadow:0 0 #0000;--tw-inset-shadow-color:initial;--tw-inset-shadow-alpha:100%;--tw-ring-color:initial;--tw-ring-shadow:0 0 #0000;--tw-inset-ring-color:initial;--tw-inset-ring-shadow:0 0 #0000;--tw-ring-inset:initial;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-offset-shadow:0 0 #0000;--tw-blur:initial;--tw-brightness:initial;--tw-contrast:initial;--tw-grayscale:initial;--tw-hue-rotate:initial;--tw-invert:initial;--tw-opacity:initial;--tw-saturate:initial;--tw-sepia:initial;--tw-drop-shadow:initial;--tw-drop-shadow-color:initial;--tw-drop-shadow-alpha:100%;--tw-drop-shadow-size:initial;--tw-duration:initial;--tw-ease:initial;--tw-content:""}}}@layer theme{:root,:host{--font-sans:"Instrument Sans", ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";--font-serif:ui-serif, Georgia, Cambria, "Times New Roman", Times, serif;--font-mono:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;--color-red-50:oklch(97.1% .013 17.38);--color-red-100:oklch(93.6% .032 17.717);--color-red-200:oklch(88.5% .062 18.334);--color-red-300:oklch(80.8% .114 19.571);--color-red-400:oklch(70.4% .191 22.216);--color-red-500:oklch(63.7% .237 25.331);--color-red-600:oklch(57.7% .245 27.325);--color-red-700:oklch(50.5% .213 27.518);--color-red-800:oklch(44.4% .177 26.899);--color-red-900:oklch(39.6% .141 25.723);--color-red-950:oklch(25.8% .092 26.042);--color-orange-50:oklch(98% .016 73.684);--color-orange-100:oklch(95.4% .038 75.164);--color-orange-200:oklch(90.1% .076 70.697);--color-orange-300:oklch(83.7% .128 66.29);--color-orange-400:oklch(75% .183 55.934);--color-orange-500:oklch(70.5% .213 47.604);--color-orange-600:oklch(64.6% .222 41.116);--color-orange-700:oklch(55.3% .195 38.402);--color-orange-800:oklch(47% .157 37.304);--color-orange-900:oklch(40.8% .123 38.172);--color-orange-950:oklch(26.6% .079 36.259);--color-amber-50:oklch(98.7% .022 95.277);--color-amber-100:oklch(96.2% .059 95.617);--color-amber-200:oklch(92.4% .12 95.746);--color-amber-300:oklch(87.9% .169 91.605);--color-amber-400:oklch(82.8% .189 84.429);--color-amber-500:oklch(76.9% .188 70.08);--color-amber-600:oklch(66.6% .179 58.318);--color-amber-700:oklch(55.5% .163 48.998);--color-amber-800:oklch(47.3% .137 46.201);--color-amber-900:oklch(41.4% .112 45.904);--color-amber-950:oklch(27.9% .077 45.635);--color-yellow-50:oklch(98.7% .026 102.212);--color-yellow-100:oklch(97.3% .071 103.193);--color-yellow-200:oklch(94.5% .129 101.54);--color-yellow-300:oklch(90.5% .182 98.111);--color-yellow-400:oklch(85.2% .199 91.936);--color-yellow-500:oklch(79.5% .184 86.047);--color-yellow-600:oklch(68.1% .162 75.834);--color-yellow-700:oklch(55.4% .135 66.442);--color-yellow-800:oklch(47.6% .114 61.907);--color-yellow-900:oklch(42.1% .095 57.708);--color-yellow-950:oklch(28.6% .066 53.813);--color-lime-50:oklch(98.6% .031 120.757);--color-lime-100:oklch(96.7% .067 122.328);--color-lime-200:oklch(93.8% .127 124.321);--color-lime-300:oklch(89.7% .196 126.665);--color-lime-400:oklch(84.1% .238 128.85);--color-lime-500:oklch(76.8% .233 130.85);--color-lime-600:oklch(64.8% .2 131.684);--color-lime-700:oklch(53.2% .157 131.589);--color-lime-800:oklch(45.3% .124 130.933);--color-lime-900:oklch(40.5% .101 131.063);--color-lime-950:oklch(27.4% .072 132.109);--color-green-50:oklch(98.2% .018 155.826);--color-green-100:oklch(96.2% .044 156.743);--color-green-200:oklch(92.5% .084 155.995);--color-green-300:oklch(87.1% .15 154.449);--color-green-400:oklch(79.2% .209 151.711);--color-green-500:oklch(72.3% .219 149.579);--color-green-600:oklch(62.7% .194 149.214);--color-green-700:oklch(52.7% .154 150.069);--color-green-800:oklch(44.8% .119 151.328);--color-green-900:oklch(39.3% .095 152.535);--color-green-950:oklch(26.6% .065 152.934);--color-emerald-50:oklch(97.9% .021 166.113);--color-emerald-100:oklch(95% .052 163.051);--color-emerald-200:oklch(90.5% .093 164.15);--color-emerald-300:oklch(84.5% .143 164.978);--color-emerald-400:oklch(76.5% .177 163.223);--color-emerald-500:oklch(69.6% .17 162.48);--color-emerald-600:oklch(59.6% .145 163.225);--color-emerald-700:oklch(50.8% .118 165.612);--color-emerald-800:oklch(43.2% .095 166.913);--color-emerald-900:oklch(37.8% .077 168.94);--color-emerald-950:oklch(26.2% .051 172.552);--color-teal-50:oklch(98.4% .014 180.72);--color-teal-100:oklch(95.3% .051 180.801);--color-teal-200:oklch(91% .096 180.426);--color-teal-300:oklch(85.5% .138 181.071);--color-teal-400:oklch(77.7% .152 181.912);--color-teal-500:oklch(70.4% .14 182.503);--color-teal-600:oklch(60% .118 184.704);--color-teal-700:oklch(51.1% .096 186.391);--color-teal-800:oklch(43.7% .078 188.216);--color-teal-900:oklch(38.6% .063 188.416);--color-teal-950:oklch(27.7% .046 192.524);--color-cyan-50:oklch(98.4% .019 200.873);--color-cyan-100:oklch(95.6% .045 203.388);--color-cyan-200:oklch(91.7% .08 205.041);--color-cyan-300:oklch(86.5% .127 207.078);--color-cyan-400:oklch(78.9% .154 211.53);--color-cyan-500:oklch(71.5% .143 215.221);--color-cyan-600:oklch(60.9% .126 221.723);--color-cyan-700:oklch(52% .105 223.128);--color-cyan-800:oklch(45% .085 224.283);--color-cyan-900:oklch(39.8% .07 227.392);--color-cyan-950:oklch(30.2% .056 229.695);--color-sky-50:oklch(97.7% .013 236.62);--color-sky-100:oklch(95.1% .026 236.824);--color-sky-200:oklch(90.1% .058 230.902);--color-sky-300:oklch(82.8% .111 230.318);--color-sky-400:oklch(74.6% .16 232.661);--color-sky-500:oklch(68.5% .169 237.323);--color-sky-600:oklch(58.8% .158 241.966);--color-sky-700:oklch(50% .134 242.749);--color-sky-800:oklch(44.3% .11 240.79);--color-sky-900:oklch(39.1% .09 240.876);--color-sky-950:oklch(29.3% .066 243.157);--color-blue-50:oklch(97% .014 254.604);--color-blue-100:oklch(93.2% .032 255.585);--color-blue-200:oklch(88.2% .059 254.128);--color-blue-300:oklch(80.9% .105 251.813);--color-blue-400:oklch(70.7% .165 254.624);--color-blue-500:oklch(62.3% .214 259.815);--color-blue-600:oklch(54.6% .245 262.881);--color-blue-700:oklch(48.8% .243 264.376);--color-blue-800:oklch(42.4% .199 265.638);--color-blue-900:oklch(37.9% .146 265.522);--color-blue-950:oklch(28.2% .091 267.935);--color-indigo-50:oklch(96.2% .018 272.314);--color-indigo-100:oklch(93% .034 272.788);--color-indigo-200:oklch(87% .065 274.039);--color-indigo-300:oklch(78.5% .115 274.713);--color-indigo-400:oklch(67.3% .182 276.935);--color-indigo-500:oklch(58.5% .233 277.117);--color-indigo-600:oklch(51.1% .262 276.966);--color-indigo-700:oklch(45.7% .24 277.023);--color-indigo-800:oklch(39.8% .195 277.366);--color-indigo-900:oklch(35.9% .144 278.697);--color-indigo-950:oklch(25.7% .09 281.288);--color-violet-50:oklch(96.9% .016 293.756);--color-violet-100:oklch(94.3% .029 294.588);--color-violet-200:oklch(89.4% .057 293.283);--color-violet-300:oklch(81.1% .111 293.571);--color-violet-400:oklch(70.2% .183 293.541);--color-violet-500:oklch(60.6% .25 292.717);--color-violet-600:oklch(54.1% .281 293.009);--color-violet-700:oklch(49.1% .27 292.581);--color-violet-800:oklch(43.2% .232 292.759);--color-violet-900:oklch(38% .189 293.745);--color-violet-950:oklch(28.3% .141 291.089);--color-purple-50:oklch(97.7% .014 308.299);--color-purple-100:oklch(94.6% .033 307.174);--color-purple-200:oklch(90.2% .063 306.703);--color-purple-300:oklch(82.7% .119 306.383);--color-purple-400:oklch(71.4% .203 305.504);--color-purple-500:oklch(62.7% .265 303.9);--color-purple-600:oklch(55.8% .288 302.321);--color-purple-700:oklch(49.6% .265 301.924);--color-purple-800:oklch(43.8% .218 303.724);--color-purple-900:oklch(38.1% .176 304.987);--color-purple-950:oklch(29.1% .149 302.717);--color-fuchsia-50:oklch(97.7% .017 320.058);--color-fuchsia-100:oklch(95.2% .037 318.852);--color-fuchsia-200:oklch(90.3% .076 319.62);--color-fuchsia-300:oklch(83.3% .145 321.434);--color-fuchsia-400:oklch(74% .238 322.16);--color-fuchsia-500:oklch(66.7% .295 322.15);--color-fuchsia-600:oklch(59.1% .293 322.896);--color-fuchsia-700:oklch(51.8% .253 323.949);--color-fuchsia-800:oklch(45.2% .211 324.591);--color-fuchsia-900:oklch(40.1% .17 325.612);--color-fuchsia-950:oklch(29.3% .136 325.661);--color-pink-50:oklch(97.1% .014 343.198);--color-pink-100:oklch(94.8% .028 342.258);--color-pink-200:oklch(89.9% .061 343.231);--color-pink-300:oklch(82.3% .12 346.018);--color-pink-400:oklch(71.8% .202 349.761);--color-pink-500:oklch(65.6% .241 354.308);--color-pink-600:oklch(59.2% .249 .584);--color-pink-700:oklch(52.5% .223 3.958);--color-pink-800:oklch(45.9% .187 3.815);--color-pink-900:oklch(40.8% .153 2.432);--color-pink-950:oklch(28.4% .109 3.907);--color-rose-50:oklch(96.9% .015 12.422);--color-rose-100:oklch(94.1% .03 12.58);--color-rose-200:oklch(89.2% .058 10.001);--color-rose-300:oklch(81% .117 11.638);--color-rose-400:oklch(71.2% .194 13.428);--color-rose-500:oklch(64.5% .246 16.439);--color-rose-600:oklch(58.6% .253 17.585);--color-rose-700:oklch(51.4% .222 16.935);--color-rose-800:oklch(45.5% .188 13.697);--color-rose-900:oklch(41% .159 10.272);--color-rose-950:oklch(27.1% .105 12.094);--color-slate-50:oklch(98.4% .003 247.858);--color-slate-100:oklch(96.8% .007 247.896);--color-slate-200:oklch(92.9% .013 255.508);--color-slate-300:oklch(86.9% .022 252.894);--color-slate-400:oklch(70.4% .04 256.788);--color-slate-500:oklch(55.4% .046 257.417);--color-slate-600:oklch(44.6% .043 257.281);--color-slate-700:oklch(37.2% .044 257.287);--color-slate-800:oklch(27.9% .041 260.031);--color-slate-900:oklch(20.8% .042 265.755);--color-slate-950:oklch(12.9% .042 264.695);--color-gray-50:oklch(98.5% .002 247.839);--color-gray-100:oklch(96.7% .003 264.542);--color-gray-200:oklch(92.8% .006 264.531);--color-gray-300:oklch(87.2% .01 258.338);--color-gray-400:oklch(70.7% .022 261.325);--color-gray-500:oklch(55.1% .027 264.364);--color-gray-600:oklch(44.6% .03 256.802);--color-gray-700:oklch(37.3% .034 259.733);--color-gray-800:oklch(27.8% .033 256.848);--color-gray-900:oklch(21% .034 264.665);--color-gray-950:oklch(13% .028 261.692);--color-zinc-50:oklch(98.5% 0 0);--color-zinc-100:oklch(96.7% .001 286.375);--color-zinc-200:oklch(92% .004 286.32);--color-zinc-300:oklch(87.1% .006 286.286);--color-zinc-400:oklch(70.5% .015 286.067);--color-zinc-500:oklch(55.2% .016 285.938);--color-zinc-600:oklch(44.2% .017 285.786);--color-zinc-700:oklch(37% .013 285.805);--color-zinc-800:oklch(27.4% .006 286.033);--color-zinc-900:oklch(21% .006 285.885);--color-zinc-950:oklch(14.1% .005 285.823);--color-neutral-50:oklch(98.5% 0 0);--color-neutral-100:oklch(97% 0 0);--color-neutral-200:oklch(92.2% 0 0);--color-neutral-300:oklch(87% 0 0);--color-neutral-400:oklch(70.8% 0 0);--color-neutral-500:oklch(55.6% 0 0);--color-neutral-600:oklch(43.9% 0 0);--color-neutral-700:oklch(37.1% 0 0);--color-neutral-800:oklch(26.9% 0 0);--color-neutral-900:oklch(20.5% 0 0);--color-neutral-950:oklch(14.5% 0 0);--color-stone-50:oklch(98.5% .001 106.423);--color-stone-100:oklch(97% .001 106.424);--color-stone-200:oklch(92.3% .003 48.717);--color-stone-300:oklch(86.9% .005 56.366);--color-stone-400:oklch(70.9% .01 56.259);--color-stone-500:oklch(55.3% .013 58.071);--color-stone-600:oklch(44.4% .011 73.639);--color-stone-700:oklch(37.4% .01 67.558);--color-stone-800:oklch(26.8% .007 34.298);--color-stone-900:oklch(21.6% .006 56.043);--color-stone-950:oklch(14.7% .004 49.25);--color-black:#000;--color-white:#fff;--spacing:.25rem;--breakpoint-sm:40rem;--breakpoint-md:48rem;--breakpoint-lg:64rem;--breakpoint-xl:80rem;--breakpoint-2xl:96rem;--container-3xs:16rem;--container-2xs:18rem;--container-xs:20rem;--container-sm:24rem;--container-md:28rem;--container-lg:32rem;--container-xl:36rem;--container-2xl:42rem;--container-3xl:48rem;--container-4xl:56rem;--container-5xl:64rem;--container-6xl:72rem;--container-7xl:80rem;--text-xs:.75rem;--text-xs--line-height:calc(1 / .75);--text-sm:.875rem;--text-sm--line-height:calc(1.25 / .875);--text-base:1rem;--text-base--line-height: 1.5 ;--text-lg:1.125rem;--text-lg--line-height:calc(1.75 / 1.125);--text-xl:1.25rem;--text-xl--line-height:calc(1.75 / 1.25);--text-2xl:1.5rem;--text-2xl--line-height:calc(2 / 1.5);--text-3xl:1.875rem;--text-3xl--line-height: 1.2 ;--text-4xl:2.25rem;--text-4xl--line-height:calc(2.5 / 2.25);--text-5xl:3rem;--text-5xl--line-height:1;--text-6xl:3.75rem;--text-6xl--line-height:1;--text-7xl:4.5rem;--text-7xl--line-height:1;--text-8xl:6rem;--text-8xl--line-height:1;--text-9xl:8rem;--text-9xl--line-height:1;--font-weight-thin:100;--font-weight-extralight:200;--font-weight-light:300;--font-weight-normal:400;--font-weight-medium:500;--font-weight-semibold:600;--font-weight-bold:700;--font-weight-extrabold:800;--font-weight-black:900;--tracking-tighter:-.05em;--tracking-tight:-.025em;--tracking-normal:0em;--tracking-wide:.025em;--tracking-wider:.05em;--tracking-widest:.1em;--leading-tight:1.25;--leading-snug:1.375;--leading-normal:1.5;--leading-relaxed:1.625;--leading-loose:2;--radius-xs:.125rem;--radius-sm:.25rem;--radius-md:.375rem;--radius-lg:.5rem;--radius-xl:.75rem;--radius-2xl:1rem;--radius-3xl:1.5rem;--radius-4xl:2rem;--shadow-2xs:0 1px #0000000d;--shadow-xs:0 1px 2px 0 #0000000d;--shadow-sm:0 1px 3px 0 #0000001a, 0 1px 2px -1px #0000001a;--shadow-md:0 4px 6px -1px #0000001a, 0 2px 4px -2px #0000001a;--shadow-lg:0 10px 15px -3px #0000001a, 0 4px 6px -4px #0000001a;--shadow-xl:0 20px 25px -5px #0000001a, 0 8px 10px -6px #0000001a;--shadow-2xl:0 25px 50px -12px #00000040;--inset-shadow-2xs:inset 0 1px #0000000d;--inset-shadow-xs:inset 0 1px 1px #0000000d;--inset-shadow-sm:inset 0 2px 4px #0000000d;--drop-shadow-xs:0 1px 1px #0000000d;--drop-shadow-sm:0 1px 2px #00000026;--drop-shadow-md:0 3px 3px #0000001f;--drop-shadow-lg:0 4px 4px #00000026;--drop-shadow-xl:0 9px 7px #0000001a;--drop-shadow-2xl:0 25px 25px #00000026;--ease-in:cubic-bezier(.4, 0, 1, 1);--ease-out:cubic-bezier(0, 0, .2, 1);--ease-in-out:cubic-bezier(.4, 0, .2, 1);--animate-spin:spin 1s linear infinite;--animate-ping:ping 1s cubic-bezier(0, 0, .2, 1) infinite;--animate-pulse:pulse 2s cubic-bezier(.4, 0, .6, 1) infinite;--animate-bounce:bounce 1s infinite;--blur-xs:4px;--blur-sm:8px;--blur-md:12px;--blur-lg:16px;--blur-xl:24px;--blur-2xl:40px;--blur-3xl:64px;--perspective-dramatic:100px;--perspective-near:300px;--perspective-normal:500px;--perspective-midrange:800px;--perspective-distant:1200px;--aspect-video:16 / 9;--default-transition-duration:.15s;--default-transition-timing-function:cubic-bezier(.4, 0, .2, 1);--default-font-family:var(--font-sans);--default-mono-font-family:var(--font-mono)}}@layer base{*,:after,:before,::backdrop{box-sizing:border-box;border:0 solid;margin:0;padding:0}::file-selector-button{box-sizing:border-box;border:0 solid;margin:0;padding:0}html,:host{-webkit-text-size-adjust:100%;tab-size:4;line-height:1.5;font-family:var(--default-font-family,ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji");font-feature-settings:var(--default-font-feature-settings,normal);font-variation-settings:var(--default-font-variation-settings,normal);-webkit-tap-highlight-color:transparent}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;-webkit-text-decoration:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,samp,pre{font-family:var(--default-mono-font-family,ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace);font-feature-settings:var(--default-mono-font-feature-settings,normal);font-variation-settings:var(--default-mono-font-variation-settings,normal);font-size:1em}small{font-size:80%}sub,sup{vertical-align:baseline;font-size:75%;line-height:0;position:relative}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}:-moz-focusring{outline:auto}progress{vertical-align:baseline}summary{display:list-item}ol,ul,menu{list-style:none}img,svg,video,canvas,audio,iframe,embed,object{vertical-align:middle;display:block}img,video{max-width:100%;height:auto}button,input,select,optgroup,textarea{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}::file-selector-button{font:inherit;font-feature-settings:inherit;font-variation-settings:inherit;letter-spacing:inherit;color:inherit;opacity:1;background-color:#0000;border-radius:0}:where(select:is([multiple],[size])) optgroup{font-weight:bolder}:where(select:is([multiple],[size])) optgroup option{padding-inline-start:20px}::file-selector-button{margin-inline-end:4px}::placeholder{opacity:1}@supports (not ((-webkit-appearance:-apple-pay-button))) or (contain-intrinsic-size:1px){::placeholder{color:currentColor}@supports (color:color-mix(in lab,red,red)){::placeholder{color:color-mix(in oklab,currentcolor 50%,transparent)}}}textarea{resize:vertical}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-date-and-time-value{min-height:1lh;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-datetime-edit{padding-block:0}::-webkit-datetime-edit-year-field{padding-block:0}::-webkit-datetime-edit-month-field{padding-block:0}::-webkit-datetime-edit-day-field{padding-block:0}::-webkit-datetime-edit-hour-field{padding-block:0}::-webkit-datetime-edit-minute-field{padding-block:0}::-webkit-datetime-edit-second-field{padding-block:0}::-webkit-datetime-edit-millisecond-field{padding-block:0}::-webkit-datetime-edit-meridiem-field{padding-block:0}::-webkit-calendar-picker-indicator{line-height:1}:-moz-ui-invalid{box-shadow:none}button,input:where([type=button],[type=reset],[type=submit]){appearance:button}::file-selector-button{appearance:button}::-webkit-inner-spin-button{height:auto}::-webkit-outer-spin-button{height:auto}[hidden]:where(:not([hidden=until-found])){display:none!important}}@layer components;@layer utilities{.absolute{position:absolute}.fixed{position:fixed}.relative{position:relative}.static{position:static}.inset-0{inset:calc(var(--spacing) * 0)}.start{inset-inline-start:var(--spacing)}.top-0{top:calc(var(--spacing) * 0)}.right-0{right:calc(var(--spacing) * 0)}.container{width:100%}@media(min-width:40rem){.container{max-width:40rem}}@media(min-width:48rem){.container{max-width:48rem}}@media(min-width:64rem){.container{max-width:64rem}}@media(min-width:80rem){.container{max-width:80rem}}@media(min-width:96rem){.container{max-width:96rem}}.mx-auto{margin-inline:auto}.-mt-\[6\.6rem\]{margin-top:-6.6rem}.-mt-px{margin-top:-1px}.mt-2{margin-top:calc(var(--spacing) * 2)}.mt-4{margin-top:calc(var(--spacing) * 4)}.mt-6{margin-top:calc(var(--spacing) * 6)}.mt-8{margin-top:calc(var(--spacing) * 8)}.mr-2{margin-right:calc(var(--spacing) * 2)}.-mb-px{margin-bottom:-1px}.mb-1{margin-bottom:calc(var(--spacing) * 1)}.mb-2{margin-bottom:calc(var(--spacing) * 2)}.mb-4{margin-bottom:calc(var(--spacing) * 4)}.mb-6{margin-bottom:calc(var(--spacing) * 6)}.-ml-8{margin-left:calc(var(--spacing) * -8)}.-ml-px{margin-left:-1px}.ml-1{margin-left:calc(var(--spacing) * 1)}.ml-2{margin-left:calc(var(--spacing) * 2)}.ml-4{margin-left:calc(var(--spacing) * 4)}.ml-12{margin-left:calc(var(--spacing) * 12)}.contents{display:contents}.flex{display:flex}.grid{display:grid}.hidden{display:none}.inline-block{display:inline-block}.inline-flex{display:inline-flex}.table{display:table}.aspect-\[335\/364\]{aspect-ratio:335/364}.h-1{height:calc(var(--spacing) * 1)}.h-1\.5{height:calc(var(--spacing) * 1.5)}.h-2{height:calc(var(--spacing) * 2)}.h-2\.5{height:calc(var(--spacing) * 2.5)}.h-3{height:calc(var(--spacing) * 3)}.h-3\.5{height:calc(var(--spacing) * 3.5)}.h-5{height:calc(var(--spacing) * 5)}.h-8{height:calc(var(--spacing) * 8)}.h-14{height:calc(var(--spacing) * 14)}.h-14\.5{height:calc(var(--spacing) * 14.5)}.h-16{height:calc(var(--spacing) * 16)}.min-h-screen{min-height:100vh}.w-1{width:calc(var(--spacing) * 1)}.w-1\.5{width:calc(var(--spacing) * 1.5)}.w-2{width:calc(var(--spacing) * 2)}.w-2\.5{width:calc(var(--spacing) * 2.5)}.w-3{width:calc(var(--spacing) * 3)}.w-3\.5{width:calc(var(--spacing) * 3.5)}.w-5{width:calc(var(--spacing) * 5)}.w-8{width:calc(var(--spacing) * 8)}.w-\[438px\]{width:438px}.w-auto{width:auto}.w-full{width:100%}.max-w-6xl{max-width:var(--container-6xl)}.max-w-\[335px\]{max-width:335px}.max-w-none{max-width:none}.max-w-xl{max-width:var(--container-xl)}.flex-1{flex:1}.shrink-0{flex-shrink:0}.translate-y-0{--tw-translate-y:calc(var(--spacing) * 0);translate:var(--tw-translate-x) var(--tw-translate-y)}.transform{transform:var(--tw-rotate-x,) var(--tw-rotate-y,) var(--tw-rotate-z,) var(--tw-skew-x,) var(--tw-skew-y,)}.cursor-default{cursor:default}.cursor-not-allowed{cursor:not-allowed}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}.flex-col{flex-direction:column}.flex-col-reverse{flex-direction:column-reverse}.items-center{align-items:center}.justify-between{justify-content:space-between}.justify-center{justify-content:center}.justify-end{justify-content:flex-end}.justify-items-center{justify-items:center}.gap-2{gap:calc(var(--spacing) * 2)}.gap-3{gap:calc(var(--spacing) * 3)}.gap-4{gap:calc(var(--spacing) * 4)}:where(.space-x-1>:not(:last-child)){--tw-space-x-reverse:0;margin-inline-start:calc(calc(var(--spacing) * 1) * var(--tw-space-x-reverse));margin-inline-end:calc(calc(var(--spacing) * 1) * calc(1 - var(--tw-space-x-reverse)))}.overflow-hidden{overflow:hidden}.rounded-full{border-radius:3.40282e38px}.rounded-md{border-radius:var(--radius-md)}.rounded-sm{border-radius:var(--radius-sm)}.rounded-t-lg{border-top-left-radius:var(--radius-lg);border-top-right-radius:var(--radius-lg)}.rounded-l-md{border-top-left-radius:var(--radius-md);border-bottom-left-radius:var(--radius-md)}.rounded-r-md{border-top-right-radius:var(--radius-md);border-bottom-right-radius:var(--radius-md)}.rounded-br-lg{border-bottom-right-radius:var(--radius-lg)}.rounded-bl-lg{border-bottom-left-radius:var(--radius-lg)}.border{border-style:var(--tw-border-style);border-width:1px}.border-t{border-top-style:var(--tw-border-style);border-top-width:1px}.border-r{border-right-style:var(--tw-border-style);border-right-width:1px}.border-\[\#19140035\]{border-color:#19140035}.border-\[\#e3e3e0\]{border-color:#e3e3e0}.border-black{border-color:var(--color-black)}.border-gray-200{border-color:var(--color-gray-200)}.border-gray-300{border-color:var(--color-gray-300)}.border-gray-400{border-color:var(--color-gray-400)}.border-transparent{border-color:#0000}.bg-\[\#1b1b18\]{background-color:#1b1b18}.bg-\[\#FDFDFC\]{background-color:#fdfdfc}.bg-\[\#dbdbd7\]{background-color:#dbdbd7}.bg-\[\#fff2f2\]{background-color:#fff2f2}.bg-gray-100{background-color:var(--color-gray-100)}.bg-gray-200{background-color:var(--color-gray-200)}.bg-white{background-color:var(--color-white)}.p-6{padding:calc(var(--spacing) * 6)}.px-2{padding-inline:calc(var(--spacing) * 2)}.px-4{padding-inline:calc(var(--spacing) * 4)}.px-5{padding-inline:calc(var(--spacing) * 5)}.px-6{padding-inline:calc(var(--spacing) * 6)}.py-1{padding-block:calc(var(--spacing) * 1)}.py-1\.5{padding-block:calc(var(--spacing) * 1.5)}.py-2{padding-block:calc(var(--spacing) * 2)}.py-4{padding-block:calc(var(--spacing) * 4)}.pt-8{padding-top:calc(var(--spacing) * 8)}.pb-6{padding-bottom:calc(var(--spacing) * 6)}.pb-12{padding-bottom:calc(var(--spacing) * 12)}.text-center{text-align:center}.text-lg{font-size:var(--text-lg);line-height:var(--tw-leading,var(--text-lg--line-height))}.text-sm{font-size:var(--text-sm);line-height:var(--tw-leading,var(--text-sm--line-height))}.text-\[13px\]{font-size:13px}.leading-5{--tw-leading:calc(var(--spacing) * 5);line-height:calc(var(--spacing) * 5)}.leading-7{--tw-leading:calc(var(--spacing) * 7);line-height:calc(var(--spacing) * 7)}.leading-\[20px\]{--tw-leading:20px;line-height:20px}.leading-normal{--tw-leading:var(--leading-normal);line-height:var(--leading-normal)}.font-medium{--tw-font-weight:var(--font-weight-medium);font-weight:var(--font-weight-medium)}.font-semibold{--tw-font-weight:var(--font-weight-semibold);font-weight:var(--font-weight-semibold)}.tracking-wider{--tw-tracking:var(--tracking-wider);letter-spacing:var(--tracking-wider)}.text-\[\#1B1B18\],.text-\[\#1b1b18\]{color:#1b1b18}.text-\[\#706f6c\]{color:#706f6c}.text-\[\#F3BEC7\]{color:#f3bec7}.text-\[\#F8B803\]{color:#f8b803}.text-\[\#F53003\],.text-\[\#f53003\]{color:#f53003}.text-gray-200{color:var(--color-gray-200)}.text-gray-300{color:var(--color-gray-300)}.text-gray-400{color:var(--color-gray-400)}.text-gray-500{color:var(--color-gray-500)}.text-gray-600{color:var(--color-gray-600)}.text-gray-700{color:var(--color-gray-700)}.text-gray-800{color:var(--color-gray-800)}.text-gray-900{color:var(--color-gray-900)}.text-white{color:var(--color-white)}.uppercase{text-transform:uppercase}.underline{text-decoration-line:underline}.underline-offset-4{text-underline-offset:4px}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.opacity-100{opacity:1}.mix-blend-color{mix-blend-mode:color}.mix-blend-darken{mix-blend-mode:darken}.mix-blend-hard-light{mix-blend-mode:hard-light}.mix-blend-multiply{mix-blend-mode:multiply}.shadow{--tw-shadow:0 1px 3px 0 var(--tw-shadow-color,#0000001a), 0 1px 2px -1px var(--tw-shadow-color,#0000001a);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-\[0px_0px_1px_0px_rgba\(0\,0\,0\,0\.03\)\,0px_1px_2px_0px_rgba\(0\,0\,0\,0\.06\)\]{--tw-shadow:0px 0px 1px 0px var(--tw-shadow-color,#00000008), 0px 1px 2px 0px var(--tw-shadow-color,#0000000f);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-\[inset_0px_0px_0px_1px_rgba\(26\,26\,0\,0\.16\)\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#1a1a0029);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.shadow-sm{--tw-shadow:0 1px 3px 0 var(--tw-shadow-color,#0000001a), 0 1px 2px -1px var(--tw-shadow-color,#0000001a);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.ring-gray-300{--tw-ring-color:var(--color-gray-300)}.filter{filter:var(--tw-blur,) var(--tw-brightness,) var(--tw-contrast,) var(--tw-grayscale,) var(--tw-hue-rotate,) var(--tw-invert,) var(--tw-saturate,) var(--tw-sepia,) var(--tw-drop-shadow,)}.transition{transition-property:color,background-color,border-color,outline-color,text-decoration-color,fill,stroke,--tw-gradient-from,--tw-gradient-via,--tw-gradient-to,opacity,box-shadow,transform,translate,scale,rotate,filter,-webkit-backdrop-filter,backdrop-filter,display,content-visibility,overlay,pointer-events;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-all{transition-property:all;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.transition-opacity{transition-property:opacity;transition-timing-function:var(--tw-ease,var(--default-transition-timing-function));transition-duration:var(--tw-duration,var(--default-transition-duration))}.delay-200{transition-delay:.2s}.delay-300{transition-delay:.3s}.delay-400{transition-delay:.4s}.duration-150{--tw-duration:.15s;transition-duration:.15s}.duration-750{--tw-duration:.75s;transition-duration:.75s}.ease-in-out{--tw-ease:var(--ease-in-out);transition-timing-function:var(--ease-in-out)}.\[--stroke-color\:\#1B1B18\]{--stroke-color:#1b1b18}.not-has-\[nav\]\:hidden:not(:has(:is(nav))){display:none}.before\:absolute:before{content:var(--tw-content);position:absolute}.before\:top-0:before{content:var(--tw-content);top:calc(var(--spacing) * 0)}.before\:top-1\/2:before{content:var(--tw-content);top:50%}.before\:bottom-0:before{content:var(--tw-content);bottom:calc(var(--spacing) * 0)}.before\:bottom-1\/2:before{content:var(--tw-content);bottom:50%}.before\:left-\[0\.4rem\]:before{content:var(--tw-content);left:.4rem}.before\:border-l:before{content:var(--tw-content);border-left-style:var(--tw-border-style);border-left-width:1px}.before\:border-\[\#e3e3e0\]:before{content:var(--tw-content);border-color:#e3e3e0}@media(hover:hover){.hover\:border-\[\#1915014a\]:hover{border-color:#1915014a}.hover\:border-\[\#19140035\]:hover{border-color:#19140035}.hover\:border-black:hover{border-color:var(--color-black)}.hover\:bg-black:hover{background-color:var(--color-black)}.hover\:bg-gray-100:hover{background-color:var(--color-gray-100)}.hover\:text-gray-400:hover{color:var(--color-gray-400)}.hover\:text-gray-700:hover{color:var(--color-gray-700)}}.focus\:border-blue-300:focus{border-color:var(--color-blue-300)}.focus\:ring:focus{--tw-ring-shadow:var(--tw-ring-inset,) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color,currentcolor);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.focus\:outline-none:focus{--tw-outline-style:none;outline-style:none}.active\:bg-gray-100:active{background-color:var(--color-gray-100)}.active\:text-gray-500:active{color:var(--color-gray-500)}.active\:text-gray-700:active{color:var(--color-gray-700)}.active\:text-gray-800:active{color:var(--color-gray-800)}@media(min-width:40rem){.sm\:flex{display:flex}.sm\:hidden{display:none}.sm\:flex-1{flex:1}.sm\:items-center{align-items:center}.sm\:justify-between{justify-content:space-between}.sm\:justify-start{justify-content:flex-start}.sm\:gap-2{gap:calc(var(--spacing) * 2)}.sm\:px-6{padding-inline:calc(var(--spacing) * 6)}.sm\:pt-0{padding-top:calc(var(--spacing) * 0)}}@media(min-width:64rem){.lg\:mt-10{margin-top:calc(var(--spacing) * 10)}.lg\:mb-0{margin-bottom:calc(var(--spacing) * 0)}.lg\:mb-6{margin-bottom:calc(var(--spacing) * 6)}.lg\:-ml-px{margin-left:-1px}.lg\:ml-0{margin-left:calc(var(--spacing) * 0)}.lg\:block{display:block}.lg\:aspect-auto{aspect-ratio:auto}.lg\:w-\[438px\]{width:438px}.lg\:max-w-4xl{max-width:var(--container-4xl)}.lg\:grow{flex-grow:1}.lg\:flex-row{flex-direction:row}.lg\:justify-center{justify-content:center}.lg\:rounded-t-none{border-top-left-radius:0;border-top-right-radius:0}.lg\:rounded-tl-lg{border-top-left-radius:var(--radius-lg)}.lg\:rounded-r-lg{border-top-right-radius:var(--radius-lg);border-bottom-right-radius:var(--radius-lg)}.lg\:rounded-br-none{border-bottom-right-radius:0}.lg\:p-8{padding:calc(var(--spacing) * 8)}.lg\:p-20{padding:calc(var(--spacing) * 20)}.lg\:px-8{padding-inline:calc(var(--spacing) * 8)}.lg\:pb-10{padding-bottom:calc(var(--spacing) * 10)}}.rtl\:flex-row-reverse:where(:dir(rtl),[dir=rtl],[dir=rtl] *){flex-direction:row-reverse}@media(prefers-color-scheme:dark){.dark\:border-\[\#3E3E3A\]{border-color:#3e3e3a}.dark\:border-\[\#eeeeec\]{border-color:#eeeeec}.dark\:border-gray-600{border-color:var(--color-gray-600)}.dark\:bg-\[\#0a0a0a\]{background-color:#0a0a0a}.dark\:bg-\[\#1D0002\]{background-color:#1d0002}.dark\:bg-\[\#3E3E3A\]{background-color:#3e3e3a}.dark\:bg-\[\#161615\]{background-color:#161615}.dark\:bg-\[\#eeeeec\]{background-color:#eeeeec}.dark\:bg-gray-700{background-color:var(--color-gray-700)}.dark\:bg-gray-800{background-color:var(--color-gray-800)}.dark\:bg-gray-900{background-color:var(--color-gray-900)}.dark\:text-\[\#1C1C1A\]{color:#1c1c1a}.dark\:text-\[\#4B0600\]{color:#4b0600}.dark\:text-\[\#391800\]{color:#391800}.dark\:text-\[\#733000\]{color:#733000}.dark\:text-\[\#A1A09A\]{color:#a1a09a}.dark\:text-\[\#EDEDEC\]{color:#ededec}.dark\:text-\[\#F61500\]{color:#f61500}.dark\:text-\[\#FF4433\]{color:#f43}.dark\:text-black{color:var(--color-black)}.dark\:text-gray-200{color:var(--color-gray-200)}.dark\:text-gray-300{color:var(--color-gray-300)}.dark\:text-gray-400{color:var(--color-gray-400)}.dark\:text-gray-600{color:var(--color-gray-600)}.dark\:mix-blend-hard-light{mix-blend-mode:hard-light}.dark\:mix-blend-normal{mix-blend-mode:normal}.dark\:shadow-\[inset_0px_0px_0px_1px_\#fffaed2d\]{--tw-shadow:inset 0px 0px 0px 1px var(--tw-shadow-color,#fffaed2d);box-shadow:var(--tw-inset-shadow),var(--tw-inset-ring-shadow),var(--tw-ring-offset-shadow),var(--tw-ring-shadow),var(--tw-shadow)}.dark\:\[--stroke-color\:\#FF750F\]{--stroke-color:#ff750f}.dark\:before\:border-\[\#3E3E3A\]:before{content:var(--tw-content);border-color:#3e3e3a}@media(hover:hover){.dark\:hover\:border-\[\#3E3E3A\]:hover{border-color:#3e3e3a}.dark\:hover\:border-\[\#62605b\]:hover{border-color:#62605b}.dark\:hover\:border-white:hover{border-color:var(--color-white)}.dark\:hover\:bg-gray-900:hover{background-color:var(--color-gray-900)}.dark\:hover\:bg-white:hover{background-color:var(--color-white)}.dark\:hover\:text-gray-200:hover{color:var(--color-gray-200)}.dark\:hover\:text-gray-300:hover{color:var(--color-gray-300)}}.dark\:focus\:border-blue-700:focus{border-color:var(--color-blue-700)}.dark\:focus\:border-blue-800:focus{border-color:var(--color-blue-800)}.dark\:active\:bg-gray-700:active{background-color:var(--color-gray-700)}.dark\:active\:text-gray-300:active{color:var(--color-gray-300)}}@starting-style{.starting\:opacity-0{opacity:0}}@media(prefers-reduced-motion:no-preference){@starting-style{.motion-safe\:starting\:-translate-x-\[26px\]{--tw-translate-x: -26px ;translate:var(--tw-translate-x) var(--tw-translate-y)}}@starting-style{.motion-safe\:starting\:-translate-x-\[51px\]{--tw-translate-x: -51px ;translate:var(--tw-translate-x) var(--tw-translate-y)}}@starting-style{.motion-safe\:starting\:-translate-x-\[78px\]{--tw-translate-x: -78px ;translate:var(--tw-translate-x) var(--tw-translate-y)}}@starting-style{.motion-safe\:starting\:-translate-x-\[102px\]{--tw-translate-x: -102px ;translate:var(--tw-translate-x) var(--tw-translate-y)}}@starting-style{.motion-safe\:starting\:translate-y-6{--tw-translate-y:calc(var(--spacing) * 6);translate:var(--tw-translate-x) var(--tw-translate-y)}}}}@property --tw-translate-x{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-y{syntax:"*";inherits:false;initial-value:0}@property --tw-translate-z{syntax:"*";inherits:false;initial-value:0}@property --tw-rotate-x{syntax:"*";inherits:false}@property --tw-rotate-y{syntax:"*";inherits:false}@property --tw-rotate-z{syntax:"*";inherits:false}@property --tw-skew-x{syntax:"*";inherits:false}@property --tw-skew-y{syntax:"*";inherits:false}@property --tw-space-x-reverse{syntax:"*";inherits:false;initial-value:0}@property --tw-border-style{syntax:"*";inherits:false;initial-value:solid}@property --tw-leading{syntax:"*";inherits:false}@property --tw-font-weight{syntax:"*";inherits:false}@property --tw-tracking{syntax:"*";inherits:false}@property --tw-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-shadow-color{syntax:"*";inherits:false}@property --tw-shadow-alpha{syntax:"<percentage>";inherits:false;initial-value:100%}@property --tw-inset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-shadow-color{syntax:"*";inherits:false}@property --tw-inset-shadow-alpha{syntax:"<percentage>";inherits:false;initial-value:100%}@property --tw-ring-color{syntax:"*";inherits:false}@property --tw-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-inset-ring-color{syntax:"*";inherits:false}@property --tw-inset-ring-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-ring-inset{syntax:"*";inherits:false}@property --tw-ring-offset-width{syntax:"<length>";inherits:false;initial-value:0}@property --tw-ring-offset-color{syntax:"*";inherits:false;initial-value:#fff}@property --tw-ring-offset-shadow{syntax:"*";inherits:false;initial-value:0 0 #0000}@property --tw-blur{syntax:"*";inherits:false}@property --tw-brightness{syntax:"*";inherits:false}@property --tw-contrast{syntax:"*";inherits:false}@property --tw-grayscale{syntax:"*";inherits:false}@property --tw-hue-rotate{syntax:"*";inherits:false}@property --tw-invert{syntax:"*";inherits:false}@property --tw-opacity{syntax:"*";inherits:false}@property --tw-saturate{syntax:"*";inherits:false}@property --tw-sepia{syntax:"*";inherits:false}@property --tw-drop-shadow{syntax:"*";inherits:false}@property --tw-drop-shadow-color{syntax:"*";inherits:false}@property --tw-drop-shadow-alpha{syntax:"<percentage>";inherits:false;initial-value:100%}@property --tw-drop-shadow-size{syntax:"*";inherits:false}@property --tw-duration{syntax:"*";inherits:false}@property --tw-ease{syntax:"*";inherits:false}@property --tw-content{syntax:"*";inherits:false;initial-value:""}@keyframes spin{to{transform:rotate(360deg)}}@keyframes ping{75%,to{opacity:0;transform:scale(2)}}@keyframes pulse{50%{opacity:.5}}@keyframes bounce{0%,to{animation-timing-function:cubic-bezier(.8,0,1,1);transform:translateY(-25%)}50%{animation-timing-function:cubic-bezier(0,0,.2,1);transform:none}}
            </style>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                <div class="text-[13px] leading-[20px] flex-1 p-6 pb-6 lg:p-20 lg:pb-10 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                    <h1 class="mb-1 font-medium">Let's get started</h1>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">With so many options available to you,<br /> we suggest you start with the following:</p>
                    <ul class="flex flex-col mb-4 lg:mb-6">
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Read the
                                <a href="https://laravel.com/docs" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ml-1">
                                    <span>Documentation</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:bottom-1/2 before:top-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Watch video tutorials at
                                <a href="https://laracasts.com" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ml-1">
                                    <span>Laracasts</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                    </ul>
                    <ul class="flex gap-3 text-sm leading-normal">
                        <li>
                            <a href="https://cloud.laravel.com" target="_blank" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                                Deploy now
                            </a>
                        </li>
                    </ul>

                    <p class="mt-6 lg:mt-10 text-[#706f6c] dark:text-[#A1A09A]">
                        v{{ app()->version() }}
                        <a href="https://github.com/laravel/laravel/blob/13.x/CHANGELOG.md" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ml-1">
                            <span>View changelog</span>
                            <svg
                                width="10"
                                height="11"
                                viewBox="0 0 10 11"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-2.5 h-2.5"
                            >
                                <path
                                    d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                    stroke="currentColor"
                                    stroke-linecap="square"
                                />
                            </svg>
                        </a>
                    </p>
                </div>
                <div class="bg-[#fff2f2] dark:bg-[#1D0002] relative lg:-ml-px -mb-px lg:mb-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg aspect-[335/364] lg:aspect-auto w-full lg:w-[438px] shrink-0 overflow-hidden">
                    {{-- Laravel Logo --}}
                    <svg class="w-full text-[#F53003] dark:text-[#F61500] transition-all translate-y-0 opacity-100 max-w-none duration-750 starting:opacity-0 motion-safe:starting:translate-y-6" viewBox="0 0 438 104" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.2036 -3H0V102.197H49.5189V86.7187H17.2036V-3Z" fill="currentColor" />
                        <path d="M110.256 41.6337C108.061 38.1275 104.945 35.3731 100.905 33.3681C96.8667 31.3647 92.8016 30.3618 88.7131 30.3618C83.4247 30.3618 78.5885 31.3389 74.201 33.2923C69.8111 35.2456 66.0474 37.928 62.9059 41.3333C59.7643 44.7401 57.3198 48.6726 55.5754 53.1293C53.8287 57.589 52.9572 62.274 52.9572 67.1813C52.9572 72.1925 53.8287 76.8995 55.5754 81.3069C57.3191 85.7173 59.7636 89.6241 62.9059 93.0293C66.0474 96.4361 69.8119 99.1155 74.201 101.069C78.5885 103.022 83.4247 103.999 88.7131 103.999C92.8016 103.999 96.8667 102.997 100.905 100.994C104.945 98.9911 108.061 96.2359 110.256 92.7282V102.195H126.563V32.1642H110.256V41.6337ZM108.76 75.7472C107.762 78.4531 106.366 80.8078 104.572 82.8112C102.776 84.8161 100.606 86.4183 98.0637 87.6206C95.5202 88.823 92.7004 89.4238 89.6103 89.4238C86.5178 89.4238 83.7252 88.823 81.2324 87.6206C78.7388 86.4183 76.5949 84.8161 74.7998 82.8112C73.004 80.8078 71.6319 78.4531 70.6856 75.7472C69.7356 73.0421 69.2644 70.1868 69.2644 67.1821C69.2644 64.1758 69.7356 61.3205 70.6856 58.6154C71.6319 55.9102 73.004 53.5571 74.7998 51.5522C76.5949 49.5495 78.738 47.9451 81.2324 46.7427C83.7252 45.5404 86.5178 44.9396 89.6103 44.9396C92.7012 44.9396 95.5202 45.5404 98.0637 46.7427C100.606 47.9451 102.776 49.5487 104.572 51.5522C106.367 53.5571 107.762 55.9102 108.76 58.6154C109.756 61.3205 110.256 64.1758 110.256 67.1821C110.256 70.1868 109.756 73.0421 108.76 75.7472Z" fill="currentColor" />
                        <path d="M242.805 41.6337C240.611 38.1275 237.494 35.3731 233.455 33.3681C229.416 31.3647 225.351 30.3618 221.262 30.3618C215.974 30.3618 211.138 31.3389 206.75 33.2923C202.36 35.2456 198.597 37.928 195.455 41.3333C192.314 44.7401 189.869 48.6726 188.125 53.1293C186.378 57.589 185.507 62.274 185.507 67.1813C185.507 72.1925 186.378 76.8995 188.125 81.3069C189.868 85.7173 192.313 89.6241 195.455 93.0293C198.597 96.4361 202.361 99.1155 206.75 101.069C211.138 103.022 215.974 103.999 221.262 103.999C225.351 103.999 229.416 102.997 233.455 100.994C237.494 98.9911 240.611 96.2359 242.805 92.7282V102.195H259.112V32.1642H242.805V41.6337ZM241.31 75.7472C240.312 78.4531 238.916 80.8078 237.122 82.8112C235.326 84.8161 233.156 86.4183 230.614 87.6206C228.07 88.823 225.251 89.4238 222.16 89.4238C219.068 89.4238 216.275 88.823 213.782 87.6206C211.289 86.4183 209.145 84.8161 207.35 82.8112C205.554 80.8078 204.182 78.4531 203.236 75.7472C202.286 73.0421 201.814 70.1868 201.814 67.1821C201.814 64.1758 202.286 61.3205 203.236 58.6154C204.182 55.9102 205.554 53.5571 207.35 51.5522C209.145 49.5495 211.288 47.9451 213.782 46.7427C216.275 45.5404 219.068 44.9396 222.16 44.9396C225.251 44.9396 228.07 45.5404 230.614 46.7427C233.156 47.9451 235.326 49.5487 237.122 51.5522C238.917 53.5571 240.312 55.9102 241.31 58.6154C242.306 61.3205 242.806 64.1758 242.806 67.1821C242.805 70.1868 242.305 73.0421 241.31 75.7472Z" fill="currentColor" />
                        <path d="M438 -3H421.694V102.197H438V-3Z" fill="currentColor" />
                        <path d="M139.43 102.197H155.735V48.2834H183.712V32.1665H139.43V102.197Z" fill="currentColor" />
                        <path d="M324.49 32.1665L303.995 85.794L283.498 32.1665H266.983L293.748 102.197H314.242L341.006 32.1665H324.49Z" fill="currentColor" />
                        <path d="M376.571 30.3656C356.603 30.3656 340.797 46.8497 340.797 67.1828C340.797 89.6597 356.094 104 378.661 104C391.29 104 399.354 99.1488 409.206 88.5848L398.189 80.0226C398.183 80.031 389.874 90.9895 377.468 90.9895C363.048 90.9895 356.977 79.3111 356.977 73.269H411.075C413.917 50.1328 398.775 30.3656 376.571 30.3656ZM357.02 61.0967C357.145 59.7487 359.023 43.3761 376.442 43.3761C393.861 43.3761 395.978 59.7464 396.099 61.0967H357.02Z" fill="currentColor" />
                    </svg>

                    {{-- 13 --}}
                    <svg class="w-[438px] max-w-none relative -mt-[6.6rem] -ml-8 lg:ml-0 [--stroke-color:#1B1B18] dark:[--stroke-color:#FF750F]" viewBox="0 0 440 392" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g class="mix-blend-darken dark:mix-blend-normal transition-all delay-300 opacity-100 duration-750 starting:opacity-0 text-[#1B1B18] dark:text-black">
                            <mask id="path-1-mask" maskUnits="userSpaceOnUse" x="-0.328613" y="103" width="338" height="299" fill="black">
                                <rect fill="white" x="-0.328613" y="103" width="338" height="299"/>
                                <path d="M234.936 400.8C204.136 400.8 178.936 392.4 159.336 375.6C140.136 358.8 130.536 337 130.536 310.2H200.736C200.736 318.2 203.736 324.8 209.736 330C215.736 335.2 223.736 337.8 233.736 337.8C243.336 337.8 251.136 335 257.136 329.4C263.536 323.8 266.736 316.6 266.736 307.8C266.736 299.8 263.936 293.2 258.336 288C252.736 282.8 245.536 280.2 236.736 280.2H199.536V218.4H236.736C243.536 218.4 249.336 216 254.136 211.2C258.936 206.4 261.336 200.4 261.336 193.2C261.336 184.8 258.736 178.2 253.536 173.4C248.336 168.6 241.736 166.2 233.736 166.2C226.536 166.2 220.336 168.4 215.136 172.8C210.336 177.2 207.936 182.8 207.936 189.6H141.336C141.336 164.8 150.136 144.6 167.736 129C185.336 113 207.936 105 235.536 105C263.136 105 285.536 112.2 302.736 126.6C320.336 141 329.136 160 329.136 183.6C329.136 200.8 324.536 214.8 315.336 225.6C306.136 236 294.336 243.2 279.936 247.2C297.136 252 310.736 260.2 320.736 271.8C331.136 283.4 336.336 298 336.336 315.6C336.336 340.4 326.936 360.8 308.136 376.8C289.336 392.8 264.936 400.8 234.936 400.8Z"/>
                                <path d="M26.8714 167.6H1.67139V105.2H94.6714V400.2H26.8714V167.6Z"/>
                            </mask>
                            <path d="M234.936 400.8C204.136 400.8 178.936 392.4 159.336 375.6C140.136 358.8 130.536 337 130.536 310.2H200.736C200.736 318.2 203.736 324.8 209.736 330C215.736 335.2 223.736 337.8 233.736 337.8C243.336 337.8 251.136 335 257.136 329.4C263.536 323.8 266.736 316.6 266.736 307.8C266.736 299.8 263.936 293.2 258.336 288C252.736 282.8 245.536 280.2 236.736 280.2H199.536V218.4H236.736C243.536 218.4 249.336 216 254.136 211.2C258.936 206.4 261.336 200.4 261.336 193.2C261.336 184.8 258.736 178.2 253.536 173.4C248.336 168.6 241.736 166.2 233.736 166.2C226.536 166.2 220.336 168.4 215.136 172.8C210.336 177.2 207.936 182.8 207.936 189.6H141.336C141.336 164.8 150.136 144.6 167.736 129C185.336 113 207.936 105 235.536 105C263.136 105 285.536 112.2 302.736 126.6C320.336 141 329.136 160 329.136 183.6C329.136 200.8 324.536 214.8 315.336 225.6C306.136 236 294.336 243.2 279.936 247.2C297.136 252 310.736 260.2 320.736 271.8C331.136 283.4 336.336 298 336.336 315.6C336.336 340.4 326.936 360.8 308.136 376.8C289.336 392.8 264.936 400.8 234.936 400.8Z" fill="currentColor"/>
                            <path d="M26.8714 167.6H1.67139V105.2H94.6714V400.2H26.8714V167.6Z" fill="currentColor"/>
                            <path d="M234.936 400.8C204.136 400.8 178.936 392.4 159.336 375.6C140.136 358.8 130.536 337 130.536 310.2H200.736C200.736 318.2 203.736 324.8 209.736 330C215.736 335.2 223.736 337.8 233.736 337.8C243.336 337.8 251.136 335 257.136 329.4C263.536 323.8 266.736 316.6 266.736 307.8C266.736 299.8 263.936 293.2 258.336 288C252.736 282.8 245.536 280.2 236.736 280.2H199.536V218.4H236.736C243.536 218.4 249.336 216 254.136 211.2C258.936 206.4 261.336 200.4 261.336 193.2C261.336 184.8 258.736 178.2 253.536 173.4C248.336 168.6 241.736 166.2 233.736 166.2C226.536 166.2 220.336 168.4 215.136 172.8C210.336 177.2 207.936 182.8 207.936 189.6H141.336C141.336 164.8 150.136 144.6 167.736 129C185.336 113 207.936 105 235.536 105C263.136 105 285.536 112.2 302.736 126.6C320.336 141 329.136 160 329.136 183.6C329.136 200.8 324.536 214.8 315.336 225.6C306.136 236 294.336 243.2 279.936 247.2C297.136 252 310.736 260.2 320.736 271.8C331.136 283.4 336.336 298 336.336 315.6C336.336 340.4 326.936 360.8 308.136 376.8C289.336 392.8 264.936 400.8 234.936 400.8Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-1-mask)"/>
                            <path d="M26.8714 167.6H1.67139V105.2H94.6714V400.2H26.8714V167.6Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-1-mask)"/>
                        </g>

                        <g class="transition-all delay-400 opacity-100 duration-750 starting:opacity-0 motion-safe:starting:-translate-x-[26px] text-[#F3BEC7] dark:text-[#4B0600]">
                            <mask id="path-2-mask" maskUnits="userSpaceOnUse" x="25.3357" y="103" width="338" height="299" fill="black">
                                <rect fill="white" x="25.3357" y="103" width="338" height="299"/>
                                <path d="M260.6 400.8C229.8 400.8 204.6 392.4 185 375.6C165.8 358.8 156.2 337 156.2 310.2H226.4C226.4 318.2 229.4 324.8 235.4 330C241.4 335.2 249.4 337.8 259.4 337.8C269 337.8 276.8 335 282.8 329.4C289.2 323.8 292.4 316.6 292.4 307.8C292.4 299.8 289.6 293.2 284 288C278.4 282.8 271.2 280.2 262.4 280.2H225.2V218.4H262.4C269.2 218.4 275 216 279.8 211.2C284.6 206.4 287 200.4 287 193.2C287 184.8 284.4 178.2 279.2 173.4C274 168.6 267.4 166.2 259.4 166.2C252.2 166.2 246 168.4 240.8 172.8C236 177.2 233.6 182.8 233.6 189.6H167C167 164.8 175.8 144.6 193.4 129C211 113 233.6 105 261.2 105C288.8 105 311.2 112.2 328.4 126.6C346 141 354.8 160 354.8 183.6C354.8 200.8 350.2 214.8 341 225.6C331.8 236 320 243.2 305.6 247.2C322.8 252 336.4 260.2 346.4 271.8C356.8 283.4 362 298 362 315.6C362 340.4 352.6 360.8 333.8 376.8C315 392.8 290.6 400.8 260.6 400.8Z"/>
                                <path d="M52.5357 167.6H27.3357V105.2H120.336V400.2H52.5357V167.6Z"/>
                            </mask>
                            <path d="M260.6 400.8C229.8 400.8 204.6 392.4 185 375.6C165.8 358.8 156.2 337 156.2 310.2H226.4C226.4 318.2 229.4 324.8 235.4 330C241.4 335.2 249.4 337.8 259.4 337.8C269 337.8 276.8 335 282.8 329.4C289.2 323.8 292.4 316.6 292.4 307.8C292.4 299.8 289.6 293.2 284 288C278.4 282.8 271.2 280.2 262.4 280.2H225.2V218.4H262.4C269.2 218.4 275 216 279.8 211.2C284.6 206.4 287 200.4 287 193.2C287 184.8 284.4 178.2 279.2 173.4C274 168.6 267.4 166.2 259.4 166.2C252.2 166.2 246 168.4 240.8 172.8C236 177.2 233.6 182.8 233.6 189.6H167C167 164.8 175.8 144.6 193.4 129C211 113 233.6 105 261.2 105C288.8 105 311.2 112.2 328.4 126.6C346 141 354.8 160 354.8 183.6C354.8 200.8 350.2 214.8 341 225.6C331.8 236 320 243.2 305.6 247.2C322.8 252 336.4 260.2 346.4 271.8C356.8 283.4 362 298 362 315.6C362 340.4 352.6 360.8 333.8 376.8C315 392.8 290.6 400.8 260.6 400.8Z" fill="currentColor"/>
                            <path d="M52.5357 167.6H27.3357V105.2H120.336V400.2H52.5357V167.6Z" fill="currentColor"/>
                            <path d="M260.6 400.8C229.8 400.8 204.6 392.4 185 375.6C165.8 358.8 156.2 337 156.2 310.2H226.4C226.4 318.2 229.4 324.8 235.4 330C241.4 335.2 249.4 337.8 259.4 337.8C269 337.8 276.8 335 282.8 329.4C289.2 323.8 292.4 316.6 292.4 307.8C292.4 299.8 289.6 293.2 284 288C278.4 282.8 271.2 280.2 262.4 280.2H225.2V218.4H262.4C269.2 218.4 275 216 279.8 211.2C284.6 206.4 287 200.4 287 193.2C287 184.8 284.4 178.2 279.2 173.4C274 168.6 267.4 166.2 259.4 166.2C252.2 166.2 246 168.4 240.8 172.8C236 177.2 233.6 182.8 233.6 189.6H167C167 164.8 175.8 144.6 193.4 129C211 113 233.6 105 261.2 105C288.8 105 311.2 112.2 328.4 126.6C346 141 354.8 160 354.8 183.6C354.8 200.8 350.2 214.8 341 225.6C331.8 236 320 243.2 305.6 247.2C322.8 252 336.4 260.2 346.4 271.8C356.8 283.4 362 298 362 315.6C362 340.4 352.6 360.8 333.8 376.8C315 392.8 290.6 400.8 260.6 400.8Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-2-mask)"/>
                            <path d="M52.5357 167.6H27.3357V105.2H120.336V400.2H52.5357V167.6Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-2-mask)"/>
                        </g>
                        
                        <g class="mix-blend-color dark:mix-blend-hard-light transition-all delay-400 opacity-100 duration-750 starting:opacity-0 motion-safe:starting:-translate-x-[51px] text-[#F8B803] dark:text-[#391800]">
                            <mask id="path-3-mask" maskUnits="userSpaceOnUse" x="51" y="103" width="338" height="299" fill="black">
                                <rect fill="white" x="51" y="103" width="338" height="299"/>
                                <path d="M286.264 400.8C255.464 400.8 230.264 392.4 210.664 375.6C191.464 358.8 181.864 337 181.864 310.2H252.064C252.064 318.2 255.064 324.8 261.064 330C267.064 335.2 275.064 337.8 285.064 337.8C294.664 337.8 302.464 335 308.464 329.4C314.864 323.8 318.064 316.6 318.064 307.8C318.064 299.8 315.264 293.2 309.664 288C304.064 282.8 296.864 280.2 288.064 280.2H250.864V218.4H288.064C294.864 218.4 300.664 216 305.464 211.2C310.264 206.4 312.664 200.4 312.664 193.2C312.664 184.8 310.064 178.2 304.864 173.4C299.664 168.6 293.064 166.2 285.064 166.2C277.864 166.2 271.664 168.4 266.464 172.8C261.664 177.2 259.264 182.8 259.264 189.6H192.664C192.664 164.8 201.464 144.6 219.064 129C236.664 113 259.264 105 286.864 105C314.464 105 336.864 112.2 354.064 126.6C371.664 141 380.464 160 380.464 183.6C380.464 200.8 375.864 214.8 366.664 225.6C357.464 236 345.664 243.2 331.264 247.2C348.464 252 362.064 260.2 372.064 271.8C382.464 283.4 387.664 298 387.664 315.6C387.664 340.4 378.264 360.8 359.464 376.8C340.664 392.8 316.264 400.8 286.264 400.8Z"/>
                                <path d="M78.2 167.6H53V105.2H146V400.2H78.2V167.6Z"/>
                            </mask>
                            <path d="M286.264 400.8C255.464 400.8 230.264 392.4 210.664 375.6C191.464 358.8 181.864 337 181.864 310.2H252.064C252.064 318.2 255.064 324.8 261.064 330C267.064 335.2 275.064 337.8 285.064 337.8C294.664 337.8 302.464 335 308.464 329.4C314.864 323.8 318.064 316.6 318.064 307.8C318.064 299.8 315.264 293.2 309.664 288C304.064 282.8 296.864 280.2 288.064 280.2H250.864V218.4H288.064C294.864 218.4 300.664 216 305.464 211.2C310.264 206.4 312.664 200.4 312.664 193.2C312.664 184.8 310.064 178.2 304.864 173.4C299.664 168.6 293.064 166.2 285.064 166.2C277.864 166.2 271.664 168.4 266.464 172.8C261.664 177.2 259.264 182.8 259.264 189.6H192.664C192.664 164.8 201.464 144.6 219.064 129C236.664 113 259.264 105 286.864 105C314.464 105 336.864 112.2 354.064 126.6C371.664 141 380.464 160 380.464 183.6C380.464 200.8 375.864 214.8 366.664 225.6C357.464 236 345.664 243.2 331.264 247.2C348.464 252 362.064 260.2 372.064 271.8C382.464 283.4 387.664 298 387.664 315.6C387.664 340.4 378.264 360.8 359.464 376.8C340.664 392.8 316.264 400.8 286.264 400.8Z" fill="currentColor"/>
                            <path d="M78.2 167.6H53V105.2H146V400.2H78.2V167.6Z" fill="currentColor"/>
                            <path d="M286.264 400.8C255.464 400.8 230.264 392.4 210.664 375.6C191.464 358.8 181.864 337 181.864 310.2H252.064C252.064 318.2 255.064 324.8 261.064 330C267.064 335.2 275.064 337.8 285.064 337.8C294.664 337.8 302.464 335 308.464 329.4C314.864 323.8 318.064 316.6 318.064 307.8C318.064 299.8 315.264 293.2 309.664 288C304.064 282.8 296.864 280.2 288.064 280.2H250.864V218.4H288.064C294.864 218.4 300.664 216 305.464 211.2C310.264 206.4 312.664 200.4 312.664 193.2C312.664 184.8 310.064 178.2 304.864 173.4C299.664 168.6 293.064 166.2 285.064 166.2C277.864 166.2 271.664 168.4 266.464 172.8C261.664 177.2 259.264 182.8 259.264 189.6H192.664C192.664 164.8 201.464 144.6 219.064 129C236.664 113 259.264 105 286.864 105C314.464 105 336.864 112.2 354.064 126.6C371.664 141 380.464 160 380.464 183.6C380.464 200.8 375.864 214.8 366.664 225.6C357.464 236 345.664 243.2 331.264 247.2C348.464 252 362.064 260.2 372.064 271.8C382.464 283.4 387.664 298 387.664 315.6C387.664 340.4 378.264 360.8 359.464 376.8C340.664 392.8 316.264 400.8 286.264 400.8Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-3-mask)"/>
                            <path d="M78.2 167.6H53V105.2H146V400.2H78.2V167.6Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-3-mask)"/>
                        </g>
                        
                        <g class="mix-blend-multiply dark:mix-blend-normal transition-all delay-400 opacity-100 duration-750 starting:opacity-0 motion-safe:starting:-translate-x-[78px] text-[#F3BEC7] dark:text-[#733000]">
                            <mask id="path-4-mask" maskUnits="userSpaceOnUse" x="76.6643" y="103" width="338" height="299" fill="black">
                                <rect fill="white" x="76.6643" y="103" width="338" height="299"/>
                                <path d="M311.929 400.8C281.129 400.8 255.929 392.4 236.329 375.6C217.129 358.8 207.529 337 207.529 310.2H277.729C277.729 318.2 280.729 324.8 286.729 330C292.729 335.2 300.729 337.8 310.729 337.8C320.329 337.8 328.129 335 334.129 329.4C340.529 323.8 343.729 316.6 343.729 307.8C343.729 299.8 340.929 293.2 335.329 288C329.729 282.8 322.529 280.2 313.729 280.2H276.529V218.4H313.729C320.529 218.4 326.329 216 331.129 211.2C335.929 206.4 338.329 200.4 338.329 193.2C338.329 184.8 335.729 178.2 330.529 173.4C325.329 168.6 318.729 166.2 310.729 166.2C303.529 166.2 297.329 168.4 292.129 172.8C287.329 177.2 284.929 182.8 284.929 189.6H218.329C218.329 164.8 227.129 144.6 244.729 129C262.329 113 284.929 105 312.529 105C340.129 105 362.529 112.2 379.729 126.6C397.329 141 406.129 160 406.129 183.6C406.129 200.8 401.529 214.8 392.329 225.6C383.129 236 371.329 243.2 356.929 247.2C374.129 252 387.729 260.2 397.729 271.8C408.129 283.4 413.329 298 413.329 315.6C413.329 340.4 403.929 360.8 385.129 376.8C366.329 392.8 341.929 400.8 311.929 400.8Z"/>
                                <path d="M103.864 167.6H78.6643V105.2H171.664V400.2H103.864V167.6Z"/>
                            </mask>
                            <path d="M311.929 400.8C281.129 400.8 255.929 392.4 236.329 375.6C217.129 358.8 207.529 337 207.529 310.2H277.729C277.729 318.2 280.729 324.8 286.729 330C292.729 335.2 300.729 337.8 310.729 337.8C320.329 337.8 328.129 335 334.129 329.4C340.529 323.8 343.729 316.6 343.729 307.8C343.729 299.8 340.929 293.2 335.329 288C329.729 282.8 322.529 280.2 313.729 280.2H276.529V218.4H313.729C320.529 218.4 326.329 216 331.129 211.2C335.929 206.4 338.329 200.4 338.329 193.2C338.329 184.8 335.729 178.2 330.529 173.4C325.329 168.6 318.729 166.2 310.729 166.2C303.529 166.2 297.329 168.4 292.129 172.8C287.329 177.2 284.929 182.8 284.929 189.6H218.329C218.329 164.8 227.129 144.6 244.729 129C262.329 113 284.929 105 312.529 105C340.129 105 362.529 112.2 379.729 126.6C397.329 141 406.129 160 406.129 183.6C406.129 200.8 401.529 214.8 392.329 225.6C383.129 236 371.329 243.2 356.929 247.2C374.129 252 387.729 260.2 397.729 271.8C408.129 283.4 413.329 298 413.329 315.6C413.329 340.4 403.929 360.8 385.129 376.8C366.329 392.8 341.929 400.8 311.929 400.8Z" fill="currentColor"/>
                            <path d="M103.864 167.6H78.6643V105.2H171.664V400.2H103.864V167.6Z" fill="currentColor"/>
                            <path d="M311.929 400.8C281.129 400.8 255.929 392.4 236.329 375.6C217.129 358.8 207.529 337 207.529 310.2H277.729C277.729 318.2 280.729 324.8 286.729 330C292.729 335.2 300.729 337.8 310.729 337.8C320.329 337.8 328.129 335 334.129 329.4C340.529 323.8 343.729 316.6 343.729 307.8C343.729 299.8 340.929 293.2 335.329 288C329.729 282.8 322.529 280.2 313.729 280.2H276.529V218.4H313.729C320.529 218.4 326.329 216 331.129 211.2C335.929 206.4 338.329 200.4 338.329 193.2C338.329 184.8 335.729 178.2 330.529 173.4C325.329 168.6 318.729 166.2 310.729 166.2C303.529 166.2 297.329 168.4 292.129 172.8C287.329 177.2 284.929 182.8 284.929 189.6H218.329C218.329 164.8 227.129 144.6 244.729 129C262.329 113 284.929 105 312.529 105C340.129 105 362.529 112.2 379.729 126.6C397.329 141 406.129 160 406.129 183.6C406.129 200.8 401.529 214.8 392.329 225.6C383.129 236 371.329 243.2 356.929 247.2C374.129 252 387.729 260.2 397.729 271.8C408.129 283.4 413.329 298 413.329 315.6C413.329 340.4 403.929 360.8 385.129 376.8C366.329 392.8 341.929 400.8 311.929 400.8Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-4-mask)"/>
                            <path d="M103.864 167.6H78.6643V105.2H171.664V400.2H103.864V167.6Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-4-mask)"/>
                        </g>
                        
                        <g class="mix-blend-hard-light transition-all delay-400 opacity-100 duration-750 starting:opacity-0 motion-safe:starting:-translate-x-[102px] text-[#F3BEC7] dark:text-[#4B0600]">
                            <mask id="path-5-mask" maskUnits="userSpaceOnUse" x="102.329" y="103" width="338" height="299" fill="black">
                                <rect fill="white" x="102.329" y="103" width="338" height="299"/>
                                <path d="M337.593 400.8C306.793 400.8 281.593 392.4 261.993 375.6C242.793 358.8 233.193 337 233.193 310.2H303.393C303.393 318.2 306.393 324.8 312.393 330C318.393 335.2 326.393 337.8 336.393 337.8C345.993 337.8 353.793 335 359.793 329.4C366.193 323.8 369.393 316.6 369.393 307.8C369.393 299.8 366.593 293.2 360.993 288C355.393 282.8 348.193 280.2 339.393 280.2H302.193V218.4H339.393C346.193 218.4 351.993 216 356.793 211.2C361.593 206.4 363.993 200.4 363.993 193.2C363.993 184.8 361.393 178.2 356.193 173.4C350.993 168.6 344.393 166.2 336.393 166.2C329.193 166.2 322.993 168.4 317.793 172.8C312.993 177.2 310.593 182.8 310.593 189.6H243.993C243.993 164.8 252.793 144.6 270.393 129C287.993 113 310.593 105 338.193 105C365.793 105 388.193 112.2 405.393 126.6C422.993 141 431.793 160 431.793 183.6C431.793 200.8 427.193 214.8 417.993 225.6C408.793 236 396.993 243.2 382.593 247.2C399.793 252 413.393 260.2 423.393 271.8C433.793 283.4 438.993 298 438.993 315.6C438.993 340.4 429.593 360.8 410.793 376.8C391.993 392.8 367.593 400.8 337.593 400.8Z"/>
                                <path d="M129.529 167.6H104.329V105.2H197.329V400.2H129.529V167.6Z"/>
                            </mask>
                            <path d="M337.593 400.8C306.793 400.8 281.593 392.4 261.993 375.6C242.793 358.8 233.193 337 233.193 310.2H303.393C303.393 318.2 306.393 324.8 312.393 330C318.393 335.2 326.393 337.8 336.393 337.8C345.993 337.8 353.793 335 359.793 329.4C366.193 323.8 369.393 316.6 369.393 307.8C369.393 299.8 366.593 293.2 360.993 288C355.393 282.8 348.193 280.2 339.393 280.2H302.193V218.4H339.393C346.193 218.4 351.993 216 356.793 211.2C361.593 206.4 363.993 200.4 363.993 193.2C363.993 184.8 361.393 178.2 356.193 173.4C350.993 168.6 344.393 166.2 336.393 166.2C329.193 166.2 322.993 168.4 317.793 172.8C312.993 177.2 310.593 182.8 310.593 189.6H243.993C243.993 164.8 252.793 144.6 270.393 129C287.993 113 310.593 105 338.193 105C365.793 105 388.193 112.2 405.393 126.6C422.993 141 431.793 160 431.793 183.6C431.793 200.8 427.193 214.8 417.993 225.6C408.793 236 396.993 243.2 382.593 247.2C399.793 252 413.393 260.2 423.393 271.8C433.793 283.4 438.993 298 438.993 315.6C438.993 340.4 429.593 360.8 410.793 376.8C391.993 392.8 367.593 400.8 337.593 400.8Z" fill="currentColor"/>
                            <path d="M129.529 167.6H104.329V105.2H197.329V400.2H129.529V167.6Z" fill="currentColor"/>
                            <path d="M337.593 400.8C306.793 400.8 281.593 392.4 261.993 375.6C242.793 358.8 233.193 337 233.193 310.2H303.393C303.393 318.2 306.393 324.8 312.393 330C318.393 335.2 326.393 337.8 336.393 337.8C345.993 337.8 353.793 335 359.793 329.4C366.193 323.8 369.393 316.6 369.393 307.8C369.393 299.8 366.593 293.2 360.993 288C355.393 282.8 348.193 280.2 339.393 280.2H302.193V218.4H339.393C346.193 218.4 351.993 216 356.793 211.2C361.593 206.4 363.993 200.4 363.993 193.2C363.993 184.8 361.393 178.2 356.193 173.4C350.993 168.6 344.393 166.2 336.393 166.2C329.193 166.2 322.993 168.4 317.793 172.8C312.993 177.2 310.593 182.8 310.593 189.6H243.993C243.993 164.8 252.793 144.6 270.393 129C287.993 113 310.593 105 338.193 105C365.793 105 388.193 112.2 405.393 126.6C422.993 141 431.793 160 431.793 183.6C431.793 200.8 427.193 214.8 417.993 225.6C408.793 236 396.993 243.2 382.593 247.2C399.793 252 413.393 260.2 423.393 271.8C433.793 283.4 438.993 298 438.993 315.6C438.993 340.4 429.593 360.8 410.793 376.8C391.993 392.8 367.593 400.8 337.593 400.8Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-5-mask)"/>
                            <path d="M129.529 167.6H104.329V105.2H197.329V400.2H129.529V167.6Z" stroke="var(--stroke-color)" stroke-width="2.4" mask="url(#path-5-mask)"/>
                        </g>
                    </svg>
                    <div class="absolute inset-0 rounded-t-lg lg:rounded-t-none lg:rounded-r-lg shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d]"></div>
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
<html lang="tr">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Quizion – Online Sınav Sistemi</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,600;0,700;0,800;0,900;1,700&family=Baloo+2:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
  /* ══════════════════════════════════════════
     DESIGN TOKENS — Ortaokul Teması
     Mor + Turuncu + Sarı + Yeşil aksanlar
  ══════════════════════════════════════════ */
  :root {
    --purple:       #7c3aed;
    --purple-light: #a855f7;
    --purple-pale:  #f3e8ff;
    --purple-dark:  #4c1d95;
    --orange:       #f97316;
    --orange-light: #fb923c;
    --orange-pale:  #fff7ed;
    --yellow:       #fbbf24;
    --yellow-pale:  #fffbeb;
    --green:        #10b981;
    --green-pale:   #ecfdf5;
    --pink:         #ec4899;
    --pink-pale:    #fdf2f8;
    --sky:          #0ea5e9;
    --sky-pale:     #f0f9ff;
    --white:        #ffffff;
    --off-white:    #fafafa;
    --gray-50:      #f9fafb;
    --gray-100:     #f3f4f6;
    --gray-200:     #e5e7eb;
    --gray-400:     #9ca3af;
    --gray-500:     #6b7280;
    --gray-700:     #374151;
    --gray-900:     #111827;
    --text:         #1e1b4b;
    --card-shadow:  0 4px 20px rgba(124,58,237,0.12);
    --card-shadow-hover: 0 12px 36px rgba(124,58,237,0.22);
    --radius-xl:    20px;
    --radius-2xl:   28px;
    --radius-full:  9999px;
  }

  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  html { scroll-behavior: smooth; }

  body {
    font-family: 'Nunito', sans-serif;
    background: var(--white);
    color: var(--text);
    overflow-x: hidden;
  }

  /* Page Router */
  .page { display: none; }
  .page.active { display: block; }

  /* ══════════════════════════════════════════
     NAVBAR
  ══════════════════════════════════════════ */
  .navbar {
    position: sticky; top: 0; z-index: 200;
    height: 70px;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-bottom: 2px solid var(--purple-pale);
    display: flex; align-items: center;
    padding: 0 5%;
    gap: 16px;
    transition: box-shadow .3s;
  }
  .navbar.scrolled {
    box-shadow: 0 4px 24px rgba(124,58,237,0.12);
  }

  /* Logo */
  .nav-logo {
    display: flex; align-items: center; gap: 10px;
    text-decoration: none; cursor: pointer; flex-shrink: 0;
    margin-right: 8px;
  }
  .nav-logo-icon {
    width: 42px; height: 42px;
    background: linear-gradient(135deg, var(--purple), var(--purple-light));
    border-radius: 14px;
    display: flex; align-items: center; justify-content: center;
    color: white; font-family: 'Baloo 2', cursive; font-weight: 800; font-size: 1.3rem;
    box-shadow: 0 4px 14px rgba(124,58,237,0.4);
    transition: transform .25s;
    position: relative;
  }
  .nav-logo-icon::after {
    content: '✦';
    position: absolute; top: -5px; right: -5px;
    font-size: .5rem; color: var(--yellow);
    animation: twinkle 2s ease-in-out infinite;
  }
  @keyframes twinkle {
    0%,100% { opacity:1; transform:scale(1); }
    50% { opacity:.4; transform:scale(1.4); }
  }
  .nav-logo:hover .nav-logo-icon { transform: rotate(-8deg) scale(1.08); }
  .nav-logo-text {
    font-family: 'Baloo 2', cursive; font-weight: 800; font-size: 1.35rem;
    color: var(--purple-dark); line-height: 1;
  }
  .nav-logo-text span { color: var(--orange); }

  /* Desktop nav links */
  .nav-links {
    display: flex; align-items: center; gap: 2px;
    list-style: none; flex: 1;
  }
  .nav-links a {
    display: flex; align-items: center; gap: 6px;
    padding: 7px 14px; border-radius: var(--radius-full);
    font-size: .875rem; font-weight: 700; color: var(--gray-500);
    text-decoration: none; transition: all .2s; white-space: nowrap;
  }
  .nav-links a .nav-emoji { font-size: 1rem; transition: transform .2s; }
  .nav-links a:hover { color: var(--purple); background: var(--purple-pale); }
  .nav-links a:hover .nav-emoji { transform: scale(1.25) rotate(-8deg); }
  .nav-links a.active {
    color: var(--purple); background: var(--purple-pale); font-weight: 800;
  }

  /* Nav right */
  .nav-right { display: flex; align-items: center; gap: 10px; margin-left: auto; }

  /* Nav Buttons */
  .nav-btn-login {
    padding: 8px 20px; border-radius: var(--radius-full);
    border: 2px solid var(--purple); color: var(--purple);
    background: transparent; font-size: .875rem; font-weight: 800;
    cursor: pointer; font-family: 'Nunito', sans-serif; transition: all .2s;
  }
  .nav-btn-login:hover { background: var(--purple); color: white; transform: translateY(-1px); }

  .nav-btn-register {
    padding: 9px 22px; border-radius: var(--radius-full);
    border: none;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; font-size: .875rem; font-weight: 800;
    cursor: pointer; font-family: 'Nunito', sans-serif;
    box-shadow: 0 4px 14px rgba(124,58,237,0.35);
    transition: all .25s;
  }
  .nav-btn-register:hover { transform: translateY(-2px); box-shadow: 0 8px 22px rgba(124,58,237,0.45); }

  /* User avatar */
  .user-menu { position: relative; }
  .user-avatar-btn {
    display: flex; align-items: center; gap: 10px;
    background: var(--purple-pale); border: 2px solid var(--purple-pale);
    border-radius: var(--radius-full); padding: 6px 16px 6px 8px;
    cursor: pointer; transition: all .2s; font-family: 'Nunito', sans-serif;
  }
  .user-avatar-btn:hover { border-color: var(--purple); background: white; }
  .avatar-circle {
    width: 34px; height: 34px;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    border-radius: 50%; display: flex; align-items: center; justify-content: center;
    color: white; font-weight: 900; font-size: .8rem;
  }
  .user-info-text { text-align: left; }
  .user-name-text { font-size: .82rem; font-weight: 800; color: var(--purple-dark); display: block; }
  .user-role-text { font-size: .7rem; color: var(--gray-400); display: block; }

  .user-dropdown {
    position: absolute; right: 0; top: calc(100% + 12px);
    background: white; border: 2px solid var(--purple-pale); border-radius: var(--radius-xl);
    padding: 8px; min-width: 220px;
    box-shadow: 0 16px 48px rgba(124,58,237,0.18);
    display: none; z-index: 300; animation: dropIn .2s ease;
  }
  .user-dropdown.open { display: block; }
  @keyframes dropIn { from { opacity:0; transform:translateY(-10px); } to { opacity:1; transform:translateY(0); } }

  .dd-item {
    display: flex; align-items: center; gap: 10px;
    padding: 10px 14px; border-radius: 12px;
    font-size: .875rem; font-weight: 700; color: var(--gray-700);
    cursor: pointer; transition: all .15s;
    border: none; background: none; width: 100%; font-family: 'Nunito', sans-serif;
  }
  .dd-item:hover { background: var(--purple-pale); color: var(--purple); }
  .dd-item.danger { color: #ef4444; }
  .dd-item.danger:hover { background: #fef2f2; }
  .dd-sep { height: 1px; background: var(--gray-100); margin: 6px 4px; }

  /* Hamburger button */
  .ham-btn {
    width: 42px; height: 42px; border-radius: 12px;
    background: var(--purple-pale); border: 2px solid var(--purple-pale);
    display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 5px;
    cursor: pointer; transition: all .2s; padding: 10px; flex-shrink: 0;
  }
  .ham-btn:hover { background: white; border-color: var(--purple); }
  .ham-btn span {
    display: block; width: 18px; height: 2px;
    background: var(--purple); border-radius: 4px; transition: all .3s;
  }

  /* ══════════════════════════════════════════
     HAMBURGER PANEL
  ══════════════════════════════════════════ */
  .ham-overlay {
    position: fixed; inset: 0;
    background: rgba(76,29,149,0.35); backdrop-filter: blur(6px);
    z-index: 400; opacity: 0; pointer-events: none; transition: opacity .3s;
  }
  .ham-overlay.open { opacity: 1; pointer-events: all; }

  .ham-panel {
    position: fixed; top: 0; right: 0; height: 100vh; width: 300px;
    background: white; z-index: 500;
    transform: translateX(100%);
    transition: transform .35s cubic-bezier(.4,0,.2,1);
    display: flex; flex-direction: column;
    box-shadow: -12px 0 48px rgba(124,58,237,0.18);
    border-left: 3px solid var(--purple-pale);
  }
  .ham-panel.open { transform: translateX(0); }

  .ham-top {
    display: flex; align-items: center; justify-content: space-between;
    padding: 18px 20px 16px;
    border-bottom: 2px solid var(--purple-pale);
    background: linear-gradient(135deg, var(--purple-pale), #fdf4ff);
  }
  .ham-logo { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: 1.15rem; }
  .ham-logo span { color: var(--orange); }
  .ham-close {
    width: 36px; height: 36px; border-radius: 10px;
    background: white; border: 2px solid var(--purple-pale);
    cursor: pointer; font-size: 1rem; color: var(--purple);
    display: flex; align-items: center; justify-content: center; transition: all .2s;
  }
  .ham-close:hover { background: #fef2f2; border-color: #fca5a5; color: #ef4444; }

  .ham-body { flex: 1; overflow-y: auto; padding: 14px 12px; }

  .ham-section {
    font-size: .7rem; font-weight: 900; color: var(--purple-light);
    letter-spacing: 2px; text-transform: uppercase;
    padding: 0 12px; margin: 6px 0 8px;
  }

  .ham-item {
    display: flex; align-items: center; gap: 12px;
    padding: 11px 14px; border-radius: 14px; margin-bottom: 3px;
    font-size: .9rem; font-weight: 700; color: var(--gray-700);
    cursor: pointer; transition: all .18s;
    border: none; background: none; width: 100%; font-family: 'Nunito', sans-serif;
    text-align: left;
  }
  .ham-item:hover { background: var(--purple-pale); color: var(--purple); }
  .ham-item:hover .ham-item-icon { transform: scale(1.2) rotate(-5deg); }

  .ham-item-icon {
    width: 40px; height: 40px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; flex-shrink: 0; transition: transform .2s;
  }
  .hi-purple { background: var(--purple-pale); }
  .hi-orange { background: var(--orange-pale); }
  .hi-green  { background: var(--green-pale); }
  .hi-yellow { background: var(--yellow-pale); }
  .hi-pink   { background: var(--pink-pale); }
  .hi-sky    { background: var(--sky-pale); }

  .ham-item-info strong { display: block; font-size: .88rem; font-weight: 800; color: var(--gray-900); }
  .ham-item-info span   { display: block; font-size: .73rem; color: var(--gray-400); margin-top: 1px; }

  .ham-sep { height: 2px; background: var(--purple-pale); border-radius: 2px; margin: 12px 4px; }

  .ham-footer {
    padding: 16px; border-top: 2px solid var(--purple-pale);
    display: flex; flex-direction: column; gap: 10px;
    background: linear-gradient(135deg, var(--purple-pale), #fdf4ff);
  }
  .ham-footer-btn-login {
    width: 100%; padding: 12px; border-radius: var(--radius-full);
    border: 2px solid var(--purple); color: var(--purple); background: white;
    font-size: .9rem; font-weight: 800; cursor: pointer; font-family: 'Nunito', sans-serif;
    transition: all .2s;
  }
  .ham-footer-btn-login:hover { background: var(--purple); color: white; }
  .ham-footer-btn-reg {
    width: 100%; padding: 12px; border-radius: var(--radius-full);
    border: none;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; font-size: .9rem; font-weight: 800;
    cursor: pointer; font-family: 'Nunito', sans-serif;
    box-shadow: 0 4px 14px rgba(124,58,237,0.3); transition: all .25s;
  }
  .ham-footer-btn-reg:hover { transform: translateY(-2px); }

  /* ══════════════════════════════════════════
     AUTH MODal
  ══════════════════════════════════════════ */
  .auth-modal-bg {
    position: fixed; inset: 0;
    background: rgba(76,29,149,0.45); backdrop-filter: blur(8px);
    z-index: 600; display: none; align-items: center; justify-content: center; padding: 20px;
  }
  .auth-modal-bg.open { display: flex; }

  .auth-modal-box {
    background: white; border-radius: var(--radius-2xl); padding: 44px 36px;
    max-width: 420px; width: 100%; position: relative;
    box-shadow: 0 24px 80px rgba(124,58,237,0.28);
    animation: modalPop .35s cubic-bezier(.34,1.56,.64,1);
    border: 3px solid var(--purple-pale);
  }
  @keyframes modalPop {
    from { opacity:0; transform:scale(.85) translateY(28px); }
    to   { opacity:1; transform:scale(1)   translateY(0); }
  }
  .modal-x {
    position: absolute; top: 16px; right: 16px;
    width: 34px; height: 34px; border-radius: 50%;
    background: var(--purple-pale); border: none; cursor: pointer;
    font-size: .95rem; color: var(--purple);
    display: flex; align-items: center; justify-content: center; transition: all .2s;
  }
  .modal-x:hover { background: #fef2f2; color: #ef4444; }

  .modal-sticker {
    width: 80px; height: 80px;
    background: linear-gradient(135deg, var(--purple-pale), var(--orange-pale));
    border-radius: 24px;
    display: flex; align-items: center; justify-content: center;
    font-size: 2.5rem; margin: 0 auto 20px;
    animation: wobble 3s ease-in-out infinite;
  }
  @keyframes wobble {
    0%,100% { transform:rotate(0deg) scale(1); }
    25% { transform:rotate(-6deg) scale(1.05); }
    75% { transform:rotate(6deg)  scale(1.05); }
  }
  .auth-modal-box h2 {
    font-family: 'Baloo 2', cursive; font-size: 1.65rem; font-weight: 800;
    color: var(--purple-dark); text-align: center; margin-bottom: 8px;
  }
  .auth-modal-box .modal-sub {
    color: var(--gray-500); font-size: .9rem; text-align: center; line-height: 1.65; margin-bottom: 28px;
    font-weight: 600;
  }
  .modal-btn-main {
    width: 100%; padding: 14px;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; border: none; border-radius: var(--radius-full);
    font-size: .95rem; font-weight: 800; cursor: pointer; font-family: 'Nunito', sans-serif;
    transition: all .2s; margin-bottom: 10px;
  }
  .modal-btn-main:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(124,58,237,0.35); }
  .modal-btn-sec {
    width: 100%; padding: 13px;
    background: white; color: var(--purple);
    border: 2px solid var(--purple); border-radius: var(--radius-full);
    font-size: .95rem; font-weight: 800; cursor: pointer; font-family: 'Nunito', sans-serif;
    transition: all .2s;
  }
  .modal-btn-sec:hover { background: var(--purple); color: white; }
  .modal-note {
    font-size: .76rem; color: var(--gray-400); text-align: center; margin-top: 14px; font-weight: 600;
  }

  /* ══════════════════════════════════════════
     AUTH PAGES (Login / Register)
  ══════════════════════════════════════════ */
  .auth-page { min-height: 100vh; display: flex; }
  .auth-left {
    width: 44%;
    background: linear-gradient(160deg, var(--purple-dark) 0%, var(--purple) 50%, #6d28d9 100%);
    display: flex; flex-direction: column; justify-content: center; align-items: center;
    padding: 60px 44px; position: relative; overflow: hidden;
  }
  /* decorative blobs */
  .auth-left::before {
    content: ''; position: absolute; top: -80px; right: -80px;
    width: 380px; height: 380px; border-radius: 50%;
    background: radial-gradient(circle, rgba(251,191,36,0.25) 0%, transparent 65%);
  }
  .auth-left::after {
    content: ''; position: absolute; bottom: -60px; left: -40px;
    width: 260px; height: 260px; border-radius: 50%;
    background: radial-gradient(circle, rgba(236,72,153,0.22) 0%, transparent 65%);
  }
  /* floating emojis decoration */
  .auth-deco {
    position: absolute; font-size: 2rem; opacity: .25;
    animation: floatDeco 4s ease-in-out infinite alternate;
  }
  .auth-deco:nth-child(1) { top:15%; left:10%; animation-delay:0s; }
  .auth-deco:nth-child(2) { top:30%; right:8%; animation-delay:.8s; font-size:1.5rem; }
  .auth-deco:nth-child(3) { bottom:20%; left:8%; animation-delay:1.6s; font-size:1.8rem; }
  .auth-deco:nth-child(4) { bottom:35%; right:12%; animation-delay:2.4s; font-size:1.2rem; }
  @keyframes floatDeco {
    from { transform:translateY(0) rotate(0deg); }
    to   { transform:translateY(-16px) rotate(12deg); }
  }

  .auth-left-content { position: relative; z-index: 1; text-align: center; color: white; }
  .auth-brand { display: inline-flex; align-items: center; gap: 10px; text-decoration: none; margin-bottom: 40px; }
  .auth-brand-icon {
    width: 46px; height: 46px; border-radius: 16px;
    background: rgba(255,255,255,0.2);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Baloo 2', cursive; font-weight: 800; font-size: 1.4rem; color: white;
    border: 2px solid rgba(255,255,255,0.3);
  }
  .auth-brand-name { font-family: 'Baloo 2', cursive; font-weight: 800; font-size: 1.4rem; color: white; }
  .auth-brand-name span { color: var(--yellow); }

  .auth-left h2 {
    font-family: 'Baloo 2', cursive; font-size: 1.9rem; font-weight: 800;
    line-height: 1.25; margin-bottom: 14px;
  }
  .auth-left h2 span { color: var(--yellow); }
  .auth-left-desc { color: rgba(255,255,255,0.75); font-size: .95rem; line-height: 1.75; max-width: 310px; margin: 0 auto 36px; font-weight: 600; }

  .auth-perks { display: flex; flex-direction: column; gap: 12px; text-align: left; }
  .auth-perk {
    display: flex; align-items: center; gap: 12px;
    background: rgba(255,255,255,0.10); border: 1.5px solid rgba(255,255,255,0.18);
    border-radius: 16px; padding: 14px 16px;
    transition: background .2s;
  }
  .auth-perk:hover { background: rgba(255,255,255,0.16); }
  .auth-perk-icon {
    width: 40px; height: 40px; border-radius: 12px;
    background: rgba(255,255,255,0.18);
    display: flex; align-items: center; justify-content: center; font-size: 1.15rem; flex-shrink: 0;
  }
  .auth-perk strong { display: block; color: white; font-size: .88rem; font-weight: 800; }
  .auth-perk span   { color: rgba(255,255,255,0.6); font-size: .77rem; font-weight: 600; }

  .auth-right { flex: 1; display: flex; align-items: center; justify-content: center; padding: 60px 40px; background: var(--gray-50); }
  .auth-box { width: 100%; max-width: 430px; }

  .back-btn {
    display: inline-flex; align-items: center; gap: 6px;
    color: var(--gray-400); font-size: .85rem; font-weight: 700;
    background: none; border: none; cursor: pointer; margin-bottom: 28px;
    font-family: 'Nunito', sans-serif; transition: color .2s; padding: 0;
  }
  .back-btn:hover { color: var(--purple); }

  .auth-box h2 {
    font-family: 'Baloo 2', cursive; font-size: 1.85rem; font-weight: 800;
    color: var(--purple-dark); margin-bottom: 6px;
  }
  .auth-sub { color: var(--gray-400); font-size: .9rem; font-weight: 600; margin-bottom: 28px; line-height: 1.5; }
  .auth-sub a { color: var(--purple); text-decoration: none; font-weight: 800; }
  .auth-sub a:hover { text-decoration: underline; }

  .form-group { margin-bottom: 16px; }
  .form-group label { display: block; font-size: .84rem; font-weight: 800; color: var(--gray-700); margin-bottom: 7px; }
  .form-group input {
    width: 100%; padding: 13px 18px; border: 2px solid var(--gray-200); border-radius: 14px;
    font-size: .92rem; font-family: 'Nunito', sans-serif; color: var(--text); font-weight: 600;
    background: white; transition: border-color .2s, box-shadow .2s; outline: none;
  }
  .form-group input:focus { border-color: var(--purple); box-shadow: 0 0 0 4px rgba(124,58,237,0.10); }
  .form-group input::placeholder { color: #c4b5fd; }
  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }

  .form-options { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
  .check-label { display: flex; align-items: center; gap: 7px; font-size: .84rem; font-weight: 600; color: var(--gray-500); cursor: pointer; }
  .check-label input[type="checkbox"] { width: 16px; height: 16px; accent-color: var(--purple); }
  .forgot-link { font-size: .84rem; color: var(--purple); text-decoration: none; font-weight: 700; }
  .forgot-link:hover { text-decoration: underline; }

  .pw-wrap { position: relative; }
  .pw-wrap input { padding-right: 46px; }
  .pw-toggle {
    position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
    background: none; border: none; cursor: pointer; font-size: .95rem; padding: 0; color: var(--purple-light);
  }

  .auth-submit {
    width: 100%; padding: 14px;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; border: none; border-radius: var(--radius-full);
    font-size: .97rem; font-weight: 800; font-family: 'Nunito', sans-serif;
    cursor: pointer; transition: all .25s;
    box-shadow: 0 6px 18px rgba(124,58,237,0.32);
    display: flex; align-items: center; justify-content: center; gap: 8px;
  }
  .auth-submit:hover { transform: translateY(-2px); box-shadow: 0 10px 28px rgba(124,58,237,0.42); }

  .auth-divider {
    display: flex; align-items: center; gap: 14px;
    color: var(--gray-400); font-size: .8rem; font-weight: 700; margin: 20px 0;
  }
  .auth-divider::before, .auth-divider::after { content:''; flex:1; height:1.5px; background:var(--gray-200); }

  .social-btns { display: grid; grid-template-columns: 1fr 1fr; gap: 10px; }
  .social-btn {
    display: flex; align-items: center; justify-content: center; gap: 8px;
    padding: 11px 14px; border: 2px solid var(--gray-200); border-radius: 14px;
    background: white; font-size: .85rem; font-weight: 700; color: var(--gray-700);
    cursor: pointer; transition: all .2s; font-family: 'Nunito', sans-serif;
  }
  .social-btn:hover { border-color: var(--purple); background: var(--purple-pale); color: var(--purple); }
  .social-btn img { width: 18px; height: 18px; }

  .terms-note { font-size: .77rem; color: var(--gray-400); text-align: center; margin-top: 16px; line-height: 1.5; font-weight: 600; }
  .terms-note a { color: var(--purple); text-decoration: none; font-weight: 800; }

  .auth-msg {
    border-radius: 12px; padding: 11px 16px; font-size: .85rem; font-weight: 700; margin-bottom: 14px; display: none;
  }
  .auth-msg.error { background: #fef2f2; border: 1.5px solid #fca5a5; color: #dc2626; }
  .auth-msg.success { background: var(--green-pale); border: 1.5px solid #6ee7b7; color: #065f46; }
  .auth-msg.show { display: block; }

  /* ══════════════════════════════════════════
     HERO
  ══════════════════════════════════════════ */
  .hero {
    background: linear-gradient(160deg, var(--purple-dark) 0%, #6d28d9 45%, #7c3aed 70%, #8b5cf6 100%);
    min-height: 92vh; display: flex; align-items: center;
    padding: 60px 5% 50px; position: relative; overflow: hidden;
  }

  /* Geometric shapes background */
  .hero-shape-1 {
    position: absolute; top: -60px; right: -60px;
    width: 500px; height: 500px; border-radius: 50%;
    background: radial-gradient(circle, rgba(251,191,36,0.18) 0%, transparent 65%);
    pointer-events: none;
  }
  .hero-shape-2 {
    position: absolute; bottom: -80px; left: 0%;
    width: 400px; height: 400px; border-radius: 50%;
    background: radial-gradient(circle, rgba(236,72,153,0.18) 0%, transparent 65%);
    pointer-events: none;
  }
  .hero-shape-3 {
    position: absolute; top: 40%; right: 10%;
    width: 180px; height: 180px; border-radius: 50%;
    background: rgba(255,255,255,0.04);
    border: 2px dashed rgba(255,255,255,0.15);
    pointer-events: none;
    animation: spin 20s linear infinite;
  }
  @keyframes spin { from { transform:rotate(0deg); } to { transform:rotate(360deg); } }

  /* Floating emojis */
  .hero-float {
    position: absolute; font-size: 2rem; pointer-events: none;
    animation: heroFloat 5s ease-in-out infinite alternate;
    opacity: .55;
  }
  .hero-float:nth-child(4) { top:15%; left:3%;  animation-delay:0s;    font-size:1.8rem; }
  .hero-float:nth-child(5) { top:25%; right:5%; animation-delay:1.2s;  font-size:2.2rem; }
  .hero-float:nth-child(6) { bottom:20%; left:4%; animation-delay:2.4s; font-size:1.5rem; }
  .hero-float:nth-child(7) { bottom:30%; right:3%; animation-delay:.6s; font-size:2rem; }
  @keyframes heroFloat {
    from { transform:translateY(0) rotate(-5deg); }
    to   { transform:translateY(-20px) rotate(8deg); }
  }

  .hero-inner {
    max-width: 1200px; margin: 0 auto; width: 100%;
    display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center;
    position: relative; z-index: 1;
  }
  .hero-text { color: white; }

  .hero-badge {
    display: inline-flex; align-items: center; gap: 8px;
    background: rgba(255,255,255,0.15); border: 1.5px solid rgba(255,255,255,0.25);
    padding: 7px 18px; border-radius: var(--radius-full);
    font-size: .8rem; font-weight: 800; color: rgba(255,255,255,0.95);
    margin-bottom: 22px; letter-spacing: .5px;
    backdrop-filter: blur(8px);
  }

  .hero h1 {
    font-family: 'Baloo 2', cursive;
    font-size: clamp(2.2rem, 4vw, 3.2rem);
    font-weight: 800; line-height: 1.15; margin-bottom: 20px;
  }
  .hero h1 .h1-accent { color: var(--yellow); }
  .hero h1 .h1-accent2 { color: #fb923c; }

  .hero-desc {
    color: rgba(255,255,255,0.78); font-size: 1rem; line-height: 1.75;
    margin-bottom: 36px; max-width: 440px; font-weight: 600;
  }

  .hero-btns { display: flex; gap: 14px; flex-wrap: wrap; }
  .hero-cta {
    padding: 14px 32px; border: none; border-radius: var(--radius-full);
    background: linear-gradient(135deg, var(--orange), var(--yellow));
    color: white; font-size: 1rem; font-weight: 800; cursor: pointer;
    font-family: 'Nunito', sans-serif;
    box-shadow: 0 6px 20px rgba(249,115,22,0.45);
    transition: all .25s; display: flex; align-items: center; gap: 8px;
  }
  .hero-cta:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(249,115,22,0.55); }
  .hero-ghost {
    padding: 14px 28px; border: 2px solid rgba(255,255,255,0.35); border-radius: var(--radius-full);
    background: transparent; color: white; font-size: 1rem; font-weight: 800;
    cursor: pointer; font-family: 'Nunito', sans-serif; transition: all .25s;
    display: flex; align-items: center; gap: 8px;
  }
  .hero-ghost:hover { border-color: rgba(255,255,255,.85); background: rgba(255,255,255,.1); }

  .hero-trust { margin-top: 36px; display: flex; gap: 20px; flex-wrap: wrap; }
  .trust-pill {
    display: flex; align-items: center; gap: 7px;
    background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2);
    padding: 6px 14px; border-radius: var(--radius-full);
    font-size: .82rem; font-weight: 700; color: rgba(255,255,255,0.9);
  }

  /* Hero Card */
  .hero-card-wrap { position: relative; }
  .hero-card {
    background: white; border-radius: var(--radius-2xl); padding: 26px;
    box-shadow: 0 32px 80px rgba(76,29,149,0.35);
    animation: floatCard 4s ease-in-out infinite alternate;
    border: 3px solid rgba(255,255,255,0.8);
  }
  @keyframes floatCard {
    from { transform: translateY(0) rotate(-1deg); }
    to   { transform: translateY(-16px) rotate(1deg); }
  }
  .hc-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
  .hc-title { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: .97rem; }
  .hc-badge {
    background: var(--green-pale); color: var(--green); border-radius: var(--radius-full);
    padding: 4px 12px; font-size: .74rem; font-weight: 800;
  }
  .hc-stats { display: grid; grid-template-columns: repeat(4,1fr); gap: 10px; margin-bottom: 16px; }
  .hc-stat { border-radius: 14px; padding: 12px 8px; text-align: center; }
  .hcs-1 { background: var(--purple-pale); }
  .hcs-2 { background: var(--orange-pale); }
  .hcs-3 { background: var(--green-pale); }
  .hcs-4 { background: var(--yellow-pale); }
  .hc-stat .hc-val { font-family: 'Baloo 2', cursive; font-weight: 800; font-size: 1.1rem; color: var(--purple-dark); }
  .hc-stat .hc-lbl { font-size: .65rem; color: var(--gray-400); margin-top: 2px; font-weight: 700; }
  .hc-chart { background: var(--gray-50); border-radius: 14px; height: 80px; display: flex; align-items: flex-end; gap: 7px; padding: 10px 14px; overflow: hidden; }
  .hc-bar { border-radius: 6px 6px 0 0; flex: 1; transition: opacity .2s; }
  .hc-bar:hover { opacity: 1 !important; }
  .bar-p { background: linear-gradient(to top, var(--purple), var(--purple-light)); opacity: .7; }
  .bar-o { background: linear-gradient(to top, var(--orange), var(--yellow)); opacity: .85; }

  /* Floating sticker on card */
  .card-sticker {
    position: absolute; bottom: -18px; left: -28px;
    background: white; border-radius: 18px; padding: 11px 16px;
    box-shadow: 0 8px 32px rgba(124,58,237,0.2);
    border: 2px solid var(--purple-pale);
    display: flex; align-items: center; gap: 10px;
    animation: floatCard 3s ease-in-out infinite alternate;
    animation-delay: 2s;
  }
  .sticker-icon { width: 38px; height: 38px; background: var(--yellow-pale); border-radius: 11px; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; }
  .sticker-text strong { display: block; font-weight: 800; color: var(--purple-dark); font-size: .83rem; }
  .sticker-text span { color: var(--gray-400); font-size: .72rem; font-weight: 600; }

  /* Score badge */
  .score-sticker {
    position: absolute; top: -18px; right: -18px;
    background: linear-gradient(135deg, var(--orange), var(--yellow));
    border-radius: 18px; padding: 10px 16px;
    box-shadow: 0 8px 24px rgba(249,115,22,0.35);
    color: white; font-weight: 800; font-size: .82rem; font-family: 'Baloo 2', cursive;
    animation: floatCard 3.5s ease-in-out infinite alternate;
    animation-delay: 1s;
  }
  .score-sticker span { font-size: 1.4rem; display: block; line-height: 1; }

  /* ══════════════════════════════════════════
     SECTIONS
  ══════════════════════════════════════════ */
  .section { padding: 80px 5%; }
  .section-gray { background: var(--gray-50); }

  .section-head { text-align: center; max-width: 640px; margin: 0 auto 52px; }
  .section-tag {
    display: inline-flex; align-items: center; gap: 6px;
    background: var(--purple-pale); color: var(--purple);
    font-size: .76rem; font-weight: 900; letter-spacing: 2px;
    text-transform: uppercase; padding: 6px 16px; border-radius: var(--radius-full);
    margin-bottom: 14px;
  }
  .section-title {
    font-family: 'Baloo 2', cursive; font-size: clamp(1.75rem, 3vw, 2.4rem);
    font-weight: 800; color: var(--purple-dark); line-height: 1.2; margin-bottom: 14px;
  }
  .section-desc { color: var(--gray-500); font-size: .97rem; line-height: 1.72; font-weight: 600; }

  /* Feature Cards */
  .features-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px,1fr)); gap: 24px; max-width: 1100px; margin: 0 auto; }
  .feat-card {
    background: white; border-radius: var(--radius-xl); padding: 30px 24px;
    box-shadow: var(--card-shadow); border: 2px solid transparent;
    transition: all .28s; cursor: pointer;
  }
  .feat-card:hover { transform: translateY(-8px); box-shadow: var(--card-shadow-hover); border-color: var(--purple-pale); }
  .feat-card:hover .feat-icon { transform: scale(1.15) rotate(-8deg); }
  .feat-icon-wrap {
    width: 56px; height: 56px; border-radius: 18px;
    display: flex; align-items: center; justify-content: center; font-size: 1.7rem;
    margin-bottom: 18px; transition: transform .25s;
  }
  .fi-p { background: var(--purple-pale); }
  .fi-o { background: var(--orange-pale); }
  .fi-g { background: var(--green-pale); }
  .fi-y { background: var(--yellow-pale); }
  .fi-k { background: var(--pink-pale); }
  .fi-s { background: var(--sky-pale); }
  .feat-card h4 { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: 1.05rem; margin-bottom: 9px; }
  .feat-card p  { color: var(--gray-500); font-size: .88rem; line-height: 1.67; font-weight: 600; }

  /* Stats */
  .stats-band { background: linear-gradient(135deg, var(--purple-dark), var(--purple), #8b5cf6); padding: 72px 5%; }
  .stats-inner { max-width: 1100px; margin: 0 auto; display: flex; gap: 24px; align-items: center; flex-wrap: wrap; justify-content: space-between; }
  .stats-left h2 { font-family: 'Baloo 2', cursive; font-size: 1.65rem; font-weight: 800; color: white; max-width: 250px; line-height: 1.3; }
  .stats-left p { color: rgba(255,255,255,0.65); font-size: .88rem; margin-top: 8px; max-width: 230px; font-weight: 600; }
  .stats-nums { display: flex; gap: 44px; flex-wrap: wrap; }
  .stat-num-item { text-align: center; }
  .stat-big {
    font-family: 'Baloo 2', cursive; font-size: 2.6rem; font-weight: 800;
    color: var(--yellow); display: block; min-width: 80px; line-height: 1;
  }
  .stat-lbl { font-size: .82rem; color: rgba(255,255,255,0.65); margin-top: 6px; font-weight: 700; }

  /* Subjects */
  .subjects-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 18px; max-width: 700px; margin: 0 auto; }
  .subj-card {
    background: white; border: 2.5px solid var(--gray-100); border-radius: var(--radius-xl);
    padding: 30px 16px; text-align: center; cursor: pointer;
    transition: all .28s; box-shadow: var(--card-shadow);
    position: relative; overflow: hidden;
  }
  .subj-card::before {
    content: ''; position: absolute; inset: 0; opacity: 0;
    background: linear-gradient(135deg, var(--purple-pale), var(--orange-pale));
    transition: opacity .28s;
  }
  .subj-card:hover::before { opacity: 1; }
  .subj-card:hover { border-color: var(--purple); transform: translateY(-6px); box-shadow: var(--card-shadow-hover); }
  .subj-emoji {
    font-size: 2.2rem; display: block; margin-bottom: 12px;
    transition: transform .28s; position: relative; z-index: 1;
  }
  .subj-card:hover .subj-emoji { transform: scale(1.2) rotate(-8deg); }
  .subj-card h5 { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: .92rem; position: relative; z-index: 1; }

  /* Testimonials */
  .testi-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px,1fr)); gap: 22px; max-width: 1100px; margin: 0 auto; }
  .testi-card {
    background: white; border-radius: var(--radius-xl); padding: 28px 24px;
    box-shadow: var(--card-shadow); border: 2px solid transparent; transition: border-color .2s;
  }
  .testi-card:hover { border-color: var(--purple-pale); }
  .testi-stars { color: var(--yellow); font-size: 1rem; margin-bottom: 14px; letter-spacing: 3px; }
  .testi-quote { color: var(--gray-500); font-size: .92rem; line-height: 1.72; font-style: italic; margin-bottom: 20px; font-weight: 600; }
  .testi-author { display: flex; align-items: center; gap: 12px; }
  .testi-ava {
    width: 44px; height: 44px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    color: white; font-weight: 900; font-size: .9rem; flex-shrink: 0;
  }
  .av-purple { background: linear-gradient(135deg, var(--purple), var(--purple-light)); }
  .av-orange { background: linear-gradient(135deg, var(--orange), var(--yellow)); }
  .av-green  { background: linear-gradient(135deg, var(--green), #34d399); }
  .testi-name strong { display: block; font-size: .88rem; color: var(--purple-dark); font-weight: 800; }
  .testi-name span   { font-size: .77rem; color: var(--gray-400); font-weight: 600; }

  /* CTA Banner */
  .cta-wrap { padding: 0 5% 80px; }
  .cta-box {
    max-width: 1100px; margin: 0 auto;
    background: linear-gradient(135deg, var(--purple-dark), var(--purple), #8b5cf6);
    border-radius: var(--radius-2xl); padding: 56px 48px;
    display: flex; align-items: center; justify-content: space-between;
    gap: 28px; flex-wrap: wrap; position: relative; overflow: hidden;
  }
  .cta-box::before {
    content: ''; position: absolute; right: -50px; top: -50px;
    width: 280px; height: 280px; border-radius: 50%;
    background: radial-gradient(circle, rgba(251,191,36,0.2) 0%, transparent 65%);
  }
  .cta-box::after {
    content: ''; position: absolute; left: 40%; bottom: -60px;
    width: 220px; height: 220px; border-radius: 50%;
    background: radial-gradient(circle, rgba(236,72,153,0.18) 0%, transparent 65%);
  }
  .cta-left { display: flex; align-items: center; gap: 22px; position: relative; z-index: 1; }
  .cta-icon {
    width: 74px; height: 74px; border-radius: 24px;
    background: rgba(255,255,255,0.15); border: 2px solid rgba(255,255,255,0.2);
    display: flex; align-items: center; justify-content: center;
    font-size: 2.2rem; flex-shrink: 0;
    animation: wobble 4s ease-in-out infinite;
  }
  .cta-text h3 { font-family: 'Baloo 2', cursive; font-size: 1.5rem; font-weight: 800; color: white; }
  .cta-text p  { color: rgba(255,255,255,0.7); font-size: .92rem; margin-top: 6px; font-weight: 600; }
  .cta-btns { display: flex; gap: 12px; flex-wrap: wrap; position: relative; z-index: 1; }
  .cta-btn-main {
    padding: 13px 28px; background: linear-gradient(135deg, var(--orange), var(--yellow));
    color: white; font-weight: 800; border: none; border-radius: var(--radius-full);
    cursor: pointer; font-size: .93rem; font-family: 'Nunito', sans-serif;
    box-shadow: 0 6px 20px rgba(249,115,22,0.4); transition: all .2s;
  }
  .cta-btn-main:hover { transform: translateY(-2px); }
  .cta-btn-ghost {
    padding: 13px 26px; background: rgba(255,255,255,0.12);
    color: white; font-weight: 800; border: 2px solid rgba(255,255,255,0.3);
    border-radius: var(--radius-full); cursor: pointer; font-size: .93rem;
    font-family: 'Nunito', sans-serif; transition: all .2s;
  }
  .cta-btn-ghost:hover { background: rgba(255,255,255,0.22); border-color: rgba(255,255,255,.8); }

  /* ══════════════════════════════════════════
     FOOTER
  ══════════════════════════════════════════ */
  footer {
    background: var(--purple-dark);
    color: rgba(255,255,255,0.65); padding: 60px 5% 28px;
  }
  .footer-top { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 44px; }
  .footer-brand p { font-size: .85rem; line-height: 1.72; margin-top: 14px; max-width: 215px; font-weight: 600; }
  .footer-col h6 {
    font-family: 'Baloo 2', cursive; font-weight: 800; color: white;
    font-size: .82rem; letter-spacing: .8px; margin-bottom: 16px; text-transform: uppercase;
  }
  .footer-col a {
    display: block; text-decoration: none; color: rgba(255,255,255,0.55);
    font-size: .83rem; margin-bottom: 10px; transition: color .2s; cursor: pointer; font-weight: 600;
  }
  .footer-col a:hover { color: var(--yellow); }
  .footer-bottom {
    border-top: 1px solid rgba(255,255,255,0.10); padding-top: 22px;
    display: flex; justify-content: space-between; align-items: center;
    flex-wrap: wrap; gap: 8px; font-size: .8rem; font-weight: 600;
  }
  .footer-logo { display: flex; align-items: center; gap: 9px; margin-bottom: 14px; }
  .footer-logo-icon {
    width: 40px; height: 40px; border-radius: 13px;
    background: rgba(255,255,255,0.12); border: 2px solid rgba(255,255,255,0.2);
    display: flex; align-items: center; justify-content: center;
    font-family: 'Baloo 2', cursive; font-weight: 800; color: white; font-size: 1.1rem;
  }
  .footer-logo-name { font-family: 'Baloo 2', cursive; font-weight: 800; color: white; font-size: 1.2rem; }
  .footer-logo-name span { color: var(--yellow); }

  /* ══════════════════════════════════════════
     INNER PAGES (Dashboard / Library / Explore)
  ══════════════════════════════════════════ */
  .inner-page { background: var(--gray-50); min-height: calc(100vh - 70px); padding: 40px 5%; }
  .page-title { font-family: 'Baloo 2', cursive; font-size: 1.65rem; font-weight: 800; color: var(--purple-dark); }
  .page-sub   { color: var(--gray-400); font-size: .9rem; margin-top: 4px; font-weight: 600; }
  .page-header { margin-bottom: 30px; }

  .dash-stats-grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 18px; margin-bottom: 30px; max-width: 1200px; }
  .dash-stat {
    background: white; border-radius: var(--radius-xl); padding: 22px 20px;
    box-shadow: var(--card-shadow); border: 2px solid transparent;
    transition: all .25s; cursor: pointer;
  }
  .dash-stat:hover { border-color: var(--purple-pale); transform: translateY(-4px); box-shadow: var(--card-shadow-hover); }
  .dash-stat .ds-icon { font-size: 1.8rem; margin-bottom: 10px; }
  .dash-stat .ds-val { font-family: 'Baloo 2', cursive; font-size: 1.85rem; font-weight: 800; color: var(--purple-dark); }
  .dash-stat .ds-lbl { color: var(--gray-400); font-size: .8rem; margin-top: 3px; font-weight: 700; }

  .qa-section { max-width: 1200px; }
  .qa-section h3 { font-family: 'Baloo 2', cursive; font-size: 1.1rem; font-weight: 800; color: var(--purple-dark); margin-bottom: 14px; }
  .qa-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px; }
  .qa-card {
    background: white; border-radius: var(--radius-xl); padding: 20px;
    box-shadow: var(--card-shadow); cursor: pointer; transition: all .25s;
    border: 2px solid transparent; display: flex; align-items: center; gap: 14px;
  }
  .qa-card:hover { transform: translateY(-4px); border-color: var(--purple); box-shadow: var(--card-shadow-hover); }
  .qa-icon {
    width: 48px; height: 48px; border-radius: 14px; background: var(--purple-pale);
    display: flex; align-items: center; justify-content: center; font-size: 1.4rem; flex-shrink: 0;
    transition: transform .25s;
  }
  .qa-card:hover .qa-icon { transform: scale(1.15) rotate(-6deg); }
  .qa-card h5 { font-family: 'Baloo 2', cursive; font-size: .92rem; font-weight: 800; color: var(--purple-dark); }
  .qa-card p  { font-size: .79rem; color: var(--gray-400); margin-top: 3px; font-weight: 600; }

  /* Library */
  .lib-search { display: flex; gap: 10px; margin-bottom: 26px; max-width: 1200px; }
  .lib-search input {
    flex: 1; padding: 12px 18px; border: 2px solid var(--gray-200); border-radius: var(--radius-full);
    font-size: .9rem; font-family: 'Nunito', sans-serif; background: white; outline: none;
    transition: border-color .2s; font-weight: 600;
  }
  .lib-search input:focus { border-color: var(--purple); }
  .lib-search button {
    padding: 12px 24px;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; border: none; border-radius: var(--radius-full);
    font-size: .9rem; font-weight: 800; cursor: pointer; font-family: 'Nunito', sans-serif;
    transition: all .2s;
  }
  .lib-search button:hover { transform: translateY(-1px); }
  .quiz-list { display: grid; grid-template-columns: repeat(auto-fill, minmax(290px,1fr)); gap: 18px; max-width: 1200px; }
  .quiz-card { background: white; border-radius: var(--radius-xl); padding: 22px; box-shadow: var(--card-shadow); border: 2px solid var(--gray-100); transition: all .25s; cursor: pointer; }
  .quiz-card:hover { transform: translateY(-5px); border-color: var(--purple-pale); box-shadow: var(--card-shadow-hover); }
  .quiz-top { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px; }
  .q-badge { font-size: .72rem; font-weight: 800; padding: 5px 12px; border-radius: var(--radius-full); }
  .qb-live  { background: #fef2f2; color: #ef4444; }
  .qb-test  { background: var(--purple-pale); color: var(--purple); }
  .qb-hw    { background: var(--green-pale); color: var(--green); }
  .quiz-card h4 { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: .97rem; margin-bottom: 7px; }
  .quiz-card p  { font-size: .82rem; color: var(--gray-400); margin-bottom: 14px; font-weight: 600; }
  .quiz-meta { display: flex; gap: 14px; font-size: .78rem; color: var(--gray-400); font-weight: 700; }

  /* Explore */
  .cat-tabs { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 26px; max-width: 1200px; }
  .cat-tab {
    padding: 8px 18px; border-radius: var(--radius-full); font-size: .84rem; font-weight: 800;
    border: 2px solid var(--gray-200); background: white; color: var(--gray-500);
    cursor: pointer; transition: all .2s; font-family: 'Nunito', sans-serif;
  }
  .cat-tab:hover, .cat-tab.active {
    background: linear-gradient(135deg, var(--purple), var(--orange));
    border-color: transparent; color: white;
  }
  .explore-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px,1fr)); gap: 18px; max-width: 1200px; }
  .exp-card { background: white; border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--card-shadow); border: 2px solid var(--gray-100); cursor: pointer; transition: all .25s; }
  .exp-card:hover { transform: translateY(-5px); border-color: var(--purple-pale); box-shadow: var(--card-shadow-hover); }
  .exp-img { height: 112px; display: flex; align-items: center; justify-content: center; font-size: 2.8rem; }
  .ei-p { background: linear-gradient(135deg, #f3e8ff, #ddd6fe); }
  .ei-o { background: linear-gradient(135deg, #fff7ed, #fed7aa); }
  .ei-g { background: linear-gradient(135deg, #ecfdf5, #a7f3d0); }
  .ei-y { background: linear-gradient(135deg, #fffbeb, #fde68a); }
  .exp-body { padding: 18px; }
  .exp-body h4 { font-family: 'Baloo 2', cursive; font-weight: 800; color: var(--purple-dark); font-size: .94rem; margin-bottom: 6px; }
  .exp-body p  { font-size: .8rem; color: var(--gray-400); margin-bottom: 12px; font-weight: 600; line-height: 1.55; }
  .exp-foot { display: flex; justify-content: space-between; align-items: center; }
  .exp-count { font-size: .78rem; color: var(--gray-400); font-weight: 700; }
  .start-btn {
    padding: 7px 16px;
    background: linear-gradient(135deg, var(--purple), var(--orange));
    color: white; border: none; border-radius: var(--radius-full);
    font-size: .79rem; font-weight: 800; cursor: pointer; font-family: 'Nunito', sans-serif;
    transition: all .2s;
  }
  .start-btn:hover { transform: scale(1.06); }

  /* S.S.S. */
  .faq-item { background: white; border-radius: var(--radius-xl); margin-bottom: 10px; border: 2px solid var(--gray-100); overflow: hidden; transition: border-color .2s; }
  .faq-item:hover { border-color: var(--purple-pale); }
  details[open].faq-item { border-color: var(--purple-pale); }
  .faq-q { display: flex; align-items: center; justify-content: space-between; padding: 18px 22px; cursor: pointer; font-weight: 800; color: var(--purple-dark); font-size: .92rem; list-style: none; user-select: none; }
  .faq-q::-webkit-details-marker { display: none; }
  .faq-arr { color: var(--purple-light); font-size: .8rem; transition: transform .3s; flex-shrink: 0; }
  details[open] .faq-arr { transform: rotate(180deg); }
  .faq-a { padding: 14px 22px 18px; color: var(--gray-500); font-size: .88rem; line-height: 1.72; border-top: 2px solid var(--gray-100); font-weight: 600; }

  /* Contact */
  .contact-form-box { background: white; border-radius: var(--radius-2xl); padding: 36px; box-shadow: var(--card-shadow); border: 2px solid var(--purple-pale); max-width: 560px; margin: 0 auto; }
  .contact-form-box textarea {
    width: 100%; padding: 13px 18px; border: 2px solid var(--gray-200); border-radius: 14px;
    font-size: .9rem; font-family: 'Nunito', sans-serif; color: var(--text); font-weight: 600;
    background: var(--gray-50); transition: border-color .2s; outline: none; resize: vertical; min-height: 120px;
  }
  .contact-form-box textarea:focus { border-color: var(--purple); }

  /* ══════════════════════════════════════════
     SCROLL REVEAL
  ══════════════════════════════════════════ */
  .reveal { opacity: 0; transform: translateY(28px); transition: opacity .6s ease, transform .6s ease; }
  .reveal.visible { opacity: 1; transform: translateY(0); }

  /* ══════════════════════════════════════════
     RESPONSIVE
  ══════════════════════════════════════════ */
  @media (max-width: 980px) {
    .auth-left { display: none; }
    .hero-inner { grid-template-columns: 1fr; text-align: center; }
    .hero-desc { margin: 0 auto 34px; }
    .hero-btns { justify-content: center; }
    .hero-card-wrap { margin-top: 44px; }
    .nav-links { display: none; }
    .footer-top { grid-template-columns: 1fr 1fr; }
    .dash-stats-grid, .qa-grid { grid-template-columns: 1fr 1fr; }
  }
  @media (max-width: 540px) {
    .footer-top { grid-template-columns: 1fr; }
    .dash-stats-grid { grid-template-columns: 1fr 1fr; }
    .qa-grid { grid-template-columns: 1fr; }
    .subjects-grid { grid-template-columns: repeat(2,1fr); }
  }
  </style>
</head>
<body>

<!-- ══════════════════════════════════════════
     NAVBAR
══════════════════════════════════════════ -->
<nav class="navbar" id="mainNav" style="display:none;">

  <!-- Logo -->
  <a class="nav-logo" onclick="showPage('landing')">
    <div class="nav-logo-icon">Q</div>
    <div class="nav-logo-text">Quiz<span>ion</span></div>
  </a>

  <!-- Desktop Links -->
  <ul class="nav-links">
    <li>
      <a href="#" id="nav-landing" class="active" onclick="showPage('landing')">
        <span class="nav-emoji">🏠</span> Anasayfa
      </a>
    </li>
    <li>
      <a href="#" id="nav-library" onclick="authRequired('library')">
        <span class="nav-emoji">📚</span> Kütüphanem
      </a>
    </li>
    <li>
      <a href="#" id="nav-quick" onclick="authRequired('quick')">
        <span class="nav-emoji">⚡</span> Hızlı Erişim
      </a>
    </li>
    <li>
      <a href="#" id="nav-explore" onclick="authRequired('explore')">
        <span class="nav-emoji">🌍</span> Keşfet
      </a>
    </li>
    <li>
      <a href="#" onclick="showPage('login')">
        <span class="nav-emoji">🔑</span> Giriş Yap
      </a>
    </li>
  </ul>

  <!-- Right Side -->
  <div class="nav-right">

    <!-- Guest -->
    <div id="navGuest" style="display:flex;gap:8px;">
      <button class="nav-btn-login"    onclick="showPage('login')">Giriş Yap</button>
      <button class="nav-btn-register" onclick="showPage('register')">🚀 Ücretsiz Başla</button>
    </div>

    <!-- Logged-in User -->
    <div id="navUser" class="user-menu" style="display:none;">
      <button class="user-avatar-btn" onclick="toggleDrop()">
        <div class="avatar-circle" id="userInitial">U</div>
        <div class="user-info-text">
          <span class="user-name-text" id="userNameDisplay">Kullanıcı</span>
          <span class="user-role-text">Öğrenci</span>
        </div>
        <span style="color:var(--purple-light);font-size:.7rem;margin-left:4px;">▼</span>
      </button>
      <div class="user-dropdown" id="userDropdown">
        <button class="dd-item" onclick="showPage('home')">👤 Profilim</button>
        <button class="dd-item" onclick="showPage('library')">📚 Kütüphanem</button>
        <button class="dd-item" onclick="showPage('explore')">🌍 Keşfet</button>
        <div class="dd-sep"></div>
        <button class="dd-item danger" onclick="logout()">🚪 Çıkış Yap</button>
      </div>
    </div>

    <!-- Hamburger -->
    <button class="ham-btn" onclick="openHam()" aria-label="Menü">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- ══════════════════════════════════════════
     HAMBURGER PANEL
══════════════════════════════════════════ -->
<div class="ham-overlay" id="hamOverlay" onclick="closeHam()"></div>
<aside class="ham-panel" id="hamPanel">
  <div class="ham-top">
    <span class="ham-logo">Quiz<span>ion</span></span>
    <button class="ham-close" onclick="closeHam()">✕</button>
  </div>
  <div class="ham-body">

    <div class="ham-section">📌 Sayfalar</div>

    <button class="ham-item" onclick="showPage('landing');closeHam()">
      <div class="ham-item-icon hi-purple">🏠</div>
      <div class="ham-item-info"><strong>Anasayfa</strong><span>Quizion'a dön</span></div>
    </button>
    <button class="ham-item" onclick="authRequired('library');closeHam()">
      <div class="ham-item-icon hi-orange">📚</div>
      <div class="ham-item-info"><strong>Kütüphanem</strong><span>Sınavlarım ve ödevlerim</span></div>
    </button>
    <button class="ham-item" onclick="authRequired('quick');closeHam()">
      <div class="ham-item-icon hi-yellow">⚡</div>
      <div class="ham-item-info"><strong>Hızlı Erişim</strong><span>Son aktivitelerin</span></div>
    </button>
    <button class="ham-item" onclick="authRequired('explore');closeHam()">
      <div class="ham-item-icon hi-green">🌍</div>
      <div class="ham-item-info"><strong>Keşfet</strong><span>Binlerce sınav seni bekliyor</span></div>
    </button>

    <div class="ham-sep"></div>
    <div class="ham-section">❓ Yardım</div>

    <button class="ham-item" onclick="showPage('faq');closeHam()">
      <div class="ham-item-icon hi-sky">💡</div>
      <div class="ham-item-info"><strong>S.S.S.</strong><span>Sıkça sorulan sorular</span></div>
    </button>
    <button class="ham-item" onclick="showPage('contact');closeHam()">
      <div class="ham-item-icon hi-pink">📩</div>
      <div class="ham-item-info"><strong>İletişim</strong><span>Bize ulaşın</span></div>
    </button>

  </div>
  <div class="ham-footer" id="hamFooter">
    <button class="ham-footer-btn-login" onclick="showPage('login');closeHam()">Giriş Yap</button>
    <button class="ham-footer-btn-reg"   onclick="showPage('register');closeHam()">🚀 Ücretsiz Başla</button>
  </div>
</aside>

<!-- ══════════════════════════════════════════
     AUTH MODAL
══════════════════════════════════════════ -->
<div class="auth-modal-bg" id="authModal" onclick="handleModalClick(event)">
  <div class="auth-modal-box">
    <button class="modal-x" onclick="closeModal()">✕</button>
    <div class="modal-sticker">🔐</div>
    <h2>Önce Giriş Yapmalısın!</h2>
    <p class="modal-sub">Bu içeriğe erişmek için üye olman gerekiyor.<br>Hemen ücretsiz hesap aç veya giriş yap! 🎉</p>
    <button class="modal-btn-main" onclick="closeModal();showPage('register')">🚀 Ücretsiz Hesap Oluştur</button>
    <button class="modal-btn-sec"  onclick="closeModal();showPage('login')">Zaten Hesabım Var</button>
    <p class="modal-note">✅ Üyelik tamamen ücretsiz · Kredi kartı gerekmez</p>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: LANDING
══════════════════════════════════════════ -->
<div id="page-landing" class="page active">

  <!-- HERO -->
  <section class="hero">
    <div class="hero-shape-1"></div>
    <div class="hero-shape-2"></div>
    <div class="hero-shape-3"></div>
    <!-- floating decorations -->
    <span class="hero-float">🎯</span>
    <span class="hero-float">📖</span>
    <span class="hero-float">⭐</span>
    <span class="hero-float">🎉</span>

    <div class="hero-inner">
      <!-- LEFT: Text -->
      <div class="hero-text">
        <div class="hero-badge">✨ Ortaokul Öğrencilerine Özel Platform</div>
        <h1>
          Öğrenmek <span class="h1-accent">Artık</span><br>
          Çok Daha <span class="h1-accent2">Eğlenceli!</span>
        </h1>
        <p class="hero-desc">Yapay zeka destekli analizler, eğlenceli sınavlar ve gerçek zamanlı yarışmalarla derslerinde süper kahraman ol! 🦸</p>
        <div class="hero-btns">
          <button class="hero-cta" onclick="showPage('register')">Hemen Başla 🚀</button>
          <button class="hero-ghost">▶ Nasıl Çalışır?</button>
        </div>
        <div class="hero-trust">
          <div class="trust-pill">🎓 10K+ Öğrenci</div>
          <div class="trust-pill">📝 500+ Sınav</div>
          <div class="trust-pill">🏆 24/7 Destek</div>
        </div>
      </div>

      <!-- RIGHT: Card Visual -->
      <div class="hero-card-wrap">
        <div class="score-sticker"><span>%96</span>Başarı!</div>
        <div class="hero-card">
          <div class="hc-head">
            <div class="hc-title">🏅 Haftalık Performans</div>
            <div class="hc-badge">🔥 Harika!</div>
          </div>
          <div class="hc-stats">
            <div class="hc-stat hcs-1"><div class="hc-val">12</div><div class="hc-lbl">Sınav</div></div>
            <div class="hc-stat hcs-2"><div class="hc-val">%88</div><div class="hc-lbl">Başarı</div></div>
            <div class="hc-stat hcs-3"><div class="hc-val">450</div><div class="hc-lbl">Soru</div></div>
            <div class="hc-stat hcs-4"><div class="hc-val">8s</div><div class="hc-lbl">Çalışma</div></div>
          </div>
          <div class="hc-chart">
            <div class="hc-bar bar-p" style="height:38%"></div>
            <div class="hc-bar bar-p" style="height:56%"></div>
            <div class="hc-bar bar-o" style="height:82%"></div>
            <div class="hc-bar bar-p" style="height:47%"></div>
            <div class="hc-bar bar-p" style="height:70%"></div>
            <div class="hc-bar bar-o" style="height:95%"></div>
            <div class="hc-bar bar-p" style="height:60%"></div>
          </div>
        </div>
        <div class="card-sticker">
          <div class="sticker-icon">🏆</div>
          <div class="sticker-text">
            <strong>Yeni Rozet!</strong>
            <span>Matematik Dehası</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ÖZELLİKLER -->
  <section class="section section-gray">
    <div class="section-head reveal">
      <div class="section-tag">⚡ Özellikler</div>
      <h2 class="section-title">Öğrenmeyi Süper Güce Dönüştür!</h2>
      <p class="section-desc">Quizion ile dersler eğlenceye, başarı alışkanlığa dönüşüyor.</p>
    </div>
    <div class="features-grid">
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-p"><span class="feat-icon">📊</span></div>
        <h4>Akıllı Analiz</h4>
        <p>Yapay zeka hangi konuların üzerinde durman gerektiğini sana söylüyor. Boşuna çalışma bitti!</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-o"><span class="feat-icon">⚡</span></div>
        <h4>Canlı Yarışmalar</h4>
        <p>Sınıf arkadaşlarınla aynı anda yarış, sıralamada zirveye çık! En hızlı kim?</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-g"><span class="feat-icon">🎯</span></div>
        <h4>Konu Takibi</h4>
        <p>Hangi konuları bitirdiğini gör, ilerleme çubukları seni motive ediyor.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-y"><span class="feat-icon">🏆</span></div>
        <h4>Rozetler & Ödüller</h4>
        <p>Her başarın için özel rozet kazan, puan topla ve arkadaşlarına göster!</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-k"><span class="feat-icon">📱</span></div>
        <h4>Her Yerden Çalış</h4>
        <p>Tablet, telefon, bilgisayar — dilediğin cihazdan, dilediğin yerde çalış.</p>
      </div>
      <div class="feat-card reveal">
        <div class="feat-icon-wrap fi-s"><span class="feat-icon">👨‍👩‍👧</span></div>
        <h4>Aile Takibi</h4>
        <p>Annene babana gelişimini göster. Onlar da seninle gurur duysun!</p>
      </div>
    </div>
  </section>

  <!-- İSTATİSTİK SAYACI -->
  <section class="stats-band">
    <div class="stats-inner">
      <div class="stats-left reveal">
        <h2>Rakamlarla Quizion</h2>
        <p>Türkiye'nin en sevilen ortaokul sınav platformu.</p>
      </div>
      <div class="stats-nums">
        <div class="stat-num-item reveal">
          <span class="stat-big counter" data-target="50000000" data-suffix="">0</span>
          <div class="stat-lbl">Çözülen Soru</div>
        </div>
        <div class="stat-num-item reveal">
          <span class="stat-big counter" data-target="150000" data-suffix="">0</span>
          <div class="stat-lbl">Öğretmen</div>
        </div>
        <div class="stat-num-item reveal">
          <span class="stat-big counter" data-target="95" data-suffix="%">0</span>
          <div class="stat-lbl">Memnuniyet</div>
        </div>
        <div class="stat-num-item reveal">
          <span class="stat-big counter" data-target="10000" data-suffix="+">0</span>
          <div class="stat-lbl">Aktif Öğrenci</div>
        </div>
      </div>
    </div>
  </section>

  <!-- DERSLER -->
  <section class="section">
    <div class="section-head reveal">
      <div class="section-tag">📚 Dersler</div>
      <h2 class="section-title">Hangi Derste Zayıfsın?</h2>
      <p class="section-desc">Tüm ortaokul derslerine özel hazırlanmış binlerce soru seni bekliyor!</p>
    </div>
    <div class="subjects-grid">
      <div class="subj-card reveal"><span class="subj-emoji">🧬</span><h5>Fen Bilimleri</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">📐</span><h5>Matematik</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">🌍</span><h5>Sosyal Bilgiler</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">📖</span><h5>Türkçe</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">🇬🇧</span><h5>İngilizce</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">🕌</span><h5>Din Kültürü</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">🎨</span><h5>Görsel Sanatlar</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">🎵</span><h5>Müzik</h5></div>
      <div class="subj-card reveal"><span class="subj-emoji">💻</span><h5>Bilişim</h5></div>
    </div>
  </section>

  <!-- YORUMLAR -->
  <section class="section section-gray testimonials">
    <div class="section-head reveal">
      <div class="section-tag">💬 Yorumlar</div>
      <h2 class="section-title">Onlar Anlatsın!</h2>
    </div>
    <div class="testi-grid">
      <div class="testi-card reveal">
        <div class="testi-stars">★★★★★</div>
        <p class="testi-quote">"LGS'ye hazırlanırken en çok bu uygulamayı kullandım. Matematik notum 55'ten 90'a çıktı! Gerçekten işe yarıyor."</p>
        <div class="testi-author">
          <div class="testi-ava av-purple">M</div>
          <div class="testi-name"><strong>Mert Yılmaz</strong><span>8. Sınıf Öğrencisi</span></div>
        </div>
      </div>
      <div class="testi-card reveal">
        <div class="testi-stars">★★★★★</div>
        <p class="testi-quote">"Öğrencilerimin ödevlerini takip etmek çok kolaylaştı. Hangi konularda eksik olduklarını anında görüyorum."</p>
        <div class="testi-author">
          <div class="testi-ava av-orange">A</div>
          <div class="testi-name"><strong>Ayşe Demir</strong><span>Matematik Öğretmeni</span></div>
        </div>
      </div>
      <div class="testi-card reveal">
        <div class="testi-stars">★★★★★</div>
        <p class="testi-quote">"Canlı yarışmalar süper! Arkadaşlarımla yarışmak çok eğlenceli, ders çalışmak artık sıkıcı gelmiyor 😄"</p>
        <div class="testi-author">
          <div class="testi-ava av-green">Z</div>
          <div class="testi-name"><strong>Zeynep Kaya</strong><span>7. Sınıf Öğrencisi</span></div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <div class="cta-wrap">
    <div class="cta-box reveal">
      <div class="cta-left">
        <div class="cta-icon">🎁</div>
        <div class="cta-text">
          <h3>14 Gün Ücretsiz Dene!</h3>
          <p>Kredi kartı yok, taahhüt yok. Sadece öğren ve eğlen!</p>
        </div>
      </div>
      <div class="cta-btns">
        <button class="cta-btn-main" onclick="showPage('register')">🚀 Hemen Başla</button>
        <button class="cta-btn-ghost">Planları İncele</button>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    <div class="footer-top">
      <div class="footer-brand">
        <div class="footer-logo">
          <div class="footer-logo-icon">Q</div>
          <div class="footer-logo-name">Quiz<span>ion</span></div>
        </div>
        <p>Ortaokul öğrencileri için en eğlenceli ve akıllı sınav platformu. Başarı yolculuğunda yanındayız!</p>
      </div>
      <div class="footer-col">
        <h6>Platform</h6>
        <a href="#">Özellikler</a><a href="#">Sınavlar</a><a href="#">Rozetler</a>
      </div>
      <div class="footer-col">
        <h6>Destek</h6>
        <a onclick="showPage('faq')">S.S.S.</a>
        <a href="#">Topluluk</a>
        <a onclick="showPage('contact')">İletişim</a>
      </div>
      <div class="footer-col">
        <h6>Yasal</h6>
        <a href="#">Gizlilik</a><a href="#">Kullanım Şartları</a><a href="#">KVKK</a>
      </div>
      <div class="footer-col">
        <h6>Sosyal</h6>
        <a href="#">Instagram</a><a href="#">YouTube</a><a href="#">TikTok</a>
      </div>
    </div>
    <div class="footer-bottom">
      <div>© 2024 Quizion. Tüm Hakları Saklıdır. 💜</div>
      <div style="display:flex;gap:20px;"><span>Türkçe 🇹🇷</span><span>🔒 Güvenli</span></div>
    </div>
  </footer>

</div><!-- /landing -->


<!-- ══════════════════════════════════════════
     SAYFA: GİRİŞ
══════════════════════════════════════════ -->
<div id="page-login" class="page">
  <div class="auth-page">
    <div class="auth-left">
      <span class="auth-deco">🎯</span>
      <span class="auth-deco">⭐</span>
      <span class="auth-deco">📚</span>
      <span class="auth-deco">🏆</span>
      <div class="auth-left-content">
        <a href="#" class="auth-brand" onclick="showPage('landing')">
          <div class="auth-brand-icon">Q</div>
          <div class="auth-brand-name">Quiz<span>ion</span></div>
        </a>
        <h2>Tekrar <span>Hoş Geldin!</span></h2>
        <p class="auth-left-desc">Kaldığın yerden devam et, sıralamada yüksel ve yeni rozetler kazan! 🏅</p>
        <div class="auth-perks">
          <div class="auth-perk">
            <div class="auth-perk-icon">🛡️</div>
            <div><strong>Güvenli Giriş</strong><span>Verileriniz uçtan uca korunur</span></div>
          </div>
          <div class="auth-perk">
            <div class="auth-perk-icon">⚡</div>
            <div><strong>Hızlı Senkronize</strong><span>Her cihazdan anında erişim</span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="auth-right">
      <div class="auth-box">
        <button class="back-btn" onclick="showPage('landing')">← Anasayfaya Dön</button>
        <h2>Giriş Yap 👋</h2>
        <p class="auth-sub">Hesabın yok mu? <a href="#" onclick="showPage('register')">Ücretsiz kaydol!</a></p>
        <div class="auth-msg error" id="loginErr">E-posta veya şifre hatalı.</div>
        <form onsubmit="handleLogin(event)">
          <div class="form-group">
            <label>E-Posta Adresi</label>
            <input type="email" id="loginEmail" placeholder="ornek@mail.com" required>
          </div>
          <div class="form-group">
            <label>Şifre</label>
            <div class="pw-wrap">
              <input type="password" id="loginPass" placeholder="••••••••" required>
              <button type="button" class="pw-toggle" onclick="togglePw('loginPass',this)">👁️</button>
            </div>
          </div>
          <div class="form-options">
            <label class="check-label"><input type="checkbox"> Beni Hatırla</label>
            <a href="#" class="forgot-link">Şifremi Unuttum</a>
          </div>
          <button type="submit" class="auth-submit">Giriş Yap 🚀</button>
        </form>
        <div class="auth-divider">veya şununla devam et</div>
        <div class="social-btns">
          <button class="social-btn" onclick="socialLogin('Google')"><img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="G"> Google</button>
          <button class="social-btn" onclick="socialLogin('Apple')"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="A"> Apple</button>
        </div>
        <p class="terms-note">Giriş yaparak <a href="#">Kullanım Şartları</a>'nı kabul etmiş olursunuz.</p>
      </div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: KAYIT
══════════════════════════════════════════ -->
<div id="page-register" class="page">
  <div class="auth-page">
    <div class="auth-left">
      <span class="auth-deco">🚀</span>
      <span class="auth-deco">🌟</span>
      <span class="auth-deco">🎉</span>
      <span class="auth-deco">💪</span>
      <div class="auth-left-content">
        <a href="#" class="auth-brand" onclick="showPage('landing')">
          <div class="auth-brand-icon">Q</div>
          <div class="auth-brand-name">Quiz<span>ion</span></div>
        </a>
        <h2>Başarı <span>Yolculuğuna</span> Başla!</h2>
        <p class="auth-left-desc">Binlerce öğrencinin katıldığı platformda yerine hazır, sadece sen eksiktin!</p>
        <div class="auth-perks">
          <div class="auth-perk">
            <div class="auth-perk-icon">🎁</div>
            <div><strong>Tamamen Ücretsiz</strong><span>Kredi kartı gerektirmez</span></div>
          </div>
          <div class="auth-perk">
            <div class="auth-perk-icon">✨</div>
            <div><strong>İlk Hafta Premium</strong><span>Tüm özellikler açık!</span></div>
          </div>
        </div>
      </div>
    </div>
    <div class="auth-right">
      <div class="auth-box">
        <button class="back-btn" onclick="showPage('landing')">← Anasayfaya Dön</button>
        <h2>Hesap Oluştur 🎉</h2>
        <p class="auth-sub">Zaten üye misin? <a href="#" onclick="showPage('login')">Giriş yap!</a></p>
        <div class="auth-msg success" id="regSuccess">Hesabın oluşturuldu! Yönlendiriliyorsun... 🚀</div>
        <form onsubmit="handleRegister(event)">
          <div class="form-row">
            <div class="form-group"><label>Ad</label><input type="text" id="regFirstName" placeholder="Adın" required></div>
            <div class="form-group"><label>Soyad</label><input type="text" id="regLastName" placeholder="Soyadın" required></div>
          </div>
          <div class="form-group"><label>E-Posta</label><input type="email" id="regEmail" placeholder="ornek@mail.com" required></div>
          <div class="form-group">
            <label>Şifre</label>
            <div class="pw-wrap">
              <input type="password" id="regPass" placeholder="En az 8 karakter" required>
              <button type="button" class="pw-toggle" onclick="togglePw('regPass',this)">👁️</button>
            </div>
          </div>
          <button type="submit" class="auth-submit">Ücretsiz Üye Ol 🎉</button>
        </form>
        <div class="auth-divider">veya şununla devam et</div>
        <div class="social-btns">
          <button class="social-btn" onclick="socialLogin('Google')"><img src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg" alt="G"> Google</button>
          <button class="social-btn" onclick="socialLogin('Apple')"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="A"> Apple</button>
        </div>
        <p class="terms-note">Üye olarak <a href="#">KVKK Aydınlatma Metni</a>'ni okuduğunu kabul ediyorsun.</p>
      </div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: DASHBOARD
══════════════════════════════════════════ -->
<div id="page-home" class="page inner-page">
  <div class="page-header">
    <h1 class="page-title" id="dashWelcome">Merhaba, Kahraman! 👋</h1>
    <p class="page-sub">Bugün ne öğreneceksin? Her doğru cevap seni zirveye yaklaştırıyor! 🚀</p>
  </div>
  <div class="dash-stats-grid">
    <div class="dash-stat"><div class="ds-icon">📝</div><div class="ds-val">24</div><div class="ds-lbl">Tamamlanan Sınav</div></div>
    <div class="dash-stat"><div class="ds-icon">🎯</div><div class="ds-val">%92</div><div class="ds-lbl">Ortalama Başarı</div></div>
    <div class="dash-stat"><div class="ds-icon">🔥</div><div class="ds-val">5 Gün</div><div class="ds-lbl">Çalışma Serisi</div></div>
    <div class="dash-stat"><div class="ds-icon">💎</div><div class="ds-val">1,250</div><div class="ds-lbl">Quizion Puanı</div></div>
  </div>
  <div class="qa-section">
    <h3>🚀 Hızlı İşlemler</h3>
    <div class="qa-grid">
      <div class="qa-card" onclick="alert('Sınav oluşturma yakında! 🚧')">
        <div class="qa-icon">➕</div>
        <div><h5>Sınav Oluştur</h5><p>Yeni test veya canlı yarışma başlat</p></div>
      </div>
      <div class="qa-card" onclick="showPage('explore')">
        <div class="qa-icon">🔍</div>
        <div><h5>Sınav Keşfet</h5><p>Hazır sınavlara göz at</p></div>
      </div>
      <div class="qa-card" onclick="showPage('library')">
        <div class="qa-icon">📊</div>
        <div><h5>Raporlarım</h5><p>Gelişimini detaylı gör</p></div>
      </div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: KÜTÜPHANEİM
══════════════════════════════════════════ -->
<div id="page-library" class="page inner-page">
  <div class="page-header">
    <h1 class="page-title">📚 Kütüphanem</h1>
    <p class="page-sub">Tüm sınavların, ödevlerin ve kayıtlı içerikler burada.</p>
  </div>
  <div class="lib-search">
    <input type="text" placeholder="🔍 Sınav başlığı veya konu ara...">
    <button>Ara</button>
  </div>
  <div class="quiz-list">
    <div class="quiz-card">
      <div class="quiz-top"><span class="q-badge qb-live">🔴 Canlı Sınav</span><span style="font-size:.74rem;color:var(--gray-400);font-weight:700;">Dün</span></div>
      <h4>Matematik: Kesirler ve Ondalıklar</h4>
      <p>15 Soru • 30 Dakika • Orta Seviye</p>
      <div class="quiz-meta"><span>👥 45 Katılımcı</span><span style="color:var(--green);">⭐ %94 Başarı</span></div>
    </div>
    <div class="quiz-card">
      <div class="quiz-top"><span class="q-badge qb-test">💜 Deneme</span><span style="font-size:.74rem;color:var(--gray-400);font-weight:700;">3 Gün Önce</span></div>
      <h4>Türkçe: Paragraf ve Anlam</h4>
      <p>40 Soru • 50 Dakika • Orta Seviye</p>
      <div class="quiz-meta"><span>👤 Bireysel</span><span style="color:var(--purple);">⭐ %82 Başarı</span></div>
    </div>
    <div class="quiz-card">
      <div class="quiz-top"><span class="q-badge qb-hw">🟢 Ödev</span><span style="font-size:.74rem;color:var(--gray-400);font-weight:700;">Geçen Hafta</span></div>
      <h4>İngilizce: School Vocabulary</h4>
      <p>20 Soru • 15 Dakika • Kolay</p>
      <div class="quiz-meta"><span>🏫 6/A Sınıfı</span><span style="color:var(--green);">⭐ %100 Başarı</span></div>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: KEŞFET
══════════════════════════════════════════ -->
<div id="page-explore" class="page inner-page">
  <div class="page-header">
    <h1 class="page-title">🌍 Sınav Keşfet</h1>
    <p class="page-sub">Binlerce sınav seni bekliyor! Hangisinde kendini sınayacaksın?</p>
  </div>
  <div class="cat-tabs">
    <button class="cat-tab active" onclick="setTab(this)">Tümü</button>
    <button class="cat-tab" onclick="setTab(this)">Matematik</button>
    <button class="cat-tab" onclick="setTab(this)">Fen Bilimleri</button>
    <button class="cat-tab" onclick="setTab(this)">Türkçe</button>
    <button class="cat-tab" onclick="setTab(this)">İngilizce</button>
    <button class="cat-tab" onclick="setTab(this)">Sosyal</button>
  </div>
  <div class="explore-grid">
    <div class="exp-card"><div class="exp-img ei-p">📐</div><div class="exp-body"><h4>Geometri: Üçgenler</h4><p>Tüm üçgen kurallarını kapsayan temel seviye sınavı.</p><div class="exp-foot"><span class="exp-count">🔥 1.2k Çözüm</span><button class="start-btn">Başlat!</button></div></div></div>
    <div class="exp-card"><div class="exp-img ei-o">🧬</div><div class="exp-body"><h4>Biyoloji: Hücre</h4><p>Organeller ve hücre yapısı üzerine detaylı test.</p><div class="exp-foot"><span class="exp-count">🔥 850 Çözüm</span><button class="start-btn">Başlat!</button></div></div></div>
    <div class="exp-card"><div class="exp-img ei-g">🌎</div><div class="exp-body"><h4>Dünya Başkentleri</h4><p>Eğlenceli genel kültür yarışmasına hazır mısın?</p><div class="exp-foot"><span class="exp-count">🔥 3.4k Çözüm</span><button class="start-btn">Başlat!</button></div></div></div>
    <div class="exp-card"><div class="exp-img ei-y">📖</div><div class="exp-body"><h4>Türkçe: Atasözleri</h4><p>Bilmece gibi sorularla Türkçe'ni güçlendir!</p><div class="exp-foot"><span class="exp-count">🔥 2.1k Çözüm</span><button class="start-btn">Başlat!</button></div></div></div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: HIZLI ERİŞİM
══════════════════════════════════════════ -->
<div id="page-quick" class="page inner-page">
  <div class="page-header">
    <h1 class="page-title">⚡ Hızlı Erişim</h1>
    <p class="page-sub">Son aktivitelerin ve favorilerin hemen burada!</p>
  </div>
  <div class="dash-stats-grid">
    <div class="dash-stat"><div class="ds-icon">🕐</div><div class="ds-val">3</div><div class="ds-lbl">Son Açılan</div></div>
    <div class="dash-stat"><div class="ds-icon">⭐</div><div class="ds-val">12</div><div class="ds-lbl">Favorilerim</div></div>
    <div class="dash-stat"><div class="ds-icon">📌</div><div class="ds-val">5</div><div class="ds-lbl">Devam Eden Ödev</div></div>
    <div class="dash-stat"><div class="ds-icon">🔔</div><div class="ds-val">2</div><div class="ds-lbl">Bildirimler</div></div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: S.S.S.
══════════════════════════════════════════ -->
<div id="page-faq" class="page inner-page">
  <div style="max-width:700px;margin:0 auto;">
    <div class="section-head" style="margin-bottom:36px;">
      <div class="section-tag">💡 Destek</div>
      <h2 class="section-title">Sıkça Sorulan Sorular</h2>
      <p class="section-desc">Aklına takılan her şeyin cevabı burada!</p>
    </div>
    <details class="faq-item"><summary class="faq-q">Quizion ücretsiz mi? <span class="faq-arr">▼</span></summary><div class="faq-a">Evet! Temel özellikler tamamen ücretsizdir. Premium plan ile gelişmiş analizler ve sınırsız içeriklere erişebilirsin. İlk 14 gün tüm premium özellikler açık!</div></details>
    <details class="faq-item"><summary class="faq-q">Kaç yaşındakiler kullanabilir? <span class="faq-arr">▼</span></summary><div class="faq-a">Quizion özellikle 10-15 yaş arası ortaokul öğrencileri için tasarlanmıştır. 5., 6., 7. ve 8. sınıf müfredatına uygun soru bankaları mevcuttur.</div></details>
    <details class="faq-item"><summary class="faq-q">Nasıl sınav oluşturabilirim? <span class="faq-arr">▼</span></summary><div class="faq-a">Hesap oluşturduktan sonra dashboard'dan "Sınav Oluştur" butonuna tıklayarak yeni sınav, test veya canlı yarışma oluşturabilirsin. Çok kolay!</div></details>
    <details class="faq-item"><summary class="faq-q">Verilerim güvende mi? <span class="faq-arr">▼</span></summary><div class="faq-a">Evet! Tüm veriler uçtan uca şifrelenerek korunuyor. KVKK kapsamında veriler üçüncü taraflarla paylaşılmaz. Güvenlik birinci önceliğimiz!</div></details>
    <details class="faq-item"><summary class="faq-q">Öğretmenler de kullanabilir mi? <span class="faq-arr">▼</span></summary><div class="faq-a">Evet! Öğretmenler ödev verebilir, sınıf oluşturabilir ve öğrenci gelişimini takip edebilir. Kurumsal paket için bizimle iletişime geç.</div></details>
    <div style="text-align:center;margin-top:32px;">
      <p style="color:var(--gray-400);font-size:.88rem;margin-bottom:14px;font-weight:600;">Sorun hâlâ çözülmedi mi? 🤔</p>
      <button onclick="showPage('contact')" class="nav-btn-register">📩 Bize Yaz</button>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     SAYFA: İLETİŞİM
══════════════════════════════════════════ -->
<div id="page-contact" class="page inner-page">
  <div style="max-width:560px;margin:0 auto;">
    <div class="section-head" style="margin-bottom:32px;">
      <div class="section-tag">📩 İletişim</div>
      <h2 class="section-title">Bize Ulaşın!</h2>
      <p class="section-desc">Her türlü soru, öneri veya sorun için buradayız. En hızlı şekilde yanıt veririz!</p>
    </div>
    <div class="contact-form-box">
      <div class="form-row">
        <div class="form-group"><label>Ad</label><input type="text" placeholder="Adın"></div>
        <div class="form-group"><label>Soyad</label><input type="text" placeholder="Soyadın"></div>
      </div>
      <div class="form-group"><label>E-Posta</label><input type="email" placeholder="ornek@mail.com"></div>
      <div class="form-group"><label>Konu</label><input type="text" placeholder="Mesajının konusu"></div>
      <div class="form-group">
        <label>Mesaj</label>
        <textarea placeholder="Mesajını buraya yaz..."></textarea>
      </div>
      <button class="auth-submit" onclick="alert('Mesajın gönderildi! En kısa sürede dönüş yapacağız ✅')">Gönder 📤</button>
    </div>
  </div>
</div>


<!-- ══════════════════════════════════════════
     JAVASCRIPT
══════════════════════════════════════════ -->
<script>
// ─── STATE ───────────────────────────────────
let isLoggedIn = false;

// ─── SAYFA YÖNLENDİRİCİ ─────────────────────
function showPage(id) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  const el = document.getElementById('page-' + id);
  if (el) { el.classList.add('active'); window.scrollTo({ top:0, behavior:'smooth' }); }

  // Navbar göster/gizle
  const nav = document.getElementById('mainNav');
  const hideFor = ['landing','login','register'];
  nav.style.display = hideFor.includes(id) ? 'none' : 'flex';

  // Aktif link
  document.querySelectorAll('.nav-links a').forEach(a => a.classList.remove('active'));
  const lnk = document.getElementById('nav-' + id);
  if (lnk) lnk.classList.add('active');

  // Ham footer
  const hf = document.getElementById('hamFooter');
  if (hf) hf.style.display = isLoggedIn ? 'none' : 'flex';

  // Landing → scroll reveal
  if (id === 'landing') setTimeout(initReveal, 120);
}

// ─── AUTH KORUMA ─────────────────────────────
function authRequired(pageId) {
  isLoggedIn ? showPage(pageId) : openModal();
}

// ─── LOGIN ───────────────────────────────────
function handleLogin(e) {
  e.preventDefault();
  loginSuccess({ firstName:'Can', lastName:'Yılmaz', email: document.getElementById('loginEmail').value });
}

// ─── REGISTER ────────────────────────────────
function handleRegister(e) {
  e.preventDefault();
  const s = document.getElementById('regSuccess');
  s.classList.add('show');
  const user = {
    firstName: document.getElementById('regFirstName').value,
    lastName:  document.getElementById('regLastName').value,
    email:     document.getElementById('regEmail').value
  };
  setTimeout(() => { loginSuccess(user); s.classList.remove('show'); }, 1500);
}

// ─── LOGIN SUCCESS ───────────────────────────
function loginSuccess(user) {
  isLoggedIn = true;
  document.getElementById('navGuest').style.display = 'none';
  document.getElementById('navUser').style.display  = 'block';
  document.getElementById('userNameDisplay').textContent = user.firstName + ' ' + user.lastName;
  document.getElementById('userInitial').textContent     = user.firstName[0].toUpperCase();
  document.getElementById('dashWelcome').textContent     = 'Merhaba, ' + user.firstName + '! 👋';
  const hf = document.getElementById('hamFooter');
  if (hf) hf.style.display = 'none';
  showPage('home');
}

// ─── LOGOUT ──────────────────────────────────
function logout() {
  isLoggedIn = false;
  document.getElementById('navGuest').style.display = 'flex';
  document.getElementById('navUser').style.display  = 'none';
  const hf = document.getElementById('hamFooter');
  if (hf) hf.style.display = 'flex';
  closeDrop();
  showPage('landing');
}

// ─── SOCIAL ──────────────────────────────────
function socialLogin(p) {
  loginSuccess({ firstName:p, lastName:'Kullanıcısı', email:'sosyal@quizion.com' });
}

// ─── DROPDOWN ────────────────────────────────
function toggleDrop() { document.getElementById('userDropdown').classList.toggle('open'); }
function closeDrop()  { document.getElementById('userDropdown').classList.remove('open'); }
document.addEventListener('click', e => {
  const dd  = document.getElementById('userDropdown');
  const btn = document.querySelector('.user-avatar-btn');
  if (dd && btn && !dd.contains(e.target) && !btn.contains(e.target)) closeDrop();
});

// ─── HAMBURGER ───────────────────────────────
function openHam() {
  document.getElementById('hamPanel').classList.add('open');
  document.getElementById('hamOverlay').classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeHam() {
  document.getElementById('hamPanel').classList.remove('open');
  document.getElementById('hamOverlay').classList.remove('open');
  document.body.style.overflow = '';
}

// ─── AUTH MODAL ──────────────────────────────
function openModal() {
  document.getElementById('authModal').classList.add('open');
  document.body.style.overflow = 'hidden';
}
function closeModal() {
  document.getElementById('authModal').classList.remove('open');
  document.body.style.overflow = '';
}
function handleModalClick(e) {
  if (e.target === document.getElementById('authModal')) closeModal();
}

// ─── PASSWORD TOGGLE ─────────────────────────
function togglePw(id, btn) {
  const el = document.getElementById(id);
  el.type  = el.type === 'password' ? 'text' : 'password';
  btn.textContent = el.type === 'password' ? '👁️' : '🙈';
}

// ─── CATEGORY TABS ───────────────────────────
function setTab(el) {
  document.querySelectorAll('.cat-tab').forEach(t => t.classList.remove('active'));
  el.classList.add('active');
}

// ─── NAVBAR SCROLL ───────────────────────────
window.addEventListener('scroll', () => {
  const nav = document.getElementById('mainNav');
  if (nav) nav.classList.toggle('scrolled', window.scrollY > 20);
});

// ════════════════════════════════════════════
// İSTATİSTİK SAYACI ANİMASYONU
// ════════════════════════════════════════════
function formatNum(v, s) {
  if (v >= 1000000) return (v/1000000).toFixed(0) + 'M' + s;
  if (v >= 1000)    return (v/1000).toFixed(0)    + 'K' + s;
  return v + s;
}

function animateCounter(el) {
  const target   = parseInt(el.dataset.target);
  const suffix   = el.dataset.suffix || '';
  const duration = 2400;
  const t0 = performance.now();

  (function tick(now) {
    const p = Math.min((now - t0) / duration, 1);
    const e = 1 - Math.pow(1 - p, 3); // ease-out cubic
    el.textContent = formatNum(Math.floor(e * target), suffix);
    if (p < 1) requestAnimationFrame(tick);
    else el.textContent = formatNum(target, suffix);
  })(t0);
}

// ─── SCROLL REVEAL + COUNTER ─────────────────
function initReveal() {
  // Sayaçlar
  document.querySelectorAll('.counter').forEach(el => {
    if (el._obs) return;
    el._obs = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !entry.target.dataset.done) {
          entry.target.dataset.done = '1';
          animateCounter(entry.target);
        }
      });
    }, { threshold: 0.4 });
    el._obs.observe(el);
  });

  // Reveal
  document.querySelectorAll('.reveal').forEach((el, i) => {
    if (el._robs) return;
    el._robs = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          setTimeout(() => entry.target.classList.add('visible'), 70 * (i % 5));
          el._robs.unobserve(entry.target);
        }
      });
    }, { threshold: 0.10 });
    el._robs.observe(el);
  });
}

document.addEventListener('DOMContentLoaded', initReveal);
</script>

</body>
</html>
