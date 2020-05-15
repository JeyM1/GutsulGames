<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('catalog');
    }

    public function users($user) {
        return view('user', ['username' => $user]);
    }

    public function games($game) {
        return view('game', ['gamename' => $game]);
    }

    public function checkout() {
        return view('checkout');
    }
}
