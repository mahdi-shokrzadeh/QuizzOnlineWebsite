<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions_statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('question_id');
            $table->integer('first_option');
            $table->integer('second_option');
            $table->integer('third_option');
            $table->integer('forth_option');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions_statistics');
    }
}
