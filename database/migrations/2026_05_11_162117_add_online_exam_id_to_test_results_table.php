<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('test_results', function (Blueprint $table) {
            if (!Schema::hasColumn('test_results', 'online_exam_id')) {
                $table->foreignId('online_exam_id')
                    ->nullable()
                    ->after('user_id')
                    ->constrained('online_exams')
                    ->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('test_results', function (Blueprint $table) {
            $table->dropConstrainedForeignId('online_exam_id');
        });
    }
};