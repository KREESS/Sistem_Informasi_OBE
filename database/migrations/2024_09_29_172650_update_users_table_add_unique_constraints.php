<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableAddUniqueConstraints extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add unique constraints
            $table->string('nim')->nullable()->unique()->change();
            $table->string('nidn')->nullable()->unique()->change();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Rollback the changes if needed
            $table->dropUnique(['nim']);
            $table->dropUnique(['nidn']);
        });
    }
}
