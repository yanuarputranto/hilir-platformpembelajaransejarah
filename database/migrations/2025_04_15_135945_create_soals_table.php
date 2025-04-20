<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ujian_id')->constrained('ujians')->onDelete('cascade');
            $table->text('pertanyaan');
            $table->enum('jenis', ['pilihan_ganda', 'essay']);
            $table->json('opsi')->nullable(); // Untuk pilihan ganda
            $table->string('jawaban_benar')->nullable(); // Untuk pilihan ganda
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('soals');
    }
};