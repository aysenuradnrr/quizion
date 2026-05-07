<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('online_exams', function (Blueprint $table) {

            $table->id();

            $table->foreignId('teacher_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('title');

            $table->string('ders')->nullable();

            // 5,6,7,8 şeklinde tutulacak
            $table->string('grade');

            $table->dateTime('starts_at');

            $table->integer('duration')->default(40);

            $table->string('exam_code')->unique();

            // öğretmenin eklediği soru idleri
            $table->json('question_ids')->nullable();

            // manuel soru ekleme
            $table->json('manual_questions')->nullable();

            // görsel soru
            $table->json('image_questions')->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('online_exams');
    }
};