<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCplTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cpl', function (Blueprint $table) {
            $table->id(); // Primary key, auto-increment
            $table->string('kode_cpl')->unique(); // Kode CPL, harus unik
            $table->string('cpl'); // Nama atau judul CPL
            $table->text('deskripsi'); // Deskripsi dari CPL
            $table->float('threshold')->default(0); // Batas minimum/threshold untuk CPL, dengan default 0
            $table->unsignedBigInteger('pl_id'); // Foreign key untuk Profil Lulusan (PL)
            $table->timestamps(); // Timestamps for created_at and updated_at
            // Menambahkan foreign key constraint
            $table->foreign('pl_id')->references('id')->on('pls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cpl');
    }
}
