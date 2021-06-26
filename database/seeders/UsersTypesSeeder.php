<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UsersTypesSeeder extends Seeder
{

    public function run()
    {
        UserType::create(['user_type' => 'Administrador']);
        UserType::create(['user_type' => 'Exibidor']);
    }
}
