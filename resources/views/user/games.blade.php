@extends('layout.app')
@section('title')
    Игры
@endsection
@section('main')
    <div class="container-fluid p-0 w-100" style="min-height: 80vh;">
        <div class="w-100" style="position: absolute;top:20vh;  bottom: 0;">
            <div class="container-fluid w-75 pt-5" style="padding-bottom: 50px">
                {{--            Игры--}}
                <div class="d-flex flex-wrap w-100 justify-content-sm-between">
                    <h3 style="margin-right: 30px">Игры</h3>
                    <a href="{{route('add_game_page')}}" class="btn btn-primary">Создать новую игру</a>
                </div>
                <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                    @if(count($games)>0)
                        @foreach($games as $game)
                            <div class="accordion-item shadow mt-1 p-3 w-100 d-flex justify-content-between align-items-center">
                                <span>
                                        {{$game->title}}
                                </span>
                                <div>
                                    <a href="{{route('step_2',['id'=>$game->id])}}" class="btn btn-light">Подробнее</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="w-100 text-center mt-1">
                            <h5>Пусто</h5>
                        </div>
                    @endif
                </div>
                {{--            Игры--}}
            </div>

        </div>
    </div>
@endsection
