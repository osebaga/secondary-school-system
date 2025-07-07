<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_results', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no',50)->index();
            $table->foreignId('year_id');
            $table->foreignId('semester_id');
            $table->foreignId('course_id');
            $table->decimal('credits');
            $table->decimal('total_score');
            $table->string('grade');
            $table->decimal('points')->default(0.0);
            $table->decimal('gpa')->default(0.00);
            $table->string('remarks')->default(null);
            $table->integer('year_of_study');
            $table->unique(['reg_no','year_id','semester_id','course_id']);
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
        Schema::dropIfExists('course_results');
    }
}
