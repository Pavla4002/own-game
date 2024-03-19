<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/exit',[\App\Http\Controllers\UserController::class,'exit'])->name('exit');
//
Route::get('/reg',[\App\Http\Controllers\PageController::class,'reg_page'])->name('reg_page');
Route::post('/reg/user',[\App\Http\Controllers\UserController::class,'reg_user'])->name('reg_user');

Route::get('/auth',[\App\Http\Controllers\PageController::class,'login'])->name('login');
Route::post('/auth/user',[\App\Http\Controllers\UserController::class,'auth_user'])->name('auth_user');
////Игры
Route::get('/games',[\App\Http\Controllers\PageController::class,'games'])->name('games');
Route::get('/games/add/step_1/page',[\App\Http\Controllers\PageController::class,'add_game_page'])->name('add_game_page');
//Route::post('/game/add/step_1',[\App\Http\Controllers\GameController::class,'create'])->name('add_game');
////themes
//Route::get('/them/add/step_2/{id}',[\App\Http\Controllers\PageController::class,'step_2'])->name('step_2');
//Route::get('/them/page',[\App\Http\Controllers\PageController::class,'themes'])->name('themes');
//Route::post('/them/page/add',[\App\Http\Controllers\ThemController::class,'create'])->name('add_theme');
//Route::put('/them/edit/{id}',[\App\Http\Controllers\ThemController::class,'edit'])->name('edit_theme');
//Route::get('/them/del/{id}',[\App\Http\Controllers\ThemController::class,'destroy'])->name('del_theme');
////themes_game
//Route::get('/game/theme/remove/{id}',[\App\Http\Controllers\GameThemController::class,'destroy'])->name('remove_theme_game');
//
////round
//Route::post('/them/round/add/{id}',[\App\Http\Controllers\GameThemController::class,'create'])->name('add_round');
//Route::get('/them/round/del/{id}/{round}',[\App\Http\Controllers\GameThemController::class,'del_round'])->name('del_round');
////questions
//Route::get('/them/questions/{id}',[\App\Http\Controllers\PageController::class,'quest_page'])->name('quest_page');
//Route::post('/them/questions/add',[\App\Http\Controllers\QuestionController::class,'create'])->name('add_question');
//Route::get('/them/questions/del/{id}',[\App\Http\Controllers\QuestionController::class,'destroy'])->name('del_quest_them');
//Route::post('/them/questions/edit/{id}',[\App\Http\Controllers\QuestionController::class,'edit'])->name('edit_question');
