<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direct_costs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id');
            $table->foreignId('campus_id');
            $table->double('amount',15,2);
            $table->double('amount_min_sem1',15,2);
            $table->double('first_year_amount',15,2);
            $table->double('first_year_amount_min_sem1',15,2);
            $table->double('amount_graduate',15,2);
            $table->double('first_year_amount_graduate',15,2);
            $table->timestamps();
            $table->unique(['year_id','campus_id']);
            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('campus_id')->references('id')->on('campuses')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direct_costs');
    }
}
