<?php

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
        $faker = \Faker\Factory::create();
        DB::table("users")->insert([
            //id=1
            "name" => "admin",
            'email' => "admin@almounkez.com",
            'email_verified_at' => now(),
            'role' => 'admin',
            "password" => Hash::make("123456789"), // 123456789
            'remember_token' => Str::random(10),
            'created_at' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
        ]);
        
        for ($i = 2; $i <= 40; $i++) {
            // id=[2-40]
            DB::table("users")->insert([
                "name" => $faker->name(),
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'role' => 'charity',
                "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),

            ]);
        }
        for ($i = 41; $i <= 60; $i++) {
            // id=[41-60]
            DB::table("users")->insert([
                "name" => $faker->name(),
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'role' => 'benef',
                "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),

            ]);
        }
        for ($i = 61; $i <= 90; $i++) {
            // id=[61-90]
            DB::table("users")->insert([
                "name" => $faker->name(),
                'email' => $faker->unique()->safeEmail,
                'email_verified_at' => now(),
                'role' => 'volunteer',
                "password" => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),
                'created_at' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),

            ]);
        }

        //
    }
}
