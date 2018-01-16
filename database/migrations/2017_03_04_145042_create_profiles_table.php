<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->String('firstName');
            $table->String('lastName');
            $table->String('phone')->nullable();
            $table->String('degree');
            $table->String('linkedinLink')->nullable();
            $table->String('profile_img')->default("default-user.jpg");
            $table->String('cv_link');
            $table->text('objective');
            $table->text('techs');
            $table->integer('user_id');
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
        Schema::dropIfExists('profiles');
    }
}
