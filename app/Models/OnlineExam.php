<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineExam extends Model
{
    protected $fillable = [
        'teacher_id',
        'title',
        'ders',
        'grade',
        'starts_at',
        'duration',
        'exam_code',
        'question_ids',
        'manual_questions',
        'image_questions',
        'is_active',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'is_active' => 'boolean',

        'question_ids' => 'array',
        'manual_questions' => 'array',
        'image_questions' => 'array',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}