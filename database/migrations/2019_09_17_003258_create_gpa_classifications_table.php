<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGpaClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gpa_classifications', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('study_level_id')->index();
            $table->foreignId('year_id');
            $table->string('class_award',30);
            $table->decimal('high_gpa',5,2);
            $table->decimal('low_gpa',5,2);
            $table->timestamps();
            //$table->unique(['grade','scheme_id']);
            $table->foreign('study_level_id')->references('id')->on('study_levels')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gpa_classifications');
    }
}
