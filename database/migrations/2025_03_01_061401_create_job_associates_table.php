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
        Schema::create('tb_jobassociate', function (Blueprint $table) {
            $table->string('id_jobassociate')->primary()->unique();
            $table->longText('requirenments_jobassociate');
            $table->longText('job_descriptions_jobassociate');
            $table->string('status_jobassociate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_jobassociate');
    }
};
