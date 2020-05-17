<?php

namespace App\Http\Controllers;

use App\Game;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    
    public function index()
    {
        $bestsellers = Game::orderBy('purchase_count', 'DESC')->take(4)->get();
        $online_games = Type::where('name', 'online')->first()->games;
        $soon_games = Type::where('name', 'soon')->first()->games;
        return view('main', ['bestsellers' => $bestsellers, 'online_games' => $online_games, 'soon_games' => $soon_games]);
    }

    public function aboutus() {
        return view('aboutus');
    }

    public function catalog() {
        $search_querry = collect(preg_split("/(,|;)/", request()->input('search')))->unique();
        $games = collect([]);
        if($search_querry[0]) {
            $types = collect([]);
            $possible_games = collect([]);
            foreach($search_querry as $search_element) {
                if($search_element) {
                    $type = Type::where('name', "$search_element")->first();
                    $game_collection = Game::where('name', 'LIKE', "%$search_element%")->get();
                    if($type) {
                        $types->add($type);
                    }
                    if($game_collection) {
                        $possible_games = $possible_games->concat($game_collection);
                    }
                }
            }
            $games = $games->concat($possible_games);
            foreach($types as $type) {
                $games = $games->concat($type->games);
            }
            $games = $games->unique('id');
        } else {
            $games = $games->concat(Game::all());
        }
        return view('catalog', ['games' => $games, 'catalog_search' => implode(";", $search_querry->toArray())]);
    }

    public function users($userid) {
        $user = User::find($userid);
        if(!$user){
            abort(404, 'User not found.');
        }
        return view('user', ['user' => $user, 'usergames' => $user->games]);
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
