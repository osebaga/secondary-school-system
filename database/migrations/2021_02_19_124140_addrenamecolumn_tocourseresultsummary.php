<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddrenamecolumnTocourseresultsummary extends Migration
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
            $table->renameColumn('total_ABS_male', 'total_ABSC_female');
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
