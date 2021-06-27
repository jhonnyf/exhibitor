<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryCategory extends Migration
{
    
    public function up()
    {
        Schema::create('category_category', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger('primary_id');
            $table->unsignedBigInteger('secondary_id');
            $table->timestamps();

            $table->primary(['primary_id', 'secondary_id']);

            $table->foreign('primary_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreign('secondary_id')->references('id')->on('categories')->cascadeOnDelete();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('category_category');
    }
}
