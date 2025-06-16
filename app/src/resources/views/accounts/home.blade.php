<html lang="ja">
<body>
<h1>■ホーム</h1>
<a href="{{url('user')}}">ユーザー一覧へ</a>
<a href="{{url('score')}}">スコア一覧へ</a>
<form method="post" action="{{url('logout')}}">
    @csrf
    <button type="submit">ログアウト</button>
</form>
</body>
</html>
