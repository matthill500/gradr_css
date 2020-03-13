<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_modules', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('title');
          $table->string('info');
          $table->boolean('delete')->default(0);
          $table->integer('votes')->default(0);
          $table->integer('answers')->default(0);
          $table->bigInteger('student_id')->unsigned();
          $table->bigInteger('module_id')->unsigned();
          $table->timestamps();

          $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
          $table->foreign('module_id')->references('id')->on('modules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions_modules');
    }
}
