<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersOthers extends Migration
{
 
    public function up()
    {
        Schema::create('users_others', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->text('bio');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users_others');
    }
}
