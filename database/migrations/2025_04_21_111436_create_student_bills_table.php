<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_bills', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->unsignedBigInteger('year_id');
            $table->string('account_year')->nullable();
            $table->double('amount',100,2);
            $table->string('full_name')->nullable();;
            $table->string('fee_name')->nullable();
            $table->string('prog_name')->nullable();
            $table->string('prog_code')->nullable();
            $table->string('nta_level')->nullable();
            $table->string('description')->nullable();
            $table->date('bill_date')->nullable();
            $table->string('rsv1')->nullable();;
            $table->string('rsv2')->nullable();
            $table->string('rsv3')->nullable();
            $table->string('rsv4')->nullable();
            $table->string('rsv5')->nullable();
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
        Schema::dropIfExists('student_bills');
    }
}
