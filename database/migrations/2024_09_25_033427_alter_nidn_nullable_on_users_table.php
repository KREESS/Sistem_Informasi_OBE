<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNidnNullableOnUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nidn')->nullable()->change(); // Ubah nidn menjadi nullable
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nidn')->nullable(false)->change(); // Kembalikan ke semula jika dibutuhkan
        });
    }
}
