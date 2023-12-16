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
        Schema::create('daftar_poli', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('id_pasien')->references('id')->on('pasien');
            $table->foreignUuid('id_jadwal')->references('id')->on('jadwal_periksa');
            $table->text('keluhan');
            $table->integer('no_antrian', false, true)->length(11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_poli');
    }
};
