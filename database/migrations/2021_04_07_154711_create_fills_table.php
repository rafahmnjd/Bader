<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('shortage_id');
            $table->set('type', ['shortage', 'projReq'])->default('shortage');
            $table->unsignedInteger('quantity')->default(1);
            $table->set('state', ['waiting', 'completed']);
            $table->timestamps();
            $table->index(['user_id', 'created_at']);
            $table->index(['type','shortage_id', 'created_at']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fills');
    }
}
