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
        Schema::create('tb_sosialmedia', function (Blueprint $table) {
            $table->string('id_sosialmedia')->primary()->unique();
            $table->longText('link_tiktok_sosialmedia');
            $table->longText('link_instagram_sosialmedia');
            $table->longText('link_youtube_sosialmedia');
            $table->longText('link_linkedin_sosialmedia');
            $table->string('status_sosialmedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_sosialmedia');
    }
};
