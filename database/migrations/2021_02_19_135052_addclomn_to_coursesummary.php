<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddclomnToCoursesummary extends Migration
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
            $table->string('totalstudentcoursefemale')->nullable();
            $table->string('totalstudentcoursemale')->nullable();

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
