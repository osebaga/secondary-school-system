<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddcolumnToCoursesummaryresult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_result_summaries', function (Blueprint $table) {
            //
            $table->string('totalstudentcourse')->nullable();
            $table->string('totalgradeApercent')->nullable();
            $table->string('totalgradeBpluspercent')->nullable();
            $table->string('totalgradeBpercent')->nullable();
            $table->string('totalgradeCpercent')->nullable();
            $table->string('totalgradeDpercent')->nullable();
            $table->string('totalgradeFpercent')->nullable();
            $table->string('totalgradeABSCpercent')->nullable();
          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_result_summaries', function (Blueprint $table) {
            //
        });
    }
}
