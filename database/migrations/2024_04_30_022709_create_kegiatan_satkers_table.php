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
        Schema::create('kegiatan_satker', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_satker');
            $table->string('judul_kegiatan', 255);
            $table->text('deskripsi')->nullable();
            $table->string('fotoKegiatan', 500)->nullable();
            $table->timestamps();

            $table->foreign('id_satker')->references('id')->on('satker')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan_satkers');
    }
};
