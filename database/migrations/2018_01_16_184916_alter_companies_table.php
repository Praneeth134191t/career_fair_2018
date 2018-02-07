<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->text('sponsership_type')->after('description')->nullable();
            $table->text('technologies')->after('sponsership_type')->nullable();
            $table->text('available_vacancies')->after('technologies')->nullable();
            $table->text('responsibility')->after('available_vacancies')->nullable();
            $table->integer('user_id')->after('responsibility')->nullable();
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['sponsership_type','technologies','available_vacancies','responsibility','user_id']);
        });
    }
}
