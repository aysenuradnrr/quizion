<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * Giriş Kontrolcüsü
 * Konum: app/Http/Controllers/Auth/AuthenticatedSessionController.php
 * Role göre yönlendirme içerir.
 */
class AuthenticatedSessionController extends Controller
{
    /**
     * Giriş formunu göster
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Giriş yap ve role göre yönlendir
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Kimlik doğrula (throttle dahil)
        $request->authenticate();

        // 2. Session yenile (CSRF koruması)
        $request->session()->regenerate();

        // 3. Role göre yönlendir
        $user = Auth::user();

        if ($user->isOgretmen()) {
            return redirect()->intended(route('ogretmen.dashboard'))
                ->with('success', 'Hoş geldiniz, ' . $user->name . '!');
        }

        return redirect()->intended(route('ogrenci.dashboard'))
            ->with('success', 'Hoş geldiniz, ' . $user->name . '!');
    }

    /**
     * Çıkış yap
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
