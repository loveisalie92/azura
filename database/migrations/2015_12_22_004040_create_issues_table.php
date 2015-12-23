<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIssuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('areaID')->unsigned()->index();
            $table->string('photo', 255);
            $table->string('ownerComment', 8000);
            $table->string('solution', 50);
            $table->string('builderComment', 8000);
            $table->integer('state');
            $table->dateTime('completedAt')->nullable();
            $table->dateTime('createDatetime');
            $table->dateTime('ownerDatetime');
            $table->dateTime('builderDatetime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('issues');
    }
}
