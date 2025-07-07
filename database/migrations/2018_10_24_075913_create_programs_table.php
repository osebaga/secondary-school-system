<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('faculty_id')->index()->nullable();
            $table->foreignId('year_id')->index()->nullable();
            $table->text('program_name');
            $table->string('program_code',50);
            $table->string('program_acronym',50);
            $table->string('program_type',50)->nullable();
            $table->text('program_category')->nullable();
            $table->smallInteger('program_duration');
            $table->smallInteger('program_weight')->nullable();
            $table->tinyInteger('is_approved')->comment="0:No,1:Yes";
            $table->double('tuition_fee',15,2)->nullable();

            $table->tinyInteger('tag')->nullable();

            $table->timestamps();
            $table->unique(['year_id','program_code']);
            $table->index('program_code');
          $table->foreign('faculty_id')->references('id')->on('faculties')->onUpdate('cascade')->onDelete('set null');
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
        Schema::dropIfExists('programs');
    }
}
