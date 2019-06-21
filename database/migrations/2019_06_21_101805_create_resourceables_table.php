<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resourceables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('resource_id')->nullable();
            $table->foreign('resource_id')->references('id')->on('resources');
            $table->unsignedBigInteger('resourceable_id');
            $table->string('resourceable_type');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resourceables');
    }
}