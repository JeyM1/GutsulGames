<?php

namespace App\Http\Controllers;

use App\Game;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    
    public function index()
    {
        return view('main', ['bestsellers' => Game::orderBy('purchase_count', 'DESC')->take(4)->get()]);
    }

    public function aboutus() {
        return view('aboutus');
    }

    public function catalog() {
        $search_querry = request()->input(' search');
        $games = [];
        if($search_querry) {
            //TODO: search by name & tags
            $games = Game::where('name', 'LIKE', "$search_querry%")->get();
        } else {
            $games = Game::all();
        }
        
        return view('catalog', ['games' => $games, 'catalog_search' => $search_querry]);
    }

    public function users($userid) {
        $user = User::find($userid);
        if($user->isEmpty()){
            abort(404, 'User not found.');
        }
        return view('user', ['user' => $user]);
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
