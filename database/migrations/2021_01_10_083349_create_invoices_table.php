<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id')->nullable();
            $table->foreignId('year')->nullable();
            $table->foreignId('fee_type_id')->nullable();
            $table->string('reg_no',50);
            $table->string('type',50)->nullable();
            $table->double('amount',100,2);
            $table->string('gfs_code')->nullable();
            $table->string('control_number')->nullable();
            $table->integer('status')->default(0);
            $table->text('description');
            $table->string('fee_name')->nullable();
            $table->string('invoice_type')->nullable();
            $table->tinyInteger('sent')->default(0);
            $table->string('invoice_number')->nullable();
            $table->double('fee_amount',100,2);
            $table->unsignedInteger('fee_category')->nullable();
            $table->unsignedInteger('nta_level')->nullable();
            $table->string('currency')->nullable();
            $table->text('print_invoice')->nullable();
            $table->text('print_transfer')->nullable();
            $table->double('equivalent_amount',100,2);
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
        Schema::dropIfExists('invoices');
    }
}
