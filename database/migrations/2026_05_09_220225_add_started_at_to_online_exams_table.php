<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('online_exams', function (Blueprint $table) {
            if (!Schema::hasColumn('online_exams', 'started_at')) {
                $table->timestamp('started_at')->nullable()->after('is_active');
            }
        });
    }

    public function down(): void
    {
        Schema::table('online_exams', function (Blueprint $table) {
            $table->dropColumn('started_at');
        });
    }
};