<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('materis', function (Blueprint $table) {
            $table->string('file_pdf')->nullable()->after('notifikasi_siswa');
            $table->string('file_video')->nullable()->after('file_pdf');
            $table->string('nama_file_pdf')->nullable()->after('file_video');
            $table->string('nama_file_video')->nullable()->after('nama_file_pdf');
            $table->string('link_video')->nullable()->after('nama_file_video');
        });
    }

    public function down()
    {
        Schema::table('materis', function (Blueprint $table) {
            $table->dropColumn(['file_pdf', 'file_video', 'nama_file_pdf', 'nama_file_video', 'link_video']);
        });
    }
};