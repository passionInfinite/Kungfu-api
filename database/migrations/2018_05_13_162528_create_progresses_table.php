<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progresses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('from_rank_id');
            $table->unsignedInteger('to_rank_id');
            $table->date('date');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('from_rank_id')->references('id')->on('ranks');
            $table->foreign('to_rank_id')->references('id')->on('ranks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('progresses');
    }
}
