<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_galleries', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('active')->default(1);
            $table->string('file_gallery', 100);
            $table->string('module', 50);
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
        Schema::dropIfExists('files_galleries');
    }
}
