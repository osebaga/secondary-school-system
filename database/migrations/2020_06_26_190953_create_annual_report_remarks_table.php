<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnualReportRemarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annual_report_remarks', function (Blueprint $table) {
            $table->id();
            $table->text('gender')->nullable();
            $table->string('reg_no')->nullable();
            $table->foreignId('year_id')->nullable();
            $table->foreignId('program_id')->index()->nullable();
            $table->text('batch_no')->nullable();
            $table->text('remark')->nullable();
            $table->unique(['reg_no','year_id']);
            $table->foreign('program_id')->references('id')->on('programs')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('annual_report_remarks');
    }
}
