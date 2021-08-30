<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement( "
            CREATE VIEW home_view AS
                SELECT
                items.id as item_id,
                items.name_ar as item_name,
                items.cat_ar as item_cat,
                shortages.id,shortages.type,shortages.quantity,shortages.state,shortages.created_at,
                governorates.id as gov_id,
                governorates.name_ar as gov_name,
                cities.name_ar as city_name
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
        \DB::statement("DROP VIEW IF EXISTS `home_view`");
    }
}
