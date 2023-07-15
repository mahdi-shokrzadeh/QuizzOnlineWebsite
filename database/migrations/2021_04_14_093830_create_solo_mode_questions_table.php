<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoloModeQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solo_mode_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('game_id');
            $table->string('is_true'); // T F N (didn't submit)
            $table->integer('question_number');
            $table->integer('question_id');
            $table->integer('expire_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solo_mode_questions');
    }
}
