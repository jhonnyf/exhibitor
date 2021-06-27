<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesContents extends Migration
{

    public function up()
    {
        Schema::create('files_contents', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('active')->default(1);
            $table->foreignId('file_id')->references('id')->on('files')->cascadeOnDelete();
            $table->string('title', 256)->nullable();
            $table->text('content')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('files_contents');
    }
}
