<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hostel_id')->index()->nullable();
            $table->foreignId('block_id')->index()->nullable();
            $table->string('room_number');
            $table->string('floor_name');
            $table->integer('capacity');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['hostel_id','block_id','room_number']);
            $table->foreign('hostel_id')->references('id')->on('hostels')->onUpdate('cascade')->onDelete('set null');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
