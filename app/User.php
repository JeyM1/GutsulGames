<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function has_game($game_id) {
        return GameUser::where('user_id', $this->id)->where('game_id', $game_id)->first();
    }

    public function games() {
        return $this->belongsToMany('App\Game');
    }

    public function add_game($gameid) {
        $gameuser = new GameUser();
        $gameuser->game_id = $gameid;
        $gameuser->user_id = $this->id;
        $gameuser->save();
    }
}
