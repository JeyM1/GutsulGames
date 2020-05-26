<?php

namespace App;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use CrudTrait;

    protected $fillable = [
        'name', 'permissions'
    ];

    public function users() {
        return $this->belongsToMany('App\User');
    }
}
