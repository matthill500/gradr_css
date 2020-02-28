<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesQuestionsGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes_questions_generals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('question_id')->unsigned();
            $table->boolean('voted');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions_generals')->onDelete('cascade');
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
        Schema::dropIfExists('votes_questions_generals');
    }
}
