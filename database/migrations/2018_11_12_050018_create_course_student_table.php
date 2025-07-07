<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('student_id')->index();
            $table->foreignId('course_id')->index();
            $table->string('reg_no',50);
            $table->integer('year_study')->default(1);
            $table->foreignId('semester')->index();
            $table->foreignId('year_id')->index();
            $table->tinyInteger('carry_over')->default(0);
            $table->tinyInteger('display')->default(1);
            $table->tinyInteger('change_access')->default(0);
            $table->string('cs_status',30)->default('In Progress');

            $table->timestamps();
            $table->unique(['reg_no','course_id','year_id']);
            $table->foreign('student_id')->references('id')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('reg_no')->references('reg_no')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_student');
    }
}
