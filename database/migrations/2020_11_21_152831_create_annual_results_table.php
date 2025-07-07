<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnualResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annual_results', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no',50)->index();
            $table->foreignId('year_id');
            $table->decimal('total_credits');
            $table->decimal('total_points');
            $table->decimal('gpa');
            $table->string('remarks');
            $table->string('classification');
            $table->integer('year_of_study');
            $table->unique(['reg_no','year_id']);
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
        Schema::dropIfExists('annual_results');
    }
}
