<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamCategoryResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_category_results', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no',50)->index();
            $table->foreignId('year_id');
            $table->foreignId('semester_id');
            $table->foreignId('course_id');
            $table->foreignId('exam_category_id');
            $table->decimal('exam_score',6,2)->default('-999');
            $table->unique(['reg_no','year_id','semester_id','course_id','exam_category_id'],'reg_year_sem_course_exam_unique');
            $table->timestamps();
        });
        Schema::table('exam_category_results', function (Blueprint $table) {
            $table->foreign('reg_no')->references('reg_no')->on('students')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_category_results');
    }
}
