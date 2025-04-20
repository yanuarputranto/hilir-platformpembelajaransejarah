<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('materis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')->constrained('gurus')->onDelete('cascade');
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('kategori');
            $table->date('tanggal_publikasi');
            $table->boolean('notifikasi_siswa')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materis');
    }
};
