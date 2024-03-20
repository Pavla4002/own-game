@extends('layout.app')
@section('title')
    Вопросы
@endsection
@section('main')
<div>
    <div class="modal-dialog w-75">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="fs-5" id="exampleModalLabel">Редактирование вопроса</h1>
                <a href="{{route('quest_page',['id'=>$game->id])}}">Назад</a>
            </div>
            <div class="modal-body">
                <form action="{{route('edit_question',['id'=>$quest->id,'game'=>$game->id])}}" method="post">
                    @csrf
                    @method('post')
                    <div class="bg-body-secondary p-3 mt-3">
                        <div class="mt-2">
                            <label for="question">Вопрос</label>
                            <input  class="form-control" type="text" id="question" name="question" value="{{$quest->question}}"/>
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
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
