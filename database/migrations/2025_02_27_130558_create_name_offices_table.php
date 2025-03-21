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
        Schema::create('tb_nameoffice', function (Blueprint $table) {
            $table->string('id_nameoffice')->primary()->unique();
            $table->string('title_nameoffice');
            $table->string('image_nameoffice');
            $table->string('status_nameoffice');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_nameoffice');
    }
};