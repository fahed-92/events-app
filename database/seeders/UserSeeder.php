<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'LOL',
            'email' => 'lol@spacetoon.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Bluey',
            'email' => 'bluey@spacetoon.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Barbie',
            'email' => 'barbie@spacetoon.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Scrabble',
            'email' => 'scrabble@spacetoon.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Beybattle',
            'email' => 'beybattle@spacetoon.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Cocomelon',
            'email' => 'cocomelon@spacetoon.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'NumberBlocks',
            'email' => 'numberBlocks@spacetoon.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Cocomelon Bus',
            'email' => 'cocomelonBus@spacetoon.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Hot Wheels',
            'email' => 'hotWheels@spacetoon.com',
            'password' => Hash::make('123456'),
        ]);
        DB::table('users')->insert([
            'name' => 'Tetries',
            'email' => 'Tetries@spacetoon.com',
            'password' => Hash::make('123456'),
        ]);
//        DB::table('users')->insert([
//            'name' => 'Barbie',
//            'email' => 'barbie@spacetoon.com',
//            'password' => Hash::make('123456'),
//        ]);
        DB::table('users')->insert([
            'name' => 'Mascot Team',
            'email' => 'mascotTeam@spacetoon.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
