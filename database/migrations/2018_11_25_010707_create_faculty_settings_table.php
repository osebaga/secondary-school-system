<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultySettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_settings', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('faculty_id')->index();
            $table->foreignId('intake_category_id')->nullable();
            $table->foreignId('year_id')->index();
            $table->tinyInteger('sem1')->default(0);
            $table->tinyInteger('sem1_ca')->default(0);


            $table->tinyInteger('sem2')->default(0);
            $table->tinyInteger('sem2_ca')->default(0);


            $table->tinyInteger('sem3')->default(0);
            $table->tinyInteger('sem3_ca')->default(0);


            $table->tinyInteger('sem4')->default(0);
            $table->tinyInteger('sem4_ca')->default(0);


            $table->tinyInteger('sem1_upload')->default(0);
            $table->tinyInteger('sem2_upload')->default(0);
            $table->tinyInteger('sem3_upload')->default(0);
            $table->tinyInteger('sem4_upload')->default(0);
            $table->tinyInteger('sup_upload')->default(0);
            $table->tinyInteger('registration')->default(0);
            $table->tinyInteger('sem1_registration')->default(0);
            $table->tinyInteger('sem2_registration')->default(0);


            $table->tinyInteger('sem1_status')->default(0);
            $table->tinyInteger('sem2_status')->default(0);

            $table->tinyInteger('sem1_finalist')->default(0);
            $table->tinyInteger('sem2_finalist')->default(0);



            $table->timestamps();
            $table->foreign('faculty_id')->references('id')->on('faculties')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('intake_category_id')->references('id')->on('intake_categories')->onUpdate('cascade')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_settings');
    }
}
