<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kazanim extends Model
{
    protected $table = 'kazanimlar';

    protected $fillable = [
        'sinif',
        'ders',
        'kazanim_adi',
    ];
}