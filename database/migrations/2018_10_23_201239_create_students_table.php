<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no',50)->index()->unique();
            $table->foreignId('campus_id')->index()->nullable();
            $table->foreignId('faculty_id')->index()->nullable();
            $table->foreignId('user_id')->index();
            $table->foreignId('year_id')->index()->nullable();
            $table->string('form4_index_no',100);
            $table->string('form6_index_no',100)->nullable();
            $table->string('admission_no',50)->nullable();
            $table->string('marital_status',50)->nullable();
            $table->tinyInteger('srs')->default(0);
            $table->tinyInteger('sps')->default(0);
            $table->tinyInteger('acs')->default(0);
            $table->tinyInteger('dvs')->default(0);
            $table->tinyInteger('ras')->default(0);
            $table->integer('program_id')->index()->nullable();
            $table->string('admission_year',20);
            $table->string('graduation_year',20)->nullable();
            $table->string('dob',50)->nullable();
            $table->string('dob_place',30)->nullable();
            $table->integer('year_of_study');

            $table->string('mailing_address',50)->nullable();
            $table->string('email_address',60)->nullable();
            $table->string('issued_date',30)->nullable();
            $table->string('admission_date',30)->nullable();

            $table->string('mobile_no',10)->nullable();

            $table->text('status');
            $table->text('status_descriptions')->nullable();
            $table->enum('reg_status',[0,1,2])->default(0)->comment="0:partial,1:full";

            $table->string('sponsorship',30)->nullable();
            $table->string('citizenship',30)->nullable();
            $table->tinyInteger('result_display')->nullable();

            $table->integer('admitted_by')->index()->nullable();
            $table->tinyInteger('is_disabled')->nullable();

            $table->foreignId('manner_of_entry_id')->nullable();
            $table->tinyInteger('on_campus_accommodation')->nullable();


            $table->tinyInteger('tag')->nullable();
            $table->tinyInteger('temp_tag')->nullable();
            $table->foreignId('intake_category_id')->index()->nullable();

            $table->timestamps();
            $table->softDeletes();

        });

        Schema::table('students', function (Blueprint $table) {
            $table->unique(['reg_no','year_id']);
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('academic_years')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('intake_category_id')->references('id')->on('intake_categories')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('manner_of_entry_id')->references('id')->on('manner_of_entries')->onUpdate('cascade')->onDelete('set null');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }

}
