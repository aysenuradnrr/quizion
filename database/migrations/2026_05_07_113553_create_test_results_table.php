<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('test_results', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // Hangi online sınava ait (PIN ile girilen sınavlarda dolu, serbest testte null)
            $table->foreignId('online_exam_id')
                ->nullable()
                ->constrained('online_exams')
                ->nullOnDelete();

            $table->integer('total_questions')->default(0);
            $table->integer('correct_count')->default(0);
            $table->integer('wrong_count')->default(0);
            $table->integer('empty_count')->default(0);
            $table->integer('score')->default(0); // 0-100 yüzde

            $table->json('dersler')->nullable();
            $table->json('kazanimlar')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_results');
    }
};

