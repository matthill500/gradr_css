<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesAnswersModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes_answers_modules', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->bigInteger('answer_id')->unsigned();
          $table->boolean('voted');
          $table->bigInteger('user_id')->unsigned();
          $table->timestamps();

          $table->foreign('answer_id')->references('id')->on('answers_modules')->onDelete('cascade');
          $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes_answers_modules');
    }
}
