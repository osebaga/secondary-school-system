<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_sponsors', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('address')->nullable();
            $table->foreignId('sponsor_id')->nullable();
            $table->string('sponsor_type'); //institute or private
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('occupation')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });
        Schema::table('student_sponsors', function (Blueprint $table) {
            $table->foreign('reg_no')->references('reg_no')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sponsor_id')->references('id')->on('sponsors')->onUpdate('cascade')->onDelete('cascade');

        });
        }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_sponsors');
    }
}
