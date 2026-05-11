<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Öğrencinin bağlı olduğu öğretmen (sınıf yönetimi için)
            if (!Schema::hasColumn('users', 'teacher_id')) {
                $table->foreignId('teacher_id')
                    ->nullable()
                    ->constrained('users')
                    ->nullOnDelete()
                    ->after('branch');
            }

            // Okul numarası (sınıf yönetimi listesinde gösterilecek)
            if (!Schema::hasColumn('users', 'school_number')) {
                $table->string('school_number')->nullable()->after('teacher_id');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
            $table->dropColumn(['teacher_id', 'school_number']);
        });
    }
};
