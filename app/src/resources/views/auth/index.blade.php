@extends('layouts.app')
@section('title','ログイン画面'){{--タブの名前が変わる--}}
@section('body')
    {{--<html lang=“ja”>--}}
    {{--<body>--}}
    <h1>■{{$title}}</h1>

    @if ($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="post" action="{{url('login')}}">
        @csrf
        ユーザー名：<input name="name"><br>
        パスワード：<input type="password" name="password"><br>
        <button type="submit">ログイン</button>
    </form>
    {{--</body>--}}
    {{--</html>--}}
@endsection
