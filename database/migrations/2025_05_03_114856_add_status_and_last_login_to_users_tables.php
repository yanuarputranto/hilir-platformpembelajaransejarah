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
        Schema::table('siswas', function (Blueprint $table) {
            $table->string('status_akun')->default('aktif');
            $table->timestamp('last_login_at')->nullable();
        });
        
        Schema::table('gurus', function (Blueprint $table) {
            $table->string('status_akun')->default('aktif');
            $table->timestamp('last_login_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('siswas', function (Blueprint $table) {
            $table->dropColumn(['status_akun', 'last_login_at']);
        });
        
        Schema::table('gurus', function (Blueprint $table) {
            $table->dropColumn(['status_akun', 'last_login_at']);
        });
    }
};
