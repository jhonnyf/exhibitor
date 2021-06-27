<?php

namespace Database\Seeders;

use CategoriesSeeder;
use Database\Seeders\CategoriesSeeder as SeedersCategoriesSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([
            UsersTypesSeeder::class,
            UsersSeeder::class,
            FilesGalleriesSeeder::class,
            SeedersCategoriesSeeder::class
        ]);
    }
}
