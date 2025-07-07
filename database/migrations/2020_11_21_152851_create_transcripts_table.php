<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranscriptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transcripts', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no',50)->index();
            $table->foreignId('year_id');
            $table->foreignId('semester_id');
            $table->decimal('total_credits');
            $table->decimal('total_points');
            $table->decimal('gpa');
            $table->string('remarks');
            $table->string('classification');
            $table->unique(['reg_no','year_id','semester_id']);
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
        Schema::dropIfExists('transcripts');
    }
}
