<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNextOfKinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('next_of_kin', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no');
            $table->string('name');
            $table->string('gender');
            $table->string('relationship');
            $table->string('address');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->timestamps();
        });
        Schema::table('next_of_kin', function (Blueprint $table) {
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
        Schema::dropIfExists('next_of_kin');
    }
}
