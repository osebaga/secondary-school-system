<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campus_id')->nullable();
            $table->string('salutation',10);
            $table->foreignId('department_id')->nullable();
            $table->foreignId('building_id')->index()->nullable();
            $table->string('office_room_number',10)->nullable();
            $table->foreignId('position_id')->index();
            $table->string('mobile_number',20)->nullable();
            $table->string('office_phone_number')->nullable();
            $table->string('email_address',60)->nullable();
            $table->foreignId('user_id')->index();
            $table->foreignId('year_id')->index();

            $table->timestamps();
            $table->index('department_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
}
