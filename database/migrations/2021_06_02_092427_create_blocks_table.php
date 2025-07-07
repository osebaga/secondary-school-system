<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hostel_id')->index()->nullable();
            $table->string('block_name');
            $table->integer('block_capacity');
            $table->integer('number_of_floor');
            $table->integer('number_of_room');
            $table->timestamps();
            $table->softDeletes();
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
        Schema::dropIfExists('blocks');
    }
}
