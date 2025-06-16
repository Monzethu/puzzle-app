<html lang="ja">
<body>
<h1>■スコア一覧</h1>
<table border="1">
    <thead>
    <tr>
        <th>ユーザー名</th>
        <th>スコア</th>
    </tr>
    </thead>
    @foreach ($scores as $account)
        <tr>
            <td>{{ $account['name'] }}</td>
            <td>{{ $account['score'] }}</td>
        </tr>
    @endforeach
</table>
<a href="{{url('home')}}">ホームに戻る</a>
</body>
</html>
