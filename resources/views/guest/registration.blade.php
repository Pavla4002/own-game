@extends('layout.app')
@section('title')
    Регистрация
@endsection
@section('main')
    <div class="container-fluid p-0" style="min-height: 85vh">
        <div class="d-flex justify-content-center align-items-center w-100 mt-5" style="position: absolute;top:0;  bottom: 0;">
            <div class="mt-5" style="width: 30%; min-width: 300px; padding-top:80px;">
                <h2 class="text-uppercase w-100 text-center">Регистрация</h2>
                {{--      Форма      --}}
                <div class="">
                    <form action="{{route('reg_user')}}" method="post">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="fio" class="form-label">ФИО</label>
                            <input type="text" class="form-control @error('fio') is-invalid @enderror" id="fio" aria-describedby="emailHelp" name="fio">
                            <div class="invalid-feedback">
                                @error('fio')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="login" class="form-label">Логин</label>
                            <input type="text" class="form-control @error('login') is-invalid @enderror" id="login" name="login">
                            <div class="invalid-feedback">
                                @error('login')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Пароль</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name="password">
                            <div class="invalid-feedback">
                                @error('password')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Повтор пароля</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation">
                            <div class="invalid-feedback">
                                @error('password')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-center w-100">
                            <button type="submit" class="btn text-white" style="background-color:#0D0497;">Регистрация</button>
                        </div>
                    </form>
                </div>
                {{--      Форма      --}}
                <div class="mt-5">
                    <span><small>Если вы уже зарегистрированы</small> <a href="{{route('login')}}">Авторизация</a></span>
                </div>
            </div>
        </div>
    </div>
@endsection
