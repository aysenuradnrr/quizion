<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $fillable = [
        'user_id',
        'total_questions',
        'correct_count',
        'wrong_count',
        'empty_count',
        'score',
        'dersler',
        'kazanimlar',
    ];

    protected $casts = [
        'dersler' => 'array',
        'kazanimlar' => 'array',
    ];
}