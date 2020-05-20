<?php

namespace App\Http\Controllers;

use App\Game;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function play_online($gameid) {
        $game = Game::find($gameid);
        if(!$game) {
            abort(404, 'Game not found.');
        }
        $user = Auth::user();
        
        if(!$user->has_game($gameid)) {
            return redirect()->route('users', $user->id)->with(['error_notify' => "Ви не можете грати в гру якщо вона у Вас не придбана!"]);
        }

        if(!$game->types->contains(Type::where('name', 'online')->first())){
            return redirect()->route('games', $game->id)->with(['error_notify' => "Ця гра не передбачає можливості грати онлайн. Ви можете завантажити цю гру собі і грати офлайн!"]);
        }

        return view('layouts.onlinegame', ['game' => $game]);
    }
}
