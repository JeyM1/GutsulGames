<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->text('name');
            $table->bigInteger('purchase_count')->default(0);
            $table->longText('description');
            $table->text('developer');
            $table->text('publisher')->nullable();
            $table->date('release_date');
            $table->text('image_path')->nullable();//default('/images/games/noimage.png');
            $table->text('game_path')->nullable()->default(null);
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
        Schema::dropIfExists('games');
    }
}
