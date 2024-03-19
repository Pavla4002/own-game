@extends('layout.app')
@section('title')
    Вопросы
@endsection
@section('main')
    <div class="container-fluid p-0 w-100" style="min-height: 90vh;">
        <div class="w-100" style="position: absolute;top:20vh;  bottom: 0;">
            <div class="container-fluid w-75 pt-5" style="min-width: 300px; padding-bottom: 50px; position: relative">
                <div class="container-fluid " style="min-width: 300px">
                    <div class="w-100 d-flex justify-content-between">
                        <h3 class="d-flex flex-wrap align-items-center">
                            {{$game->title}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                            </svg>
                            Категории
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
                            </svg>
                            Вопросы
                        </h3>
                        <div class="">
                            <a href="{{route('games')}}">Вернться к играм</a>
                        </div>
                    </div>
{{--Правила--}}
                    <div class="">
                        <div class="">
                            <span>Вернуться к добалвению раундов </span>
                            <a href="{{route('step_2',['id'=>$game->id])}}">Назад</a>
                        </div>
                        <div class="mt-3 mb-3">
                            Для добавления вопроса необходимо: <br>
                            1. Заполнить форму; <br>
                            2. Выбрать категорию, к которой хотите назначить вопрос. <br>
                        </div>
                    </div>
                    {{--Правила--}}
{{--                   Error --}}
                    <div class="">
                        @if(session()->has('error'))
                            <div class="container-fluid alert alert-danger w-100">
                                {{session('error')}}
                            </div>
                        @endif
                    </div>
{{--                    --}}
                    <form action="{{route('add_question')}}" method="post">
                        @csrf
                        @method('post')
{{--                       Форма вопроса --}}
                        <div class="bg-body-secondary p-3 mt-3">
                            <div class="mt-2">
                                <label for="question">Вопрос</label>
                                <textarea class="form-control @error('question') is-invalid @enderror" type="text" id="question" name="question"></textarea>
                                <div class="invalid-feedback">
                                    @error('question')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <label for="right_answer">Правильный ответ</label>
                                <textarea class="form-control @error('right_answer') is-invalid @enderror" type="text" id="right_answer" name="right_answer"></textarea>
                                <div class="invalid-feedback">
                                    @error('right_answer')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <label for="img">Картинка <small class="fw-lighter">если необходима</small> </label>
                                <input class="form-control @error('img') is-invalid @enderror" type="file" id="img" name="img">
                                <div class="invalid-feedback">
                                    @error('img')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <label for="cost">Стоимость вопроса</label>
                                <input class="form-control @error('cost') is-invalid @enderror" type="number" id="cost" name="cost">
                                <div class="invalid-feedback">
                                    @error('cost')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
{{--                             Форма вопроса --}}
                        {{--                    --}}
                        <div class="mt-2">Необходимо выбрать категорию:</div>
                        @if(count($helpers)===0)
                            <h5>Пока тут пусто. Сначала необходимо добавить раунды и категории - <a href="{{route('step_2',['id'=>$game->id])}}">Категории</a></h5>
                        @endif
                        @foreach($helpers as $helper)
                            <div class="shadow mt-3 p-3">
                                <span>Раунд №{{$helper->round}}</span>
                                @foreach($game_themes as $game_theme)
                                    <div class="mt-3" style="margin-left: 10px">
                                        @if($game_theme->round ===$helper->round)
                                            <div class="d-flex w-100 justify-content-between">
                                                <div class="">
                                                    <label for="them_{{$game_theme->them->id}}"> <b>{{$game_theme->them->title}}</b></label>
                                                    <input type="radio" class="form-check-input" value="{{$game_theme->them->id}}" id="them_{{$game_theme->them->id}}" name="them"/>
                                                </div>
                                                <a href="{{route('remove_theme_game',['id'=>$game_theme->id])}}" class="btn btn-light">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                            @foreach($questions as $quest)
                                                @if($quest->them_id===$game_theme->them->id)

                                                    <div class="mt-3 border-bottom w-100 d-flex justify-content-between">
                                                        <div class="" style="width: 90%">
                                                            <span>Вопрос: {{$quest->text}}  </span>
                                                            <br>
                                                            <span>Cтоимость: {{$quest->cost}}</span>
                                                        </div>
                                                        <div class="p-0 m-0">
                                                            <a class="btn btn-light" href="{{route('del_quest_them',['id'=>$quest->id])}}">-</a>
                                                            <button class="btn-light btn" type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal_{{$quest->id}}">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                                                </svg>
                                                            </button>
{{--                                           modal                 --}}
                                                            <div class="modal fade" id="exampleModal_{{$quest->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Редактирование вопроса</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
{{--                                                                           --}}
                                                                            <form action="{{route('edit_question',['id'=>$quest->id])}}" method="post">
                                                                                @csrf
                                                                                @method('post')
                                                                                {{--                       Форма вопроса --}}
                                                                                <div class="bg-body-secondary p-3 mt-3">
                                                                                    <div class="mt-2">
                                                                                        <label for="question">Вопрос</label>
                                                                                        <input  class="form-control" type="text" id="question" name="question" value="{{$quest->text}}"/>
                                                                                    </div>
                                                                                    <div class="mt-2">
                                                                                        <label for="right_answer">Правильный ответ</label>
                                                                                        <input class="form-control " type="text" id="right_answer" name="right_answer" value="{{$quest->right_answer}}"/>
                                                                                    </div>
                                                                                    <div class="mt-2">
                                                                                        <label for="img">Картинка <small class="fw-lighter">если необходима</small> </label>
                                                                                        <input class="form-control " type="file" id="img" name="img">
                                                                                    </div>
                                                                                    <div class="mt-2">
                                                                                        <label for="cost">Стоимость вопроса</label>
                                                                                        <input class="form-control" type="number" id="cost" name="cost" value="{{$quest->cost}}">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="d-flex justify-content-end">
                                                                                    <button type="submit" class="btn btn-primary">Редактировать</button>
                                                                                </div>
                                                                            {{--                             Форма вопроса --}}
                                                                            </form>
{{--                                                                            --}}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
{{--                                               modal             --}}
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        {{--                    --}}
                        <div class="mt-3 w-100 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" style="position: fixed; bottom: 30px">Добавить вопрос</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
