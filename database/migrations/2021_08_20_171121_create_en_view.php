<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement( "
            CREATE VIEW en_view AS
                SELECT
                items.name_en as item_name,
                items.cat_en as item_cat,
                items.subcat_en as item_subcat,
                items.subcat2_en as item_subcat2,
                shortages.type,shortages.quantity,shortages.state,shortages.created_at,
                governorates.name_en as gov_name,
                cities.name_en as city_name
                FROM governorates join cities on(cities.governorate_id=governorates.id) join charities on(charities.city_id=cities.id) join shortages on (shortages.charity_id =  charities.user_id ) join items on (shortages.item_id= items.id)"
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
