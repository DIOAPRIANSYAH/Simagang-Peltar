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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_detail_users')->nullable(); // Foreign key to detail_users table
            $table->string('name', 255);
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
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->integer('type')->default(0); // type Users: 0=>User, 1=>Admin, 2=>Manager
            $table->string('provinsi', 100)->nullable();
            $table->string('kabupaten', 100)->nullable();
            $table->string('kecamatan', 100)->nullable();
            $table->string('desa', 100)->nullable();
            $table->rememberToken();
            $table->timestamps();

            // Defining the foreign key constraint
            $table->foreign('id_detail_users')->references('id')->on('detail_users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
