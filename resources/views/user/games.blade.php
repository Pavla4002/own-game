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
                    <a href="{{route('add_game_page')}}" class="btn text-white" style="background-color:#0D0497;">Создать новую игру</a>
                </div>
                <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                    @if(count($games)>0)
                        @foreach($games as $game)
                            <div class="accordion-item shadow mt-1 p-3 w-100 d-flex justify-content-between align-items-center">
                               <div class="">
                                   <span>
                                        {{$game->title}}
                                    </span>
                                   <button class="btn btn-light" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal_edit_{{$game->id}}">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                           <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                       </svg>
                                   </button>
                               </div>
{{--Edit modal--}}
                                <div class="modal fade" id="exampleModal_edit_{{$game->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение названия игры</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
{{--                                                --}}
                                                <form action="{{route('edit_game',['id'=>$game->id])}}" method="post" class="text-white p-3">
                                                    @csrf
                                                    @method('put')
                                                    <div class="mb-3">
                                                        <label for="title" class="form-label">Название игры</label>
                                                        <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{$game->title}}" id="title" name="title">
                                                        <div class="invalid-feedback">
                                                            @error('title')
                                                            {{$message}}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="w-100 d-flex justify-content-end">
                                                        <button type="submit" class="btn text-white" style="background-color:#0D0497;">Редактировать</button>
                                                    </div>
                                                </form>
{{--                                                --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
{{--                                --}}

                                <div class="btn-group">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                       ...
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item" href="{{route('step_2',['id'=>$game->id])}}">Подробнее</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#">ДЕМО</a>
                                        </li>
                                    </ul>
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
