<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddcolumnToCourseResultsSummary extends Migration
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
            $table->Integer('total_A_male')->default(0);
            $table->Integer('total_A_female')->default(0);
            $table->Integer('total_A')->default(0);
            $table->Integer('total_B_plus_male')->default(0);
            $table->Integer('total_B_plus_female')->default(0);
            $table->Integer('total_B_plus')->default(0);
            $table->Integer('total_B_male')->default(0);
            $table->Integer('total_B_female')->default(0);
            $table->Integer('total_B')->default(0);
            $table->Integer('total_C_male')->default(0);
            $table->Integer('total_C_female')->default(0);
            $table->Integer('total_C')->default(0);
            $table->Integer('total_D_male')->default(0);
            $table->Integer('total_D_female')->default(0);
            $table->Integer('total_D')->default(0);
            $table->Integer('total_F_male')->default(0);
            $table->Integer('total_F_female')->default(0);
            $table->Integer('total_F')->default(0);
            $table->Integer('total_ABS_male')->default(0);
            $table->Integer('total_ABSC_male')->default(0);
            $table->Integer('total_ABSC')->default(0);
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
