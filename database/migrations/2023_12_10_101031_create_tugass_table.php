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
            $table->string('matkul');
            $table->string('semester');
            $table->string('pertemuan');
            $table->string('link_tugas')->nullable();
            $table->integer('nilai')->nullable();
            $table->date('tgl_buat');
            $table->date('tgl_deadline');
            $table->date('tgl_pengumpulan')->nullable();
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
