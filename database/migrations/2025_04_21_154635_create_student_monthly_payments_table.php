<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentMonthlyPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_monthly_payments', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('full_name')->nullable();;
            $table->double('amount',100,2);
            $table->string('month_payment');
            $table->string('year')->nullable();
            $table->string('account_year')->nullable();
            $table->string('prog_code')->nullable();
            $table->string('nta_level')->nullable();
            $table->string('fee_name')->nullable();
            $table->string('description')->nullable();
            $table->date('imported_date')->nullable();
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
        Schema::dropIfExists('student_monthly_payments');
    }
}
