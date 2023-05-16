<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
              'name' => 'admin',
              'email' => 'admin@gmail.com',
              'is_admin' => '1',
              'img' => 'admin.png',
              'password'=> bcrypt('admin'),
            ],
            [
              'name' => 'user',
              'email' => 'user@gmail.com',
              'is_admin' => '0',
              'img' => 'admin.png',
              'password'=> bcrypt('admin'),
            ]
            ];

            foreach ($user as $key => $value) {
                User::create($value);
            }
    }
}
