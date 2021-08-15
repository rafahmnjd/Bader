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
        // $this->call(UserSeeder::class);
        // $this->call(GovernoratesSeeder::class);
        // $this->call(CitiesSeeder::class);
        // $this->call(CharitySeeder::class);
        $this->call(ShortagesSeeder::class);

    }
}
