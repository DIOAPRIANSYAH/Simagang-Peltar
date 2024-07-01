<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_users')->nullable();
            $table->string('Nama', 255);
            $table->date('tgl_lahir');
            $table->string('agama', 100);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nama_sekolah', 255);
            $table->string('pendidikan', 50);
            $table->string('jurusan', 100);
            $table->string('nomor_induk', 100);
            $table->string('no_hp', 50);
            $table->string('email', 255)->unique();
            $table->string('sertifikat_kelulusan', 500)->nullable();
            $table->string('foto', 500)->nullable();
            $table->string('cv', 500)->nullable();
            $table->string('link_profile_linkedin', 255)->nullable();
            $table->string('link_profile_instagram', 255)->nullable();
            $table->string('provinsi', 100)->nullable();
            $table->string('kabupaten', 100)->nullable();
            $table->string('kecamatan', 100)->nullable();
            $table->string('desa', 100)->nullable();
            $table->enum('status', ['selesai', 'belum selesai'])->default('belum selesai');
            $table->timestamps();

            // Defining the foreign key constraint
            $table->foreign('id_users')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
};