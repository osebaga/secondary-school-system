<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCenterToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->foreignId('center_id')->index()->nullable();
            $table->string('rsv1')->nullable(); // Add the new column
            $table->string('rsv2')->nullable(); // Add the new column
            $table->string('rsv3')->nullable(); // Add the new column

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('center_id'); // Rollback the column addition
            $table->dropColumn('rsv1'); 
            $table->dropColumn('rsv2'); 
            $table->dropColumn('rsv3'); 
        });
    }
}
