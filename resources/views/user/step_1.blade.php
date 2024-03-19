@extends('layout.app')
@section('title')
    Начало
@endsection
@section('main')
    <div class="container-fluid p-0 w-100" style="min-height: 80vh">
        <div class="w-100" style="position: absolute;top:20vh;  bottom: 0;">
            <div class="container-fluid w-75 pt-5" style="min-width: 300px">
                <div class="container-fluid w-50" style="min-width: 300px">
                    <h3>Создание новой игры</h3>
                    <form action="{{route('add_game')}}" method="post" class="mt-5">
                        @csrf
                        @method('post')
                        <div class="mb-3 bg-body-secondary p-3">
                            <label for="title" class="form-label">Название игры</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                            <div class="invalid-feedback">
                                @error('title')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="w-100 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
