<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
            'question'=>['required'],
            'right_answer'=>['required'],
            'img'=>['nullable'],
            'cost'=>['required','numeric'],
        ],[
            'question.required'=>'Обязательное поле',
            'right_answer.required'=>'Обязательное поле',
            'cost.required'=>'Обязательное поле',
            'cost.numeric'=>'Числовое поле',
        ]);
        if($request->them){
            $question = new Question();
            $question->question=$request->question;
            $question->right_answer=$request->right_answer;
            $question->cost=$request->cost;
            if($request->file('img')){
                $path = $request->file('img')->store('img');
                $question->img = 'storage/'.$path;
            }
            $question->game_theme_id=$request->them;
            $question->save();
            return redirect()->back();
        }else{
            return redirect()->back()->with('error','Необходимо определить категорию');
        }


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
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id,$game)
    {
        $request->validate([
            'question'=>['required'],
            'right_answer'=>['required'],
            'img'=>['nullable'],
            'cost'=>['required','numeric'],
        ],[
            'question.required'=>'Обязательное поле',
            'right_answer.required'=>'Обязательное поле',
            'cost.required'=>'Обязательное поле',
            'cost.numeric'=>'Числовое поле',
        ]);

            $question = Question::query()->where('id',$id)->first();
            $question->question=$request->question;
            $question->right_answer=$request->right_answer;
            $question->cost=$request->cost;
            if($request->file('img')){
                $path = $request->file('img')->store('img');
                $question->img = 'storage/'.$path;
            }
            $question->update();
            return redirect()->route('quest_page',['id'=>$game]);
        }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Question::query()->where('id',$id)->delete();
        return redirect()->back();
    }
}
