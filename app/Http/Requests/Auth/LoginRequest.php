<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

/**
 * Giriş İsteği – Çift Mod
 * Konum: app/Http/Requests/Auth/LoginRequest.php
 *
 * Öğrenci: ogrenci_no + password
 * Öğretmen: email + password
 */
class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'password' => ['required', 'string'],
            // login_id öğrenci no için, email öğretmen için
            'login_id' => ['nullable', 'string'],
            'email'    => ['nullable', 'email'],
        ];
    }

    /**
     * Kimlik doğrulama
     * Önce e-posta ile, yoksa ogrenci_no ile dener.
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $authenticated = false;

        // Öğretmen girişi: e-posta ile
        if ($this->filled('email')) {
            $authenticated = Auth::attempt([
                'email'    => $this->email,
                'password' => $this->password,
                'role'     => 'ogretmen',
            ], $this->boolean('remember'));
        }

        // Öğrenci girişi: öğrenci no ile
        if (! $authenticated && $this->filled('login_id')) {
            $authenticated = Auth::attempt([
                'ogrenci_no' => $this->login_id,
                'password'   => $this->password,
                'role'       => 'ogrenci',
            ], $this->boolean('remember'));

            // Öğrenci no ile e-posta gibi de dene (fallback)
            if (! $authenticated) {
                $authenticated = Auth::attempt([
                    'email'    => $this->login_id,
                    'password' => $this->password,
                ], $this->boolean('remember'));
            }
        }

        if (! $authenticated) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'login_id' => __('Öğrenci no veya şifre hatalı.'),
                'email'    => __('E-posta veya şifre hatalı.'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }
        event(new Lockout($this));
        $seconds = RateLimiter::availableIn($this->throttleKey());
        throw ValidationException::withMessages([
            'login_id' => __('Çok fazla deneme. Lütfen :seconds saniye bekleyin.', ['seconds' => $seconds]),
        ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(
            Str::lower($this->string('email') ?: $this->string('login_id')) . '|' . $this->ip()
        );
    }
}
