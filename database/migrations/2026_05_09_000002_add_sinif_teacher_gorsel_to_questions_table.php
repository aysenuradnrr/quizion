<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('questions', function (Blueprint $table) {

            if (!Schema::hasColumn('questions', 'sinif')) {
                // Sütunu id'den hemen sonra ekle
                $table->string('sinif')->nullable()->after('id');
            }

            if (!Schema::hasColumn('questions', 'teacher_id')) {
                $table->foreignId('teacher_id')
                    ->nullable()
                    ->constrained('users')
                    ->nullOnDelete()
                    ->after('sinif');
            }

            // Soru görseli (tek soru için)
            if (!Schema::hasColumn('questions', 'gorsel')) {
                $table->string('gorsel')->nullable()->after('soru_metni');
            }
        });
    }

    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
            $table->dropColumn(['sinif', 'teacher_id', 'gorsel']);
        });
    }
};
