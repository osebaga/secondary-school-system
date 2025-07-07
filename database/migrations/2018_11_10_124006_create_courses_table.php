<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('department_id')->index()->nullable();
            $table->foreignId('year_id')->index()->nullable();
            $table->string('course_code',10)->index();
            $table->string('course_name',255);
            $table->string('course_category',100);
            $table->decimal('min_cw',15,2)->default(16);
            $table->string('score_type',20);
            $table->foreignId('study_level_id')->index()->nullable();
            $table->char('pass_grade',2);
            $table->decimal('unit',15,2);
            $table->decimal('cw',15,2);
            $table->decimal('final',15,2);
            $table->decimal('min_ue',15,2)->nullable();
            $table->timestamps();
            $table->unique(['course_code','year_id','department_id']);
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('study_level_id')->references('id')->on('study_levels')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
