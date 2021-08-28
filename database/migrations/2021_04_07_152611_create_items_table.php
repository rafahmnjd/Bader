<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->String('cat_ar');
            $table->String('cat_en');
            $table->String('subcat_ar')->nullable();
            $table->String('subcat_en')->nullable();
            $table->String('subcat2_ar')->nullable();
            $table->String('subcat2_en')->nullable();

            $table->string('unite_en')->nullable()->default("kg");
            $table->string('unite_ar')->nullable()->default("كغ");
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
