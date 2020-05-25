<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use CrudTrait;
    
    public function games() {
        return $this->belongsToMany('App\Game');
    }
}
