<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout() {
        $userCartGames = collect([]);
        
        $total = 0;

        foreach(Cart::getUserGames(Auth::user()->id) as $cartItem){
            $game = $cartItem->game;
            $userCartGames->add($game);
            $total += $game->price;
        }
        
        return view('checkout', ['userCart' => $userCartGames, 'total' => $total]);
    }

    public function addToUserCart($gameid) {
        $game = Game::find($gameid);

        if(!$game){
            // Game not exist
            abort(404, 'Game bot found.');
        }

        
        $uid = Auth::user()->id;

        if(Cart::where('user_id', $uid)->where('game_id', $gameid)->first()) {
            return redirect()->back()->withErrors(['status' => "Гра '$game->name' вже знаходиться у Вашому кошику!"]);
        } else if(Auth::user()->has_game($gameid)) {
            return "Hello!";
            return redirect()->route('users', $uid)->withErrors(['status' => "Гра '$game->name' вже закріплена на цьому аккаунті!"]);
        }

        $cartItem = new Cart();
        $cartItem->user_id = $uid;
        $cartItem->game_id = $gameid;
        $cartItem->save();
        
        return redirect()->to('checkout')->withSuccess("Гра '$game->name' додана до Вашого кошику!");
    }

    public function confirm_checkout() {
        // TODO?: redirect to payment service and wait untill confirmation of purchase
        $user = Auth::user();
        foreach(Cart::getUserGames($user->id) as $cartItem){
            $user->add_game($cartItem->game->id);
        }
        Cart::where('user_id', $user->id)->delete();
        return redirect()->route('users', $user->id)->withSuccess('Успішний платіж! Ігри були додані до Вашого аккаунту!');
    }
}
