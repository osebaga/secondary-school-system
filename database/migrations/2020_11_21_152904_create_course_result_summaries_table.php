<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseResultSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_result_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->foreignId('year_id');
            $table->foreignId('semester_id');
            $table->unsignedInteger('total_male_pass');
            $table->unsignedInteger('total_male_fail');
            $table->unsignedInteger('total_female_pass');
            $table->unsignedInteger('total_female_fail');
            $table->unsignedInteger('total_pass');
            $table->unsignedInteger('total_fail');
            $table->unsignedInteger('grand_total');
            $table->unique(['course_id','year_id','semester_id']);
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
        Schema::dropIfExists('course_result_summaries');
    }
}
