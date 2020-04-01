<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_colleges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('answer');
            $table->boolean('delete')->default(0);
            $table->integer('votes')->default(0);
            $table->bigInteger('question_id')->unsigned();
            $table->bigInteger('student_id')->unsigned();
            $table->string('type');
            $table->timestamps();

            $table->foreign('question_id')->references('id')->on('questions_colleges')->onDelete('cascade');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers_colleges');
    }
}
