<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombinationCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combination_courses', function (Blueprint $table) {
            $table->id();
            $table->string('combination_code');
            $table->foreignId('programme_id')->references('id')->on('programs');
            $table->foreignId('combination_id')->references('id')->on('combinations');
            $table->foreignId('course_id')->references('id')->on('courses');
            $table->foreignId('year_id')->references('id')->on('academic_years');
            $table->string('year_of_study');
            $table->string('semester');
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
        Schema::dropIfExists('combination_courses');
    }
}
