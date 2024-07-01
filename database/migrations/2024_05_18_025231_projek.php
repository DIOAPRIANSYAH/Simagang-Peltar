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
        Schema::create('projek', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('id_detail_users'); // Foreign key to detail_users table
            $table->string('judul', 500); // Project title
            $table->string('jenis', 255); // Type of project
            $table->string('status', 100); // Status of the project
            $table->string('surat_pengantar', 500)->nullable(); // Path to the cover letter
            $table->string('link_github', 255)->nullable(); // GitHub link
            $table->string('dokumentasi_pengerjaan1', 500)->nullable(); // Documentation link 1
            $table->string('dokumentasi_pengerjaan2', 500)->nullable(); // Documentation link 2
            $table->string('dokumentasi_pengerjaan3', 500)->nullable(); // Documentation link 3
            $table->timestamps(); // Created at and updated at timestamps

            // Defining the foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projek'); // Drops the table if it exists
    }
};
