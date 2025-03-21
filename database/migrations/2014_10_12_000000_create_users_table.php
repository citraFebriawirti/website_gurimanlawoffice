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
        Schema::create('users', function (Blueprint $table) {
            $table->string('id_user')->primary();
            $table->string('nama_user');
            $table->string('jenis_kelamin_user');
            $table->string('alamat_user');
            $table->string('nomor_hp_user');
            $table->string('email');
            $table->string('password');
            $table->string('status_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
