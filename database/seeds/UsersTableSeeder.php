<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        \App\User::create([
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
