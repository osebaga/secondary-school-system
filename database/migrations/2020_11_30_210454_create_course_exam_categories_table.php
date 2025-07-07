<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseExamCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_exam_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id');
            $table->string('course_code');
            $table->foreignId('year_id');
            $table->foreignId('semester_id');
            $table->foreignId('exam_category_id');
            $table->timestamps();
        });
        Schema::table('course_exam_categories', function (Blueprint $table) {
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_exam_categories');
    }
}
