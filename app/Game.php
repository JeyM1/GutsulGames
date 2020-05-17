<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    
    public function types() {
        return $this->belongsToMany('App\Type');
    }
}
