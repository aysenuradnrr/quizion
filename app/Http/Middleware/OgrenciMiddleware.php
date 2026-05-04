<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Öğrenci Paneli Koruyucu Middleware
 * Konum: app/Http/Middleware/OgrenciMiddleware.php
 *
 * Öğretmenlerin öğrenci paneline erişimini engeller.
 */
class OgrenciMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Giriş yapılmamışsa login'e yönlendir
        if (! Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Bu sayfaya erişmek için giriş yapmanız gerekiyor.');
        }

        $user = Auth::user();

        // Öğretmen ise kendi paneline yönlendir
        if ($user->isOgretmen()) {
            return redirect()->route('ogretmen.dashboard')
                ->with('warning', '⚠️ Bu sayfa sadece öğrencilere özeldir.');
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
