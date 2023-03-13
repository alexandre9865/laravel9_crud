<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if(!Schema::hasTable('profile')){
            Schema::create('profile', function (Blueprint $table) {
                $table->integer('id_profile')->unsigned()->autoIncrement();
                $table->string('first_name',65);
                $table->string('last_name',65);
                $table->date('dbo');
                $table->integer('gender');
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('profile');
    }
};