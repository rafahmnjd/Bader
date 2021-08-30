<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement( "
            CREATE VIEW ar_view AS
                SELECT
                items.id as `رمز المادة`,
                items.name_ar as `اسم المادة`,
                items.cat_ar as `تصنيف المادة`,
                shortages.type as `النوع`,
                shortages.quantity as `الكمية`,
                shortages.state as `الحالة`,
                shortages.created_at as `تاريخ الطلب`,
                month(shortages.created_at) as `الشهر`,
                year(shortages.created_at) as `العام`,
                governorates.name_ar as `اسم المحافظة`,
                cities.name_ar as `اسم المدينة`
                FROM governorates join cities on(cities.governorate_id=governorates.id) join charities on(charities.city_id=cities.id) join  shortages on (shortages.charity_id =  charities.user_id ) join items on (shortages.item_id= items.id)
                where shortages.type != 'proj'"

);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement("DROP VIEW IF EXISTS `ar_view`");
    }
}
