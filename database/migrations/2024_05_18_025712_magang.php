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
        Schema::create('magang', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('id_projek'); // Foreign key to projek table
            $table->unsignedBigInteger('id_users'); // Foreign key to users table
            $table->string('surat_rekomendasi', 500)->nullable(); // Path to recommendation letter
            $table->string('status', 100); // Status
            $table->string('surat_pengantar', 500)->nullable(); // Path to cover letter
            $table->string('dosen_pembimbing_lapangan', 255); // Field supervisor
            $table->string('dosen_pembimbing_kampus', 255); // Campus supervisor
            $table->string('satuan_kerja', 255); // Work unit
            $table->date('tanggal_mulai'); // Start date
            $table->date('tanggal_berakhir'); // End date
            $table->timestamps(); // Created at and updated at timestamps

            // Defining the foreign key constraints
            $table->foreign('id_projek')->references('id')->on('projek')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projek_users'); // Drops the table if it exists
    }
};
