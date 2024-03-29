<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        static $password;
        DB::table('users')->insert([
                        'name' => 'Victoria',
                        'role_id' => 1,
                        'email' => 'asu_bodnar@voe.com.ua',
                        'password' => $password ?: $password = bcrypt('123456')
                        //'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
                        'name' => 'Tamara',
                        'role_id' => 2,
                        'email' => 'dv4@voe.com.ua',
                        'password' => $password ?: $password = bcrypt('123456')
                        //'remember_token' => str_random(10),
        ]);                 
         //factory(App\User::class, 50)->create();

    }
}
