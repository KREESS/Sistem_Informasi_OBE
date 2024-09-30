<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUsersTableNullable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable()->change(); // Make name nullable
            $table->string('email')->nullable()->unique()->change(); // Make email nullable
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name')->nullable(false)->change(); // Revert name to not nullable
            $table->string('email')->nullable(false)->unique()->change(); // Revert email to not nullable
        });
    }
}
