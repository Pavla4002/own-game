<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameTheme;
use App\Models\Question;
use App\Models\Theme;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function welcome(){
        return view('welcome');
    }
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
    public function add_game_page(){
        return view('user.step_1');
    }
    public function themes(){
        $themes = Theme::all();
        return view('user.themes')->with(compact('themes'));
    }

    public function step_2($id){
        $game = Game::query()->where('id',$id)->first();
        $themes = Theme::all();
        $game_themes = GameTheme::query()->where('game_id',$id)->orderBy('round')->get();
        $helpers = [];
        $count=0;
        foreach ($game_themes as $g_t){
           if(count($helpers)===0){
               array_push($helpers,$g_t);
           }else{
               foreach ($helpers as $h){
                   if($h->round===$g_t->round){
                       $count+=1;
                   }
               }
               if($count===0){
                   array_push($helpers,$g_t);
               }else{
                   $count=0;
               }
           }
        }
        return view('user.step_2')->with(compact('game','themes','game_themes','helpers'));
    }

    public function quest_page($id){
        $questions = Question::query()->orderBy('cost')->get();
        $game = Game::query()->where('id',$id)->first();
        $themes = Theme::all();
        $game_themes = GameTheme::query()->where('game_id',$id)->orderBy('round')->get();
        $helpers = [];
        $count=0;
        foreach ($game_themes as $g_t){
            if(count($helpers)===0){
                array_push($helpers,$g_t);
            }else{
                foreach ($helpers as $h){
                    if($h->round===$g_t->round){
                        $count+=1;
                    }
                }
                if($count===0){
                    array_push($helpers,$g_t);
                }else{
                    $count=0;
                }
            }
        }
        return view('user.step_3')->with(compact('game','themes','game_themes','helpers','questions'));
    }

    public function edit_quest_page($id,$game){
        $quest = Question::query()->where('id',$id)->first();
        $game = Game::query()->where('id',$game)->first();
        return view('user.edit_quest')->with(compact('quest','game'));
    }

    public function demo($id){
        $game = Game::query()->where('id',$id)->first();
        $game_themes = GameTheme::query()->where('game_id',$id)->get();
        $helpers = [];
        $count=0;
        foreach ($game_themes as $g_t){
            if(count($helpers)===0){
                array_push($helpers,$g_t);
            }else{
                foreach ($helpers as $h){
                    if($h->round===$g_t->round){
                        $count+=1;
                    }
                }
                if($count===0){
                    array_push($helpers,$g_t);
                }else{
                    $count=0;
                }
            }
        }
        $questions = Question::query()->orderBy('cost')->get();
        return view('user.demo')->with(compact('game','game_themes','helpers','questions'));
    }
}
