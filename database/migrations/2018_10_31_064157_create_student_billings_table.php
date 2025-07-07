<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_billings', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('type_id');
            $table->string('reg_no',50);
            $table->double('amount',15,2);
            $table->foreign('reg_no')->references('reg_no')->on('students')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('student_billings');
    }
}
