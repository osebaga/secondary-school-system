<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id');
            $table->string('reg_no',50);
            $table->string('channel_transaction_id',)->nullable();
            $table->string('ega_reference')->nullable();
            $table->string('reference_number')->nullable();
            $table->unsignedBigInteger('payment_type_id');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->unsignedInteger('invoice_number')->nullable();
            $table->string('control_number')->nullable();
            $table->double('paid_amount',65,2)->nullable();
            $table->timestamp('transaction_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('payment_channel')->nullable();
            $table->string('payer_mobile')->nullable();
            $table->string('payer_name')->nullable();
            $table->string('payer_email')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('channel_name')->nullable();
            $table->string('redirect_link')->nullable();
           $table->tinyInteger('sent')->default(0);
           $table->string('currency')->nullable();
           $table->string('bill_id')->nullable();
           $table->text('print_receipt')->nullable();

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
        Schema::dropIfExists('payments');
    }
}
