@extends('layout.app')
@section('title')
    Начало
@endsection
@section('main')
    <div class="container-fluid p-0 w-100" style="min-height: 90vh">
        <div class="w-100" style="position: absolute;top:20vh;  bottom: 0;">
            <div class="container-fluid w-75 pt-5" style="min-width: 300px; padding-bottom: 50px">
                <div class="container-fluid " style="min-width: 300px">
                    <div class="">
                        <h3 class="d-flex flex-wrap align-items-center">
                            {{$game->title}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                            </svg>
                            Категории
                        </h3>
                    </div>
                    <div class="">
                        <div class="mt-3">
                             <span>Добавьте нужное количество раундов. После, чтобы перейти к добавлению вопросов, нажмите
                        <a href="{{route('quest_page',['id'=>$game->id])}}">Далее</a>
                        </span>
                        </div>

                        <div class="mt-3 mb-3">
                            Для добвления раунда необходимо: <br>
                            1. Заполнить форму - номер раунда; <br>
                            2. Выбрать категории, который будут входить в раунд. <br>
                        </div>
                    </div>

                    @if(session()->has('ok'))
                        <div class="container-fluid alert alert-success">
                            {{session('ok')}}
                        </div>
                    @endif
                    <form action="{{route('add_round',['id'=>$game->id])}}" method="post">
                        @csrf
                        @method('post')
                            <div class="mt-3 p-3 text-white" style="background-color:#0D0497;border-radius: 10px">
                                <label for="round">Раунд №</label>
                                <input type="text" id="round" class="form-control @error('round') is-invalid @enderror" name="round">
                                <div class="invalid-feedback">
                                    @error('round')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        <div class="mt-3">
                            <span>Выберите нужные категории</span>
                        </div>
                            <div class="accordion accordion-flush mt-3" style="overflow-y: scroll; height: 300px">
                                @foreach($themes as $theme)
                                <div class="accordion-item shadow mt-1 p-3 mt-2 d-flex justify-content-sm-between">
                                    <label for="theme_{{$theme->id}}" class="w-100">{{$theme->title}}</label>
                                    <input id="theme_{{$theme->id}}" type="checkbox" value="{{$theme->id}}" name="themes[]"/>
                                </div>
                                    <div class="invalid-feedback">
                                        @error('themes')
                                        {{$message}}
                                        @enderror
                                    </div>
                                @endforeach
                            </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn text-white mt-3" style="background-color:#0D0497;">Добавить этот раунд</button>
                        </div>
                    </form>

                    <div class="">
                        <span>
                             Добавленные раунды:
                        </span>
                        @if(count($helpers)===0)
                            <h5>Пусто</h5>
                        @else
                            <div class="">
                                @foreach($helpers as $helper)
                                    <div class="shadow mt-3 p-3">
                                        <div class="w-100 d-flex justify-content-between">
                                            <span> <b>Раунд №{{$helper->round}}</b></span>
                                            <a href="{{route('del_round',['id'=>$game->id,'round'=>$helper->round])}}" class="btn btn-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                            </a>
                                        </div>

                                        @foreach($game_themes as $game_theme)
                                            <div class="mt-3" style="margin-left: 10px">
                                                @if($game_theme->round ===$helper->round)
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <div class="">
                                                            {{$game_theme->theme->title}}
                                                        </div>
                                                        <a href="{{route('remove_theme_game',['id'=>$game_theme->id])}}" class="btn btn-light">
                                                          -
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
