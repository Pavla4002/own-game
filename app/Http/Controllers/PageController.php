<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function login(){
        return view('guest.authorization');
    }
    public function reg_page(){
        return view('guest.registration');
    }

    public function games(){
        $games = Game::all();
        return view('user.games')->with(compact('games'));
    }
}
