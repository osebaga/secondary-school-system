<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntakeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intake_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('descriptions')->nullable();
            $table->string('status')->default('active');
            $table->foreignId('year_id')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('intake_categories');
    }
}
