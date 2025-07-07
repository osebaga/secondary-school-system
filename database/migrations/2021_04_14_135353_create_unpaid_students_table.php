<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnpaidStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unpaid_students', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no',50)->index();
            $table->string('name');
            $table->string('year_id');
            $table->string('semester_id');
            $table->string('blocked_by');
            $table->timestamp('blocked_date');
            $table->string('unblocked_by');   
            $table->timestamp('unblocked_date');         
            $table->string('status');
            $table->string('reason');
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
        Schema::dropIfExists('unpaid_students');
    }
}
