<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCaScoreAndSeScoreInCourseResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('course_results', function (Blueprint $table) {
            $table->decimal('ca_score')->default(-999)->after('credits');
            $table->decimal('se_score')->default(-999)->after('ca_score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_results', function (Blueprint $table) {
            //
        });
    }
}
