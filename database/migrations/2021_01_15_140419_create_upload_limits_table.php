<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadLimitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upload_limits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_id');
            $table->foreignId('semester_id');
            $table->foreignId('campus_id')->nullable();
            $table->foreignId('faculty_id')->nullable();
            $table->foreignId('intake_category_id');
            $table->tinyInteger('status');
            $table->dateTime('dead_line')->nullable();
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
        Schema::dropIfExists('upload_limits');
    }
}
