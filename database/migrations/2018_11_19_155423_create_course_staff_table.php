<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_staff', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('course_id');
            $table->foreignId('staff_id');
            $table->foreignId('year_id');
            $table->foreignId('assigned_by');
            $table->string('stream')->default("A");
            $table->unique(['course_id','staff_id','year_id','stream']);
            $table->index('staff_id');
            $table->index('course_id');
            $table->index('assigned_by');

            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('staff_id')->references('id')->on('staffs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('assigned_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('course_staff');
    }
}
