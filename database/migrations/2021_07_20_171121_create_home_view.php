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
                items.name_ar as item_name_ar,
                items.cat_ar,
                items.subcat_ar,
                items.subcat2_ar,
                shortages.type,shortages.quantity,shortages.state,shortages.created_at,
                cities.name_ar as city_name_ar
                FROM cities join charities on(charities.city_id=cities.id) join shortages on (shortages.charity_id =  charities.user_id ) join items on (shortages.item_id= items.id)"
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
