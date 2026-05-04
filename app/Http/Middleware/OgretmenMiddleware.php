<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Öğretmen Paneli Koruyucu Middleware
 * Konum: app/Http/Middleware/OgretmenMiddleware.php
 *
 * Öğrencilerin öğretmen paneline erişimini engeller.
 */
class OgretmenMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Giriş yapılmamışsa login'e yönlendir
        if (! Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Bu sayfaya erişmek için giriş yapmanız gerekiyor.');
        }

        $user = Auth::user();

        // Öğrenci ise kendi paneline yönlendir
        if ($user->isOgrenci()) {
            return redirect()->route('ogrenci.dashboard')
                ->with('warning', '⚠️ Bu sayfa sadece öğretmenlere özeldir.');
        }

        // Hesap aktif değilse
        if (! $user->aktif) {
            Auth::logout();
            return redirect()->route('login')
                ->with('error', 'Hesabınız askıya alınmıştır. Yöneticinizle iletişime geçin.');
        }

        return $next($request);
    }
}
