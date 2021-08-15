<?php

use Illuminate\Database\Seeder;

class GovernoratesSeeder extends Seeder
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
        $ar=['محافظة دمشق','محافظة ريف دمشق','محافظة حلب','محافظة حمص','محافظة حماة','محافظة إدلب','محافظة اللاذقية','محافظة طرطوس',
        'محافظة السويداء','محافظة درعا','محافظة القنيطرة','محافظة الرقة','محافظة دير الزور','محافظة الحسكة',];
        $en=['Damascus','Rif Dimashq','Aleppo','Homs','Hama','Idlib','Latakia','Ṭarṭūs',
        'As-Suwaydaa','Daraa','Quneitra','Ar-Raqqah','Deir ez-Zor','Al-Hasakah'];
        
        for ($i = 0; $i < 13; $i++) {
            DB::table("governorates")->insert([
                'name_ar' => $ar[$i],
                'name_en' => $en[$i],
                'created_at' => $faker->date(),
            ]);
        }
    }
}
