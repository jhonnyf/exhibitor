<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{

    public function run()
    {
        $this->create('Root');
        $this->create('Paginas', 1);
        $this->create('Home', 2);
    }

    private function create(string $title, int $category_id = null)
    {
        $response = Category::create(['default' => true]);

        $Category = Category::find($response->id);

        $Category->contents()->create(['title' => $title]);
        if (is_null($category_id) === false) {
            $Category->categoryPrimary()->attach($category_id);
        }
    }
}
