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
        Schema::create('jadwal_akademiks', function (Blueprint $table) {
            $table->id();

            $table->string('hari');

            $table->string('kode_mk');
            $table->foreign('kode_mk')->references('kode_mk')->on('matakuliahs')->onDelete('cascade');

            $table->foreignId('id_ruang')->constrained('ruangs')->onDelete('cascade');

            $table->foreignId('id_gol')->constrained('golongans')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_akademiks');
    }
};
