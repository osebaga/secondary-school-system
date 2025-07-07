<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('app_name', 100);
            $table->string('logo')->default('logo.png');
            $table->string('login_logo')->default('login.png');
            $table->tinyInteger('mode')->default(0);
            $table->unsignedInteger('row_per_page')->default(10);
            $table->string('version')->default('1.0.0');
            $table->unsignedInteger('date_format')->default(1);
            $table->string('default_email', 100);
            $table->tinyInteger('auto_reg')->default(0);
            $table->tinyInteger('captcha')->default(0);
            $table->tinyInteger('reg_ver')->default(0);
            $table->tinyInteger('allow_reg')->default(0);
            $table->tinyInteger('reg_notification')->default(0);
            $table->dateTime('corn');
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
        Schema::dropIfExists('settings');
    }
}
