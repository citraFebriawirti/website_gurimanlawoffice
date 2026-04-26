<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_hero', function (Blueprint $table) {
            $table->string('id_hero')->primary()->unique();
            $table->string('title_hero');
            $table->longText('description_hero');
            $table->string('link_hero');
            $table->string('image_hero');
            $table->string('status_hero');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_hero');
    }
};
