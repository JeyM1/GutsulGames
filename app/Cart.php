<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public static function getUserGames($userid) {
        return Cart::where('user_id', $userid)->get();
    }

    public function game() {
        return $this->belongsTo('App\Game');
    }
}
