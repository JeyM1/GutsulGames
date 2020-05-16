<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    
    public function index()
    {
        return view('main');
    }

    public function aboutus() {
        return view('aboutus');
    }

    public function catalog() {
        //return Game::all();
        return view('catalog', ['games' => Game::all()]);
    }

    public function users($user) {
        return view('user', ['username' => $user]);
    }

    public function games($gameid) {
        //return Auth::user()->has_game(1);
        $game = Game::find($gameid);
        if(!$game){
            abort('404', 'Game not gound.');
        }
        return view('game', ['game' => $game]);
    }

    public function checkout() {
        return view('checkout');
    }
}
