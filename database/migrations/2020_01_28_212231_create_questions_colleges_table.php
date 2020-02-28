<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_colleges', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title');
          $table->string('info');
          $table->boolean('delete')->default(0);
          $table->integer('votes')->default(0);
          $table->bigInteger('student_id')->unsigned();
          $table->bigInteger('college_id')->unsigned();
          $table->timestamps();

          $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
          $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions_colleges');
    }
}
