<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeeRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee_rates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id');
            $table->foreignId('fee_type_id');
            $table->string('program_code');
            $table->double('amount',15,2);
             $table->tinyInteger('pay_exact');
             $table->double('first_instalment')->nullable();
             $table->double('second_instalment')->nullable();
             $table->double('third_instalment')->nullable();
             $table->double('fourth_instalment')->nullable();
             $table->double('debtor_limit')->nullable();
             $table->unsignedInteger('year_of_study')->nullable();
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
        Schema::dropIfExists('fee_rates');
    }
}
