<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{

    public function run()
    {
        $data = [
            'email'      => 'root@gedratecnologia.com.br',
            'first_name' => 'Root',
            'last_name'  => 'Gedra Tecnologia',
            'password'   => Hash::make(123123),
        ];

        $UserType = UserType::find(1);
        $UserType->users()->create($data);
    }
}
