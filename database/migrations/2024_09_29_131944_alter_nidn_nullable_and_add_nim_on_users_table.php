<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterNidnNullableAndAddNimOnUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Ubah nidn menjadi nullable
            $table->string('nidn')->nullable()->change();
            // Tambahkan nim untuk mahasiswa
            $table->string('nim')->nullable()->after('nidn'); // Kolom nim setelah nidn
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Kembalikan nidn ke semula (tidak nullable)
            $table->string('nidn')->nullable(false)->change();
            // Hapus nim jika rollback
            $table->dropColumn('nim');
        });
    }
}
