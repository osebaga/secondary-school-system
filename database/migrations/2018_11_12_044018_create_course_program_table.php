<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_program', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('course_id');
            $table->foreignId('program_id');
            $table->foreignId('year_id')->nullable();
            $table->unsignedInteger('year');
            $table->tinyInteger('core');
            $table->unsignedInteger('semester');
            $table->timestamps();
            $table->unique(['course_id','program_id','year_id','year']);
            $table->index('course_id');
            $table->index('program_id');
            $table->index('year_id');
            $table->index('year');
            $table->index('semester');
            $table->string('stream')->default("A");
            $table->foreign('program_id')->references('id')->on('programs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('set null');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_program');
    }
}
