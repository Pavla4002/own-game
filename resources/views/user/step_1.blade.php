@extends('layout.app')
@section('title')
    Начало
@endsection
@section('main')
    <div class="container-fluid p-0 w-100" style="min-height: 80vh">
        <div class="w-100" style="position: absolute;top:20vh;  bottom: 0;">
            <div class="container-fluid w-100 pt-5" style="min-width: 300px">
                <div class="container-fluid w-75" style="min-width: 300px">
                    <h3>Создание новой игры</h3>
                    <span>На данном этапе необходимо придумать название игры и отправить форму, далее будут идти следующие этапы - заполнение игры контентом.</span>
                    <form action="{{route('add_game')}}" method="post" class="mt-3 text-white p-3" style="background-color:#0D0497;border-radius: 10px">
                        @csrf
                        @method('post')
                        <div class="mb-3">
                            <label for="title" class="form-label">Название игры</label>
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
        </div>
    </div>
@endsection
