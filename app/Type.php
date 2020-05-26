<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use CrudTrait;
    
    protected $fillable = [
        'name'
    ];

    public function games() {
        return $this->belongsToMany('App\Game');
    }
}
