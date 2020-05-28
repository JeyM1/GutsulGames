<?php

namespace App\Http\Controllers;

use App\Game;
use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

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

    public function download($gameid) {
        $game = Game::find($gameid);
        if(!$game) {
            abort(404, 'Game not found.');
        }
        $user = Auth::user();

        if(!$user) {
            abort(401, 'Unauthorized.');
        }
        
        if(!$user->has_game($gameid)) {
            return response()
                    ->json("Forbidden", 403, ['message' => 'Ви не можете скачати гру якщо вона у Вас не придбана!', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
        }

        /* 
        if($game->types->contains(Type::where('name', 'online')->first())) {
            // if this game can be played online, redirect to online version
            return redirect()->route('play', $game->id);
        }*/

        if($game->types->contains(Type::where('name', 'soon')->first())) {
            $error_msg = "Нажаль, гра '$game->name' поки що недоступна для скачування, перевірте дату релізу!";
            return response()
                    ->json("Forbidden", 403, ['message' => $error_msg, 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
        }
        $files = Storage::disk('games')->files("/offline/$game->id/");
        if(!$files) {
            $error_msg = "Нажаль, гра '$game->name' поки що недоступна для скачування, перевірте дату релізу!";
            return response()
                    ->json("Forbidden", 403, ['message' => $error_msg, 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
        }

        $file = $files[0];
        return Storage::disk('games')->download($file);
    }
}
