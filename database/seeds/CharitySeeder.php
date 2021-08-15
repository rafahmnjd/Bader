<?php

use Illuminate\Database\Seeder;

class CharitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = \Faker\Factory::create();
        for ($i = 2; $i <= 40; $i++) {
            DB::table("charities")->insert([
                'user_id' => $i,
                "name_en" => $faker->company(),
                "name_ar" => $faker->company(),
                'license' => $faker->unique()->numberBetween($min = 10000, $max = 90000),
                'city_id' => $faker->numberBetween($min = 1, $max = 30),
                'address_ar' => $faker->address(),
                'address_en' => $faker->address(),
                'whatsapp' => $faker->phoneNumber(),
                'facebook' => "https: //www.facebook.com/".$faker->company(),
                'email' => $faker->safeEmail,
                'phone' => $faker->phoneNumber(),
                'mobile' => $faker->phoneNumber(),
                'info_ar' => $faker->realText(),
                "info_en" => $faker->realText(),
                'created_at' => $faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            ]);
        }

    }
}
