<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamLookupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_lookups', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no',50)->index();
            $table->foreignId('year_id');
            $table->integer('year_of_study');
            $table->foreignId('course_id');
            $table->string('course_code');
            $table->tinyInteger('sit');
            $table->decimal('score',6,2)->default('-999');
            $table->string('remark');
            $table->unique(['reg_no','year_id','course_id','sit']);


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
        Schema::dropIfExists('exam_lookups');
    }
}
