<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeanTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mean_tests', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('year_id');
            $table->string('reg_no',50);
            $table->double('tuition_fee',15,2);
            $table->double('direct_cost',15,2)->default(0);
            $table->foreignId('batch_no')->default(0);

            $table->timestamps();
            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('reg_no')->references('reg_no')->on('students')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mean_tests');
    }
}
