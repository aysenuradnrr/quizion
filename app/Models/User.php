<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * User Model
 * Konum: app/Models/User.php
 * Mevcut User.php dosyanızı bu içerikle değiştirin.
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'ogrenci_no',
        'sinif',
        'brans',
        'okul',
        'telefon',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'aktif'             => 'boolean',
        ];
    }

    // ── Rol yardımcı metodları ────────────────────────────
    public function isOgrenci(): bool
    {
        return $this->role === 'ogrenci';
    }

    public function isOgretmen(): bool
    {
        return $this->role === 'ogretmen';
    }

    // ── Panele yönlendirme URL'si ─────────────────────────
    public function panelUrl(): string
    {
        return $this->isOgretmen()
            ? route('ogretmen.dashboard')
            : route('ogrenci.dashboard');
    }

    // ── İlişkiler (ilerleyen adımlar için hazır) ──────────
    // public function sorular() { return $this->hasMany(Soru::class); }
    // public function sinavlar() { return $this->hasMany(Sinav::class); }
}

}
