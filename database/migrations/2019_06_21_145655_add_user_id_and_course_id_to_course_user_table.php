<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdAndCourseIdToCourseUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_user', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('course_id')->unsigned()->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete(' SET NULL');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete(' SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_user', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['course_id']);
        });

        Schema::table('course_user', function (Blueprint $table) {
            $table->dropColumn('user_id');
            $table->dropColumn('course_id');
        });
    }
}
