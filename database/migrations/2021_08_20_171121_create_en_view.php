<?php

use Illuminate\Database\Migrations\Migration;

class CreateEnView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("
            CREATE VIEW en_view AS
                SELECT
                 items.id as `item id`,
                 items.name_en as `item name`,
                items.cat_en as `item category`,
                shortages.type as `type`,
                shortages.quantity as `quantity`,
                shortages.state as `state`,
                shortages.created_at as `date`,
                month(shortages.created_at) as `maonth`,
                year(shortages.created_at) as `year`,
                governorates.name_en as `governorate`,
                cities.name_ar as `city`
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
        \DB::statement("DROP VIEW IF EXISTS `en_view`");
    }
}
