<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('study_level_id')->index();
            $table->foreignId('year_id');
            $table->string('grade',3);
            $table->double('high_value',5,2);
            $table->double('low_value',4,2);
            $table->double('grade_point',4,2);
            $table->decimal('left_value',8,4);
            $table->string('operator',1);
            $table->decimal('right_value',8,4);
            $table->unsignedInteger('point_decimal_place')->default(0);

            $table->timestamps();
            //$table->unique(['grade','scheme_id']);
            $table->foreign('study_level_id')->references('id')->on('study_levels')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
