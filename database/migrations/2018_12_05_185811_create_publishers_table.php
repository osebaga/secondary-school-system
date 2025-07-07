<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('staff_id');
            $table->foreignId('faculty_id');
            $table->foreignId('year_id');
            $table->foreignId('semester');
            $table->string('yos',50)->default('All Students');
            $table->tinyInteger( 'status');
            $table->timestamps();
            $table->foreign('staff_id')->references('id')->on('staffs')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publishers');
    }
}
