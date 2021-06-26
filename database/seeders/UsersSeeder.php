<?php

namespace Database\Seeders;

use App\Models\User;
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
        $response = $UserType->users()->create($data);

        $User = User::find($response['id']);
        $User->other()->create(['bio' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.']);
    }
}
