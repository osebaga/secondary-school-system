<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',30);
            $table->string('middle_name',30)->nullable();
            $table->string('last_name');
            $table->string('username',50);
            $table->string('email',60)->nullable();
            $table->string('password');
            $table->enum('status',[0,1])->default(1);
            $table->string('avatar',255)->default('logo.png');
            $table->enum('type',[0,1,2])->default(0)->comment="0:student,1:staff,2:normal user";
            $table->enum('gender',["M","F"])->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
