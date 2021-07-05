<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fill_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('hidden')->default(false);
            $table->boolean('read')->default(false);
            $table->text('text');
            $table->timestamps();
            $table->index(['fill_id', 'created_at']);
            $table->index(['user_id','read']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        // Schema::table('messages', function (Blueprint $table) {
        //     $table->dropIndex(['fill_id', 'created_at']); // Drops index 'geo_state_index'
        // });

        Schema::dropIfExists('messages');

    }
}
