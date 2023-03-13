<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('report_profiles')){
            Schema::create('report_profiles', function (Blueprint $table) {
                $table->integer('id_report_profiles')->unsigned()->autoIncrement();
                $table->integer('id_profile')->unsigned();
                $table->integer('id_report')->unsigned();
                $table->foreign('id_profile')->references('id_profile')->on('profile')->onDelete('cascade')->onUpdate('cascade');		
                $table->foreign('id_report')->references('id_report')->on('report')->onDelete('cascade')->onUpdate('cascade');
                $table->unique(['id_profile', 'id_report']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('report_profiles');
    }
};
