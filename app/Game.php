<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{ 
    public function types() {
        return $this->belongsToMany('App\Type');
    }

    public function is_online() {
        return $this->types()->where('name', 'online')->first() ? true : false;
    }
}
