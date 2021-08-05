<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Jair',
            'email' => 'admin@mail.com',
            'password' =>  bcrypt('12345678')
        ]);
    }
}
