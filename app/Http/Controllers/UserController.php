<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function reg_user(Request $request){
        $request->validate([
            'fio'=>['required','regex:/^([А-Яа-яЁё ]+)$/u'],
            'login'=>['required','regex:/^([A-Za-z1-9@\-+_]+)$/u','min:6','unique:users'],
            'password'=>['required','regex:/^([a-z1-9@\-+_ ]+)$/u','confirmed','min:6','max:9'],
        ],[
            'fio.required'=>'Обязательное поле',
            'fio.regex'=>'Допустимые символы: А-Яа-яЁё ',
            'login.required'=>'Обязательное поле',
            'login.regex'=>'Допустимые символы: A-Za-z1-9@-+_',
            'login.min'=>'Минимум 6 символов',
            'login.unique'=>'Данный логин есть в системе',
            'password.required'=>'Обязательное поле',
            'password.regex'=>'Допустимые символы: a-z1-9@-+_',
            'password.confirmed'=>'Пароли не совпадают',
            'password.min'=>'Минимум 6 символов',
            'password.max'=>'Максимум 9 символов',
        ]);
        $user = new User();
        $user->fio=$request->fio;
        $user->login=$request->login;
        $user->password=md5($request->password);
        $user->save();

        return redirect()->route('login')->with('ok','Регистрация прошла успешно. Авторизуйтесь.');
    }

    public function auth_user(Request $request){
        $request->validate([
            'login'=>['required'],
            'password'=>['required'],
        ],[
            'login.required'=>'Обязательное поле',
            'password.required'=>'Обязательное поле',
        ]);
        $user = User::query()->where('password',md5($request->password))->where('login',$request->login)->first();
        if($user){
            Auth::login($user);
            return redirect()->route('games');
        }else{
            return redirect()->back()->with('error','Неправильный логин или пароль');
        }
    }

    public function exit(){
        Auth::logout();
        return redirect()->route('welcome');
    }
}
