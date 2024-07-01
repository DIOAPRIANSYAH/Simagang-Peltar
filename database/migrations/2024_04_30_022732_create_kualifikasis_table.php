<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('kualifikasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_satker');
            $table->string('gender', 255);
            $table->string('pendidikan', 255);
            $table->string('jurusan', 255);
            $table->string('perangkat', 255);
            $table->string('penempatan', 255);
            $table->string('durasi', 45);
            $table->string('kompetensi', 255);
            $table->timestamps();

            $table->foreign('id_satker')->references('id')->on('satker')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kualifikasis');
    }
};
