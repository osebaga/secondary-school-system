<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attachment_id');
            $table->string('attachment_path');
            $table->foreignId('applicant_id');
            $table->string('filename')->nullable();
            $table->timestamps();
            $table->foreign('attachment_id')->references('id')->on('attachments');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_attachments');
    }
}
