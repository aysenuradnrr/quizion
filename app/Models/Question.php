<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'sinif',
        'teacher_id',
        'ders',
        'kazanim',
        'zorluk',
        'soru_metni',
        'gorsel',
        'secenek_a',
        'secenek_b',
        'secenek_c',
        'secenek_d',
        'dogru_cevap',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
