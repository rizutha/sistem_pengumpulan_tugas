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
        Schema::create('pengumpulans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tugass');
            $table->unsignedBigInteger('id_mahasiswas');
            $table->string('link')->nullable();
            $table->integer('nilai')->nullable();
            $table->timestamp('tgl_pengumpulan')->nullable();
            $table->foreign('id_tugass')->references('id')->on('mahasiswas');
            $table->foreign('id_mahasiswas')->references('id')->on('mahasiswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulans');
    }
};
