<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesUsers extends Migration
{
  
    public function up()
    {
        Schema::create('file_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('file_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->primary(['file_id', 'user_id']);

            $table->foreign('file_id')->references('id')->on('files')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }


    public function down()
    {
        Schema::dropIfExists('file_user');
    }
}
