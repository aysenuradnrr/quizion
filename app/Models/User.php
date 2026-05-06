<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'surname', 'email', 'password',
        'role', 'grade', 'branch', 'xp', 'streak',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isOgrenci(): bool {
        return $this->role === 'ogrenci';
    }

    public function isOgretmen(): bool {
        return $this->role === 'ogretmen';
    }

    public function fullName(): string {
        return $this->name . ' ' . $this->surname;
    }

    public function initial(): string {
        return strtoupper(substr($this->name, 0, 1));
    }
}