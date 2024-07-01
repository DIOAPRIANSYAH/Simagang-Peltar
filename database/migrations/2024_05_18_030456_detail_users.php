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
        Schema::create('detail_users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('id_magang'); // Foreign key to magang table
            $table->unsignedBigInteger('id_users'); // Foreign key to users table
            $table->unsignedBigInteger('id_projek'); // Foreign key to projek table
            $table->timestamps(); // Created at and updated at timestamps

            // Defining the foreign key constraints
            $table->foreign('id_magang')->references('id')->on('magang')->onDelete('cascade');
            $table->foreign('id_users')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_projek')->references('id')->on('projek')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_users'); // Drops the table if it exists
    }
};
