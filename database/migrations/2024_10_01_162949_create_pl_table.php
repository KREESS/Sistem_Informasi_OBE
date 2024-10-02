<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pl', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->string('kode_pl')->unique(); // Kode unik PL
            $table->text('profil_lulusan'); // Profil Lulusan
            $table->text('deskripsi')->nullable(); // Deskripsi
            $table->decimal('threshold', 5, 2); // Threshold batas bawah nilai
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    /**
     * Reverse the
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pl');
    }
}
