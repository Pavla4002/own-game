@extends('layout.app')
@section('title')
    Игры
@endsection
@section('main')
    <div class="container-fluid p-0 w-100" style="min-height: 80vh;">
        <div class="w-100" style="position: absolute;top:15vh;  bottom: 0;">
            <div class="container-fluid w-75 pt-5" style="padding-bottom: 50px">
                <div class="">
                    Примерный вид игры для удобства редактирования. При нажатии на баллы открывается вопрос и правильный ответ.
                </div>
                @foreach($helpers as $help)
                    <div class="mt-2">
                        <div class="">
                            <h5>РАУНД №{{$help->round}}</h5>
                        </div>
                            @foreach($game_themes as $g_t)
                            @if($g_t->round=== $help->round)
                                <div class="d-flex w-100 flex-wrap  mt-3">
                                    <div class="d-flex justify-content-center align-items-center text-white" style="background-color:#e7ab29; width: 150px; height: 100px">
                                        {{$g_t->theme->title}}
                                    </div>
                                    <div class="d-flex justify-content-sm-between flex-wrap">
                                        @foreach($questions as $quest)
                                            @if($quest->game_theme_id===$g_t->theme_id)
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal_edit_{{$quest->id}}" class="d-flex justify-content-center align-items-center text-white" style="background-color:#0D0497; width: 150px; height: 100px; margin-left: 30px; border-radius: 10px; border: none">{{$quest->cost}}</button>
                                                {{--Edit modal--}}
                                                <div class="modal fade" id="exampleModal_edit_{{$quest->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Вопросы</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{--                                                --}}
                                                                    <div class="mt-3">
                                                                        @if($quest->img!==null)
                                                                            <div class="">
                                                                                <span>Картинка:</span>
                                                                                <div style="width: 100%; height: 250px">
                                                                                    <img src="{{asset($quest->img)}}" alt="image" style="width: 100%; height: 100%; object-fit: cover">
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <div class="mt-3"><b>Вопрос:</b> {{$quest->question}}</div>
                                                                        <div class="mt-3 w-100"><b>Правильный ответ: </b> <span>{{$quest->right_answer}}</span></div>
                                                                        <div class="mt-3"><b>Стоимость: </b> {{$quest->cost}}</div>
                                                                    </div>
                                                                {{--                                                --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{--                                --}}
                                            @endif
                                        @endforeach

                                    </div>
                                </div>
                            @endif
                            @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
