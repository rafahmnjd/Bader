<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name_ar')->nullable();
            $table->string('name_en')->nullable();
            $table->string('profile')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('email');
            $table->text('education_ar')->nullable();
            $table->text('education_en')->nullable();
            $table->text('skills_ar')->nullable();
            $table->text('skills_en')->nullable();
            $table->text('experiences_ar')->nullable();
            $table->text('experiences_en')->nullable();
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
        Schema::dropIfExists('volunteers');
    }
}
