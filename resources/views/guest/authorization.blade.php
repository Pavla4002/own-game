@extends('layout.app')
@section('title')
    Регистрация
@endsection
@section('main')
    <div class="container-fluid p-0" style="min-height: 80vh">
        @if(session()->has('ok'))
            <div class="container-fluid alert alert-success w-75">
                {{session('ok')}}
            </div>
        @elseif(session()->has('error'))
            <div class="container-fluid alert alert-danger w-75">
                {{session('error')}}
            </div>
        @endif
            <div class="container-fluid p-0" style="min-height: 80vh">
                <div class="d-flex justify-content-center align-items-center w-100 mt-5" style="position: absolute;top:0;  bottom: 0;">
                    <div class="mt-5" style="width: 30%; min-width: 300px; padding-top:30px ">
                        <h2 class="text-uppercase w-100 text-center">Авторизация</h2>
                        {{--      Форма      --}}
                        <div class="">
                            <form action="{{route('auth_user')}}" method="post">
                                @csrf
                                @method('post')
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
                                <div class="d-flex justify-content-center w-100">
                                    <button type="submit" class="btn text-white" style="background-color:#0D0497;">Авторизация</button>
                                </div>
                            </form>
                        </div>
                        {{--      Форма      --}}
                        <div class="mt-5">
                            <span><small>Если вы еще не зарегистрированы</small> <a href="{{route('reg_page')}}">Регистрация</a></span>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
