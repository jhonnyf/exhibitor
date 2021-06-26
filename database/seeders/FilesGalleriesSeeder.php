<?php

namespace Database\Seeders;

use App\Models\FileGallery;
use Illuminate\Database\Seeder;

class FilesGalleriesSeeder extends Seeder
{

    public function run()
    {
        FileGallery::create(['file_gallery' => 'Principal', 'module' => '']);
    }
}
