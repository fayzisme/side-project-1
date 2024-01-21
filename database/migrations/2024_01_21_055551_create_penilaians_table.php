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
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_penyakit');
            $table->unsignedBigInteger('id_gejala');
            $table->float('bobot_penilaian');
            $table->timestamps();

            $table->foreign('id_penyakit')->references('id')->on('penyakits');
            $table->foreign('id_gejala')->references('id')->on('gejalas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
