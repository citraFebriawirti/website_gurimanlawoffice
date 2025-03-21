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
        Schema::create('tb_testimoni', function (Blueprint $table) {
            $table->string('id_testimoni')->primary()->unique();
            $table->string('name_testimoni');
            $table->string('position_testimoni');
            $table->longText('description_testimoni');
            $table->string('image_testimoni');
            $table->string('status_testimoni');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_testimoni');
    }
};