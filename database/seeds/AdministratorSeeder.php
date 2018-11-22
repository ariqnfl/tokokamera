<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
           'name' => 'admin',
           'email' => 'admin@gmail.com',
           'type' => 'admin',
           'username' => 'administrator',
           'password' => bcrypt('admin123')
        ]);
    }
}
