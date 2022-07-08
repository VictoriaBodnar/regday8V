<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(RemsTableSeeder::class);
        $this->call(OtrsTableSeeder::class);
        $this->call(TypesTableSeeder::class);
        $this->call(PaspsTableSeeder::class);
        $this->call(ConsumersTableSeeder::class);
        
    }
}
