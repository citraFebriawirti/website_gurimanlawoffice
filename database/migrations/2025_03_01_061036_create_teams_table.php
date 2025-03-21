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
        Schema::create('tb_team', function (Blueprint $table) {
            $table->string('id_team')->primary()->unique();
            $table->string('title_team');
            $table->longText('description_team');
            $table->string('image_team');
            $table->string('status_team');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_team');
    }
};
