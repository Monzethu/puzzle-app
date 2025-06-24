<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー詳細</title>
</head>
<body>
<h1>{{ $user->name }} さんの詳細情報</h1>
<ul>
    <li>ID: {{ $user->id }}</li>
    <li>レベル: {{ $user->level }}</li>
    <li>経験値: {{ $user->experience }}</li>
    <li>体力: {{ $user->hp }}</li>
</ul>

<h2>所持アイテム</h2>
@if ($user->items->isEmpty())
    <p>アイテムなし</p>
@else
    <ul>
        @foreach ($user->items as $item)
            <li>{{ $item->name }} ({{ $item->explanation }})</li>
        @endforeach
    </ul>
@endif

<a href="{{ url('user') }}">ユーザー一覧に戻る</a>
</body>
</html>
