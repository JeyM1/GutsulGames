<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGameTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_type', function (Blueprint $table) {
            $table->bigInteger('game_id')->unsigned();
            $table->bigInteger('type_id')->unsigned();
            $table->timestamps();

            $table->foreign('game_id')->references('id')->on('games');
            $table->foreign('type_id')->references('id')->on('types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_type');
    }
}
