<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            $table->string('ders');
            $table->string('kazanim');
            $table->enum('zorluk', ['Kolay', 'Orta', 'Zor']);

            $table->text('soru_metni');

            $table->string('secenek_a');
            $table->string('secenek_b');
            $table->string('secenek_c');
            $table->string('secenek_d');

            $table->string('dogru_cevap');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
