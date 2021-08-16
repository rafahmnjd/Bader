<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShortagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('charity_id')->nullable();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->text('details_ar')->nullable();
            $table->text('details_en')->nullable();
            $table->unsignedInteger('quantity')->default(1);
            $table->set('type', ['min', 'plus'])->default('min');
            $table->unsignedBigInteger('item_id');
            $table->set('state', ['waiting', 'closed']);
            $table->double('unite_cost')->default(0.0);

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
        Schema::dropIfExists('shortages');
    }
}
