<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'title'=>['required','unique:themes'],
        ],[
            'title.required'=>'Обязательное поле',
            'title.unique'=>'Название должно быть уникальным',
        ]);
        $theme = new Theme();
        $theme->title=$request->title;
        $theme->save();

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
    public function show(Theme $theme)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $request)
    {
        $request->validate([
            'title1'=>['required'],
        ],[
            'title1.required'=>'Обязательное поле',
        ]);
        $theme = Theme::query()->where('id',$id)->first();
        $theme->title = $request->title1;
        $theme->update();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Theme $theme)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Theme::query()->where('id',$id)->delete();
        return redirect()->back();
    }
}
