<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('materi_gambars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('materi_id')->constrained('materis')->onDelete('cascade');
            $table->string('path');
            $table->string('nama_asli');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materi_gambars');
    }
};
