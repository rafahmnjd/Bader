<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharityJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charity_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('charity_id');
            $table->string('job_title_ar');
            $table->string('job_title_en');
            $table->text('job_details_ar');
            $table->text('job_details_en');
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
        Schema::dropIfExists('charity_jobs');
    }
}
