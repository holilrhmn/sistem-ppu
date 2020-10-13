<?php

use Illuminate\Database\Seeder;
use App\User;
class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'level' => '50',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'level' => '100',
            'password' => Hash::make('superadmin123'),
        ]);
    }
}
