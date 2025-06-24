<html lang="ja">
<body>
<h1>■{{ $title }}</h1>
<table border="1">
    <thead>
    <tr>
        <th>ユーザー名</th>
        <th>パスワード</th>
    </tr>
    </thead>
    @foreach ($accounts as $account)
        <tr>
            <td>{{ $account['name'] }}</td>
            <td>{{ $account['password'] }}</td>
        </tr>
    @endforeach
</table>
{{--<form method="post" action="{{url('logout')}}">--}}
{{--    @csrf--}}
{{--    <button type="submit">ログアウト</button>--}}
{{--</form>--}}
<a href="{{url('home')}}">ホームに戻る</a>
</body>
</html>
