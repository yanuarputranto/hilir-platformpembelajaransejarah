<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKunciEssayToSoalsTable extends Migration
{
    public function up()
    {
        Schema::table('soals', function (Blueprint $table) {
            $table->text('kunci_essay')->nullable()->after('jawaban_benar');
        });
    }

    public function down()
    {
        Schema::table('soals', function (Blueprint $table) {
            $table->dropColumn('kunci_essay');
        });
    }
}