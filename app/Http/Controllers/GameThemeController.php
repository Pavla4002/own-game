<?php

namespace App\Http\Controllers;

use App\Models\GameTheme;
use Illuminate\Http\Request;

class GameThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id, Request $request)
    {
        $request->validate([
            'round'=>['required'],
        ],[
            'round.required'=>'Обязательное поле',
        ]);

        if($request->themes!==null){
            foreach ($request->themes as $theme){
                $game_themes = new GameTheme();
                $game_themes->round = $request->round;
                $game_themes->game_id = $id;
                $game_themes->theme_id = $theme;
                $game_themes->save();
            }
            return redirect()->back()->with('ok', 'Раунд успешно добавлен');
        }else{
            return redirect()->back()->with('error','Необходимо добавить категорию');
        }

    }

    public function del_round($id,$round){
       GameTheme::query()->where('game_id',$id)->where('round',$round)->delete();
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(GameTheme $gameTheme)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GameTheme $gameTheme)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GameTheme $gameTheme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($gameTheme)
    {
        GameTheme::query()->where('id',$gameTheme)->delete();
        return redirect()->back();
    }
}
