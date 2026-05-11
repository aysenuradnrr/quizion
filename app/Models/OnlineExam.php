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
        'started_at',
    ];

    protected $casts = [
        'starts_at'        => 'datetime',
        'started_at'       => 'datetime',
        'is_active'        => 'boolean',
        'question_ids'     => 'array',
        'manual_questions' => 'array',
        'image_questions'  => 'array',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function results()
    {
        return $this->hasMany(TestResult::class);
    }

    public function isStarted(): bool
    {
        return $this->is_active && $this->started_at !== null;
    }

    public function isFinished(): bool
    {
        if (!$this->started_at) return false;
        return now()->gt($this->started_at->copy()->addMinutes($this->duration));
    }

    public function remainingSeconds(): int
    {
        if (!$this->started_at) return 0;
        $bitis = $this->started_at->copy()->addMinutes($this->duration);
        return max(0, (int) now()->diffInSeconds($bitis, false));
    }
}