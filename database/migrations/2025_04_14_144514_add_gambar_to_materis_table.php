<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('materis', function (Blueprint $table) {
        $table->string('gambar')->nullable(); // untuk menyimpan path gambar
    });
}

public function down()
{
    Schema::table('materis', function (Blueprint $table) {
        $table->dropColumn('gambar');
    });
}
};
