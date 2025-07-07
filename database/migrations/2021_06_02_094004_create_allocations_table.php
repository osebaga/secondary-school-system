<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allocations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hostel_id')->index()->nullable();
            $table->foreignId('room_id')->index()->nullable();
            $table->string('reg_no');
            $table->foreignId('year_id')->index()->nullable();
            $table->timestamp('check_out');
            $table->timestamp('check_in');
            $table->timestamps();
            $table->softDeletes();
            
            $table->unique(['reg_no','room_id']);
            $table->foreign('hostel_id')->references('id')->on('hostels')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('room_id')->references('id')->on('rooms')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('set null');
            
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('allocations');
    }
}
