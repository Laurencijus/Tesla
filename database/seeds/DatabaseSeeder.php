<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => 'Lana',
            'email' => 'zanaborovikaite@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Lana2',
            'email' => 'zanaborovikaite2@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
