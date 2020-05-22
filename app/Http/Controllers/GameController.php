<?php

namespace App\Http\Controllers;

use App\Game;
use App\Type;
use Illuminate\Support\Facades\Auth;
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
        
        if(!$user->has_game($gameid)) {
            // user hasn't bought this game
            return redirect()->route('users', $user->id)->with(['error_notify' => "Ви не можете скачати гру якщо вона у Вас не придбана!"]);
        }

        if($game->types->contains(Type::where('name', 'online')->first())) {
            // if this game can be played online, redirect to online version
            return redirect()->route('play', $game->id);
        }

        if($game->types->contains(Type::where('name', 'soon')->first())) {
            // if game not ready, return back and notify user
            return redirect()->route('games', $game->id)->with(['error_notify' => "Нажаль, гра '$game->name' поки що недоступна для скачування, перевірте дату релізу!"]);
        }

        if(!Storage::disk('games')->exists("/offline/$game->id/download/$game->name.zip")) {
            // !REPLACE WARNING! -> upload game
            // generating download file. In future replace this to uploading.
            $allfiles = Storage::disk('games')->files("/offline/$game->id");
            Storage::disk('games')->makeDirectory("/offline/$game->id/download");
            
            $zip = new \ZipArchive();
            $zip->open(public_path("/games/offline/$game->id/download/$game->name.zip"), \ZipArchive::CREATE);
            foreach ($allfiles as $file) {
                $filename = explode('/', $file)[2];
                $zip->addFile(public_path("games/$file"), "$game->name/$filename");
            }
            $zip->close();
        }

        $file = public_path("games/offline/$game->id/download/$game->name.zip");
        Session::flash('download.in.the.next.request', $file);
        //notify()->success("Гра '$game->name' буде скачана на ваш комп'ютер!");
        //return Storage::disk('games')->download($file, "$game->name.zip", ['location' => route('games', $game->id), 'refresh' => 0]);
        return redirect()->route('games', $game->id)->with(['success_notify' => "Гра '$game->name' буде скачана на ваш комп'ютер!"]);
    }
}
