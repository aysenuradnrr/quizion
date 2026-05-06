<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            if (!Schema::hasColumn('users', 'grade')) {
                $table->string('grade')->nullable()->after('role');
            }

            if (!Schema::hasColumn('users', 'branch')) {
                $table->string('branch')->nullable()->after('grade');
            }

        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            if (Schema::hasColumn('users', 'grade')) {
                $table->dropColumn('grade');
            }

            if (Schema::hasColumn('users', 'branch')) {
                $table->dropColumn('branch');
            }

        });
    }
};