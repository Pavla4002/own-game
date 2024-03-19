<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    {{--    My styles--}}
</head>
<body style="min-height: 100vh">
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
@include('layout.navbar')
@yield('main')
</body>
</html>
