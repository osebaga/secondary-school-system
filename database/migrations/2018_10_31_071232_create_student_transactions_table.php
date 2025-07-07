<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_transactions', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('staff_id');
            $table->string('reg_no',50);
            $table->foreignId('year_id');
            $table->foreignId('billing_id');
            $table->tinyInteger('is_tuition_fee')->comment="0:direct cost,1:tuition fee";
            $table->enum('semester',[1,2])->comment='1:semester one,2:semester 2';
            $table->double('amount_payed',15,2);
            $table->text('payed_by');
            $table->tinyInteger('paid_via')->default(0);

            $table->timestamps();
            $table->foreign('staff_id')->references('id')->on('staffs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('reg_no')->references('reg_no')->on('students')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('billing_id')->references('id')->on('student_billings')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_transactions');
    }
}
