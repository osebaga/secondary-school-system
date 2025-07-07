<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnualResultSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annual_result_summaries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_id');
            $table->foreignId('year_id');
            $table->unsignedInteger('year_of_study'); //added by Maquiz (28/08/2021)
            $table->unsignedInteger('total_male_pass');
            $table->unsignedInteger('total_male_fail');
            $table->unsignedInteger('total_female_pass');
            $table->unsignedInteger('total_female_fail');
            $table->unsignedInteger('total_pass');
            $table->unsignedInteger('total_fail');
            $table->unsignedInteger('grand_total');
            $table->unique(['program_id','year_id','year_of_study']);
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
        Schema::dropIfExists('annual_result_summaries');
    }
}
