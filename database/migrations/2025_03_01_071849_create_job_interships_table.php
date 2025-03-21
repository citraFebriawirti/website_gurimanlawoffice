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
        Schema::create('tb_jobintership', function (Blueprint $table) {
            $table->string('id_jobintership')->primary()->unique();
            $table->longText('requirenments_jobintership');
            $table->longText('job_descriptions_jobintership');
            $table->longText('status_jobintership');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jobintership');
    }
};
