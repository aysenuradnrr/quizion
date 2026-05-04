<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

/**
 * Kayıt Kontrolcüsü
 * Konum: app/Http/Controllers/Auth/RegisteredUserController.php
 * Breeze kurulumu yaptıysanız bu dosyayı replace edin.
 * Breeze yoksa manuel oluşturun.
 */
class RegisteredUserController extends Controller
{
    /**
     * Kayıt formunu göster
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Yeni kullanıcı kaydet ve panele yönlendir
     */
    public function store(Request $request): RedirectResponse
    {
        // 1. Temel doğrulama
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'     => ['required', 'in:ogrenci,ogretmen'],
        ]);

        // 2. Role göre ek alan doğrulama
        if ($request->role === 'ogrenci') {
            $request->validate([
                'ogrenci_no' => ['required', 'string', 'max:20', 'unique:users,ogrenci_no'],
                'sinif'      => ['required', 'string', 'max:10'], // Örn: "7-A"
            ]);
        }

        if ($request->role === 'ogretmen') {
            $request->validate([
                'brans' => ['required', 'string', 'max:100'],
                'okul'  => ['required', 'string', 'max:150'],
            ]);
        }

        // 3. Kullanıcı oluştur
        $user = User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => $request->role,
            // Öğrenci alanları
            'ogrenci_no' => $request->role === 'ogrenci' ? $request->ogrenci_no : null,
            'sinif'      => $request->role === 'ogrenci' ? $request->sinif      : null,
            // Öğretmen alanları
            'brans'      => $request->role === 'ogretmen' ? $request->brans : null,
            'okul'       => $request->role === 'ogretmen' ? $request->okul  : null,
        ]);

        // 4. Kayıt event'i tetikle (e-posta doğrulama vs.)
        event(new Registered($user));

        // 5. Otomatik giriş yap
        Auth::login($user);

        // 6. Role göre yönlendir
        return redirect($user->panelUrl());
    }
}
