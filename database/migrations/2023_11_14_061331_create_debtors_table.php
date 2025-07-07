<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debtors', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('account_year')->nullable();
            $table->string('year_id')->nullable();
            $table->double('amount',100,2);
            $table->string('side')->nullable();;
            $table->string('std_name')->nullable();;
            $table->string('fee_name')->nullable();
            $table->string('prog_name')->nullable();
            $table->string('prog_code')->nullable();
            $table->string('nta_level')->nullable();
            $table->string('intake')->nullable();
            $table->string('campus')->nullable();
            $table->string('std_status')->nullable();
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
        Schema::dropIfExists('debtors');
    }
}
