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
        Schema::create('tugass', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_dosens');
            $table->unsignedBigInteger('id_mahasiswas')->nullable();
            $table->string('matkul');
            $table->string('semester');
            $table->string('pertemuan');
            $table->date('tgl_buat');
            $table->date('tgl_deadline');
            $table->foreign('id_dosens')->references('id')->on('dosens');
            $table->foreign('id_mahasiswas')->references('id')->on('mahasiswas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugass');
    }
};
