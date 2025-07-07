<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campus_id');
            $table->foreignId('institution_id');
            $table->string('faculty_name',100);
            $table->string('faculty_acronym',10);
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('tel')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();
            $table->foreign('institution_id')->references('id')->on('institutions')->foreign('campus_id')->references('id')->on('campuses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}
