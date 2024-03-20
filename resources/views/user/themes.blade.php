@extends('layout.app')
@section('title')
    Категории
@endsection
@section('main')
    <div class="container-fluid p-0 w-100" style="min-height: 80vh">
        <div class="w-100" style="position: absolute;top:20vh;  bottom: 0;">
            <div class="container-fluid w-75 pt-5 pb-5" style="min-width: 300px">
                <div class="container-fluid p-0" style="min-width: 300px">
                    <div class="d-flex flex-wrap w-100 justify-content-sm-between">
                        <h3>Создание новой категории</h3>
                    </div>
                    <div class="w-100">
                        <form action="{{route('add_theme')}}" method="post" class="mt-3 p-3" style="background-color:#0D0497; color: white; border-radius: 10px ">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="title" class="form-label">Название категории</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                                <div class="invalid-feedback">
                                    @error('title')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100 d-flex justify-content-end">
                                <button type="submit" class="btn btn-light">Создать</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <h5>Все категории</h5>
                </div>
{{--                themes--}}
                <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                    @if(count($themes)>0)
                        @foreach($themes as $theme)
                            <div class="shadow mt-3 p-3 d-flex align-items-center justify-content-between">
                                <span >
                                    {{$theme->title}}
                                </span>
                                <div>
                                    <div class="d-flex justify-content-sm-between" style="width: 100px">
                                        {{--                                  кнопка модалки --}}
                                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal_{{$theme->id}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                            </svg>
                                        </button>
                                        {{--                                     кнопка модалки  --}}
                                        {{--                                    modal--}}
                                        <div class="modal fade" id="exampleModal_{{$theme->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Редактируем категорию</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{--                                                  form edit--}}
                                                        <form action="{{route('edit_theme',['id'=>$theme->id])}}" method="post" class="mt-3">
                                                            @csrf
                                                            @method('put')
                                                            <div class="mb-3">
                                                                <label for="title1" class="form-label">Название категории</label>
                                                                <input type="text" class="form-control @error('title1') is-invalid @enderror" value="{{$theme->title}}" id="title" name="title1">
                                                                <div class="invalid-feedback">
                                                                    @error('title1')
                                                                    {{$message}}
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="w-100 d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-primary">Редактировать</button>
                                                            </div>
                                                        </form>
                                                        {{--                                                  form edit--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                    modal--}}
                                        <div class="">
                                            <a href="{{route('del_theme',['id'=>$theme->id])}}" class="btn btn-light">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                    <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <div class="w-100 text-center mt-3">
                            <h5>Пусто</h5>
                        </div>
                    @endif
                </div>
{{--              themes  --}}
            </div>
        </div>
    </div>
@endsection
