@extends('layout.app')
@section('title')
    Начало
@endsection
@section('main')
    <div class="container-fluid p-0" style="min-height: 80vh">
        <div class="d-flex justify-content-center align-items-center w-100" style="position: absolute;top:0;  bottom: 0;">
            <div class="" style="display:flex; flex-direction: column; justify-content: space-between; align-items: center; height:100px;">
                <h3>Для начала работы необходимо авторизоваться</h3>
                <a href="{{route('login')}}" class="btn btn-primary w-50">Вход</a>
            </div>
        </div>
    </div>
@endsection
