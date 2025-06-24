<html lang="ja">
<body>
<h1>■アイテム一覧</h1>
<table border="1">
    <thead>
    <tr>
        <th>No.</th>
        <th>id</th>
        <th>アイテム名</th>
        <th>種類</th>
        <th>説明</th>
        <th>操作</th>
    </tr>
    </thead>
    @foreach ($items as $index=>$item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item['id'] }}</td>
            <td>{{ $item['name'] }}</td>
            <td>{{ $item['type'] }}</td>
            <td>{{$item['explanation']}}</td>
            <td>
                {{-- 編集ボタン --}}
                <a href="{{ route('items.edit', $item->id) }}">編集</a>

                {{-- 削除ボタン --}}
                <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;"
                      onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">削除</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
<a href="{{url('items/create')}}">アイテムを新規作成</a>
<a href="{{url('home')}}">ホームに戻る</a>
</body>
</html>
