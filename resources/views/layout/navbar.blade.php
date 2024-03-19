<nav class="navbar navbar-expand-lg bg-body-tertiary" style="height: 20vh;">
    <div class="container-fluid w-75 d-flex justify-content-sm-between">
        <div class="" style="width: 130px; height: 100px">
            <img src="{{asset('images/Logo.png')}}" alt="" style="object-fit: cover; width: 100%;">
        </div>
        <div class="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                @auth()
                    <div class="navbar-nav">
                        {{--                    <a class="nav-link active" aria-current="page" href="{{route('games')}}">Игры</a>--}}
                        {{--                    <a class="nav-link" href="{{route('themes')}}">Категории</a>--}}
                        {{--                    <a class="nav-link" href="{{route('exit')}}">Выход</a>--}}
                    </div>
                @endauth

            </div>
        </div>
    </div>
</nav>
