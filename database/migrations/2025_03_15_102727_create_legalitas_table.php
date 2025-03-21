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
        Schema::create('tb_legalitas', function (Blueprint $table) {
            $table->string('id_legalitas')->primary()->unique();
            $table->string('title_legalitas');
            $table->longText('description_legalitas');
            $table->string('image_legalitas');
            $table->string('status_legalitas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_legalitas');
    }
};
