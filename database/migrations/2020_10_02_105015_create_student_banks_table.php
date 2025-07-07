<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_banks', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
           $table->string('bank_name');
            $table->string('account_number');
            $table->string('sponsor')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();
        });
        Schema::table('student_banks', function (Blueprint $table) {
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
        Schema::dropIfExists('student_banks');
    }
}
