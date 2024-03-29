<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charities', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('user_id')->primary();
            $table->string('name_en')->nullable();//
            $table->string('name_ar')->nullable();//
            $table->unsignedInteger('license')->nullable()->unique();
            $table->unsignedBigInteger('city_id')->nullable();
            // $table->unsignedBigInteger('governorates_id')->nullable();
            $table->string('address_ar')->nullable();//
            $table->string('address_en')->nullable();//
            $table->string('whatsapp')->nullable();//
            $table->string('facebook')->nullable();//
            $table->string('email')->nullable();//
            $table->string('phone')->nullable();//
            $table->string('mobile')->nullable();//
            $table->string('logo')->nullable();//
            $table->string('cover')->nullable();//
            $table->text('info_ar')->nullable();//
            $table->text('info_en')->nullable();//
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
        Schema::dropIfExists('charities');
    }
}
