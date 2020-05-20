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
            return redirect()->back()->with(['error_notify' => "Гра '$game->name' вже знаходиться у Вашому кошику!"]);
        } else if(Auth::user()->has_game($gameid)) {
            return redirect()->route('users', $uid)->with(['error_notify' => "Гра '$game->name' вже придбана на цьому аккаунті!"]);
        }

        $cartItem = new Cart();
        $cartItem->user_id = $uid;
        $cartItem->game_id = $gameid;
        $cartItem->save();
        
        return redirect()->to('checkout')->with(['success_notify' => "Гра '$game->name' додана до Вашого кошику!"]);
    }

    public function removeFromUserCart($gameid) {
        $game = Game::find($gameid);

        if(!$game){
            // Game not exist
            abort(404, 'Game not found.');
        }

        $uid = Auth::user()->id;
        $q = Cart::where('user_id', $uid)->where('game_id', $gameid);
        $removeItem = $q->first();
        if(!$removeItem) {
            return redirect()->back()->with(['error_notify' => "Гра '$game->name' не знаходиться у Вашому кошику!"]);
        }
        $q->delete();
        return redirect()->to('checkout')->with(['success_notify' => "Гра '$game->name' була видалена з Вашого кошику!"]);
    }

    public function confirm_checkout() {
        // TODO?: redirect to payment service and wait untill confirmation of purchase
        $user = Auth::user();
        foreach(Cart::getUserGames($user->id) as $cartItem) {
            $game = $cartItem->game;
            $user->add_game($game->id);
            $game->purchase_count++;
            $game->save();
        }
        Cart::where('user_id', $user->id)->delete();
        return redirect()->route('users', $user->id)->with(['success_notify' => 'Успішний платіж! Ігри були додані до Вашого аккаунту!']);
    }
}
