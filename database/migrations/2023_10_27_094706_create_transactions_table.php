<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); 
            $table->string('payerName');
            $table->decimal('amount'); 
            $table->string('amountType');
            $table->string('currency');
            $table->string('paymentReference');
            $table->string('paymentType');
            $table->string('payerMobile')->nullable();
            $table->string('paymentDesc');
            $table->string('payerID');
            $table->string('transactionRef')->unique();
            $table->string('transactionChannel');
            $table->string('receipt');
            $table->date('transactionDate');
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
        Schema::dropIfExists('transactions');
    }
}
