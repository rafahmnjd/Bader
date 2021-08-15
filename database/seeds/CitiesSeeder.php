<?php

use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
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

        //Dsamascus
        DB::table("cities")->insert([
            'name_ar' => 'دمشق',
            'name_en' => 'Damascus',
            'governorate_id' => 1,
        ]);

        //Rif Dimashq
        $ar = ['جوبر', 'دوما', 'التل', 'يبرود', 'الزبداني', 'القطيفة', 'عدرا', 'قطنا', 'النبك', 'داريا', 'حرستا'];
        $en = ['Jober', 'Doma', 'Attel', 'yabrod', 'Azzabadany', 'AlQutaifa', 'A\'draa', 'Qatana', 'Annabek', 'Dariea', 'harsta'];
        for ($i = 0; $i < 11; $i++) {
            DB::table("cities")->insert([
                'name_ar' => $ar[$i],
                'name_en' => $en[$i],
                'governorate_id' => 2,
            ]);
        }

        //Aleppo
        $ar = ['الباب', 'السفيرة', 'عفرين', '	أعزاز', '	عين العرب', '	جرابلس', 'منبج', 'حلب'];
        $en = ['Albab', 'assafeera', 'Efreen', 'Aazaz', 'Ain Alarab', 'Jrablus', 'Manbag', 'Halap'];
        for ($i = 0; $i < 8; $i++) {
            DB::table("cities")->insert([
                'name_ar' => $ar[$i],
                'name_en' => $en[$i],
                'governorate_id' => 3,
            ]);
        }

        //Homs
        $ar = ['الرستن', 'تدمر', 'القصير', 'تلكلخ', 'المخرم'];
        $en = ['Arrestun', 'Tadmur', 'Alqusair', 'Talkalkh', 'Almkhram'];
        for ($i = 0; $i < 5; $i++) {
            DB::table("cities")->insert([
                'name_ar' => $ar[$i],
                'name_en' => $en[$i],
                'governorate_id' => 4,
            ]);
        }

        //hamah
        $ar = ['سلحب', 'السقيلبيه', 'محردة', 'مصياف', 'سلمية'];
        $en = ['Salhab', 'Assuqailabiah', 'Mahradah', 'Musiaf', 'Salamiah'];
        for ($i = 0; $i < 5; $i++) {
            DB::table("cities")->insert([
                'name_ar' => $ar[$i],
                'name_en' => $en[$i],
                'governorate_id' => 5,
            ]);
        }

        DB::table("cities")->insert([
            'name_ar' => "إدلب",
            'name_en' => "Idlib",
            'governorate_id' => 6,
        ]);

        DB::table("cities")->insert([
            'name_ar' => "اللاذقية",
            'name_en' => "Latakia",
            'governorate_id' => 7,
        ]);
        DB::table("cities")->insert([
            'name_ar' => "طرطوس",
            'name_en' => "Ṭarṭūs",
            'governorate_id' => 8,
        ]);
        DB::table("cities")->insert([
            'name_ar' => "السويداء",
            'name_en' => "As-Suwaydaa",
            'governorate_id' => 9,
        ]);
        DB::table("cities")->insert([
            'name_ar' => "درعا",
            'name_en' => "Daraa",
            'governorate_id' => 10,
        ]);

        DB::table("cities")->insert([
            'name_ar' => "القنيطرة",
            'name_en' => "Quneitra",
            'governorate_id' => 11,
        ]);
        DB::table("cities")->insert([
            'name_ar' => "الرقة",
            'name_en' => "Ar-Raqqah",
            'governorate_id' => 12,
        ]);
        DB::table("cities")->insert([
            'name_ar' => "دير الزور",
            'name_en' => "Deir ez-Zor",
            'governorate_id' => 13,
        ]);
        DB::table("cities")->insert([
            'name_ar' => "الحسكة",
            'name_en' => "Hasakah",
            'governorate_id' => 14,
        ]);

        // $ar = ['محافظة دمشق', 'محافظة ريف دمشق', 'محافظة حلب', 'محافظة حمص', 'محافظة حماة', 'محافظة إدلب', 'محافظة اللاذقية', 'محافظة طرطوس',
        //     'محافظة السويداء', 'محافظة درعا', 'محافظة القنيطرة', 'محافظة الرقة', 'محافظة دير الزور', 'محافظة الحسكة'];
        // $en = ['Damascus', 'Rif Dimashq', 'Aleppo', 'Homs', 'Hama', 'Idlib', 'Latakia', 'Ṭarṭūs',
        //     'As-Suwaydaa', 'Daraa', 'Quneitra', 'Ar-Raqqah', 'Deir ez-Zor', 'Al-Hasakah'];

    }
}
