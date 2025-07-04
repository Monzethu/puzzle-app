<html lang="ja">
<body>
<h1>■アカウント一覧</h1>
{{$accounts->links()}}
<table border="1">
    <thead>
    <tr>
        <th>id</th>
        <th>ユーザー名</th>
        <th>Level</th>
        <th>Exp</th>
        <th>Life</th>
    </tr>
    </thead>
    @foreach ($accounts as $user)
        <tr>
            <td><a href="{{ route('users.show', $user->id) }}">{{ $user->id }}</a></td>
            <td><a href="{{ route('users.show', $user->id) }}">{{ $user->name }}</a></td>
            <td>{{ $user['level'] }}</td>
            <td>{{ $user['exp'] }}</td>
            <td>{{ $user['life'] }}</td>
        </tr>
    @endforeach
</table>
<a href="{{url('home')}}">ホームに戻る</a>
</body>
</html>
