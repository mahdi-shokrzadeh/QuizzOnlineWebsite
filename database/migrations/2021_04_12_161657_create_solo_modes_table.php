<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoloModesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solo_modes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('subject_id');
            $table->string('is_finished');
            $table->string('questions_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solo_modes');
    }
}
