<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
           $table->string('address')->nullable();
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('email1');
            $table->string('email2')->nullable();
            $table->string('region');
            $table->string('district');
            $table->timestamps();
        });
        Schema::table('student_contacts', function (Blueprint $table) {
            $table->foreign('reg_no')->references('reg_no')->on('students')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_contacts');
    }
}
