<html lang="ja">
<body>
<h1>■所持アイテム一覧</h1>
{{$users->links()}}
<table border="1">
    <thead>
    <tr>
        <th>id</th>
        <th>ユーザー名</th>
        <th>所持アイテム</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>
                {{-- 所持アイテム表示 --}}
                <div>
                    @if ($user->items->isEmpty())
                        <span style="color: gray;">アイテムなし</span>
                    @else
                        @foreach ($user->items as $item)
                            {{ $item->name }} ({{ $item->explanation }}){{ !$loop->last ? '、' : '' }}
                        @endforeach
                    @endif
                </div>

                {{-- アイテム付与 --}}
                <form method="POST" action="{{ route('user_items.attach', $user->id) }}" style="margin-top: 8px;">
                    @csrf
                    <select name="item_id" required>
                        <option value="">-- 付与するアイテムを選択 --</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit">付与</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<a href="{{ url('home') }}">ホームに戻る</a>
</body>
</html>
