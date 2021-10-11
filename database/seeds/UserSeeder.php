<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'phone' => '000000000',
                'password' => bcrypt('admin'),
                'is_admin' => 1,
            ],
            [
                'name' => 'user',
                'email' => 'user@mail.com',
                'phone' => '000000001',
                'password' => bcrypt('user'),
                'is_admin' => 0,
            ],
        ]);
    }
}
