<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserParameters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('name');
            $table->string('github_id');
            $table->string('github_access_token');
            $table->string('github_refresh_token');
            $table->string('github_username');
            $table->string('avatar_url');

            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
        });
    }
}
