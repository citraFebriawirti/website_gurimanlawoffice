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
    { {
            Schema::create('tb_artikel', function (Blueprint $table) {
                $table->string('id_artikel')->primary()->unique();
                $table->string('title_artikel');
                $table->string('author_artikel');
                $table->longText('description_artikel');
                $table->string('image_artikel');
                $table->string('status_artikel');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_artikel');
    }
};
