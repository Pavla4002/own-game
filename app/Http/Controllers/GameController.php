<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
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
    public function create(Request $request)
    {
        $request->validate([
            'title'=>['required'],
        ],[
            'title.required'=>'Обязательное поле',
        ]);

        $game = new Game();
        $game->title = $request->title;
        $game->save();
        return redirect()->route('step_2',['id'=>$game->id]);
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
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $request->validate([
            'title'=>['required'],
        ],[
            'title.required'=>'Обязательное поле',
        ]);
        $game = Game::query()->where('id',$id)->first();
        $game->title = $request->title;
        $game->update();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
