<?php

use Illuminate\Database\Seeder;

class ShortagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = \Faker\Factory::create();
        $type = ['min', 'plus'];
        $state = ['waiting', 'closed'];

        for ($i = 1; $i <= 10000; $i++) {
            DB::table("shortages")->insert([
                "charity_id" => $faker->numberBetween($min = 2, $max = 40),
                'quantity' => $faker->numberBetween($min = 100, $max = 1000),
                'type' => $type[$faker->numberBetween($min = 0, $max = 1)],
                'item_id' => $faker->numberBetween($min = 1, $max = 134 ),
                "state" => $state[$faker->numberBetween($min = 0, $max = 1)],
                'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = null),

            ]);
        }
    }
}
