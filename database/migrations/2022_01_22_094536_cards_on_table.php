<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CardsOnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cards', function (Blueprint $table) {
            $table->id();
            $table->string('tableCard1')->nullable();;
            $table->string('tableCard2')->nullable();;
            $table->string('tableCard3')->nullable();;
            $table->string('tableCard4')->nullable();;
            $table->string('tableCard5')->nullable();;
            $table->string('currently_on')->nullable();;
            $table->timestamp('cards.updated_at')->nullable();

        });
    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
