<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_classes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->string('reg_no',50);
            $table->foreignId('year_id');
            $table->foreignId('intake_category_id');
            $table->foreignId('program_id');
            $table->unsignedInteger('session')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->integer('year_of_study');
            $table->unique(['reg_no','year_id']);
            $table->foreign('reg_no')->references('reg_no')->on('students');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_classes');
    }
}
