<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTypes extends Migration
{
    
    public function up()
    {
        Schema::create('users_types', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('active')->default(1);
            $table->string('user_type');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('users_types');
    }
}
