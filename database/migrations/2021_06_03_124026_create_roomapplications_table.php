<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomapplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roomapplications', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->unique();
            $table->foreignId('year_id')->index()->nullable();
            $table->foreignId('criteria_id')->index()->nullable();
            $table->longtext('reason');
            $table->timestamp('received');
            $table->integer('status')->default(0);
            $table->timestamp('processed');
            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('criteria_id')->references('id')->on('criterias')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roomapplications');
    }
}
