<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBadgeUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('badge_user', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('badge_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();

            $table->foreign('badge_id')->references('id')->on('badges')->onDelete('SET NULL');
            $table->foreign('user_id')->references('id')->on('badges')->onDelete('SET NULL');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('badge_user', function (Blueprint $table) {
            $table->dropForeign(['badge_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('badge_user');
    }
}
