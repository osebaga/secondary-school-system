<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatTableSemesterresult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semesterresult', function (Blueprint $table) {
            $table->id();
            $table->string('RegNo')->nullable();
            $table->string('ca_score1')->nullable();
            $table->string('se_scrore1')->nullable();
            $table->string('total_score1')->nullable();
            $table->string('DG1')->nullable();
            $table->string('course_id1')->nullable();
            $table->string('ca_score2')->nullable();
            $table->string('se_scrore2')->nullable();
            $table->string('total_score2')->nullable();
            $table->string('DG2')->nullable();
            $table->string('course_id2')->nullable();
            $table->string('ca_score3')->nullable();
            $table->string('se_scrore3')->nullable();
            $table->string('total_score3')->nullable();
            $table->string('DG3')->nullable();
            $table->string('course_id3')->nullable();
            $table->string('ca_score4')->nullable();
            $table->string('se_scrore4')->nullable();
            $table->string('total_score4')->nullable();
            $table->string('DG4')->nullable();
            $table->string('course_id4')->nullable();
            $table->string('ca_score5')->nullable();
            $table->string('se_scrore5')->nullable();
            $table->string('total_score5')->nullable();
            $table->string('course_id5')->nullable();
            $table->string('ca_score6')->nullable();
            $table->string('se_scrore6')->nullable();
            $table->string('total_score6')->nullable();
            $table->string('DG6')->nullable();
            $table->string('course_id6')->nullable();
            $table->string('ca_score7')->nullable();
            $table->string('se_scrore7')->nullable();
            $table->string('total_score7')->nullable();
            $table->string('DG7')->nullable();
            $table->string('course_id7')->nullable();
            $table->string('ca_score8')->nullable();
            $table->string('se_scrore8')->nullable();
            $table->string('total_score8')->nullable();
            $table->string('DG8')->nullable();
            $table->string('course_id8')->nullable();
            $table->string('ca_score9')->nullable();
            $table->string('se_scrore9')->nullable();
            $table->string('total_score9')->nullable();
            $table->string('DG9')->nullable();
            $table->string('course_id9')->nullable();
            $table->string('ca_score10')->nullable();
            $table->string('se_scrore10')->nullable();
            $table->string('total_score10')->nullable();
            $table->string('DG10')->nullable();
            $table->string('course_id10')->nullable();
            $table->string('gpa')->nullable();
            $table->string('award')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('semesterresult');
    }
}
