<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaianMagangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaian_magang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_magang');
            $table->unsignedBigInteger('id_users');
            $table->integer('identitas_diri');
            $table->integer('github');
            $table->integer('linkedin');
            $table->integer('instagram');
            $table->integer('proposal');
            $table->integer('surat_rekomendasi');
            $table->timestamps();

            $table->foreign('id_magang')->references('id')->on('magang')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian_magang');
    }
}
