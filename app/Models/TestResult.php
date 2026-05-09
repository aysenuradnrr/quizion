<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $fillable = [
        'user_id',
        'online_exam_id',
        'total_questions',
        'correct_count',
        'wrong_count',
        'empty_count',
        'score',
        'dersler',
        'kazanimlar',
    ];

    protected $casts = [
        'dersler'    => 'array',
        'kazanimlar' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function onlineExam()
    {
        return $this->belongsTo(OnlineExam::class);
    }
}
