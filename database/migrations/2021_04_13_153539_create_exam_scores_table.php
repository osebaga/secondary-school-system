<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_scores', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no',50)->index();
            $table->string('year_id');
            $table->string('semester_id');
            $table->string('course_id');
            $table->string('exam_category_id');
            $table->string('uploadedby');
            $table->Integer('assignment1')->nullable();
            $table->Integer('assignment2')->nullable();
            $table->Integer('test1')->nullable();
            $table->Integer('test2')->nullable();
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
        Schema::dropIfExists('exam_scores');
    }
}
