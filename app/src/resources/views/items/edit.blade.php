@extends('layouts.app')

@section('title', 'アイテム編集')
@section('body')
    <h1>アイテム編集</h1>

    <form method="POST" action="{{ route('items.update', $item->id) }}">
        @csrf
        @method('PUT')

        名前：<input name="name" value="{{ old('name', $item->name) }}"><br>
        種類：<input name="type" value="{{ old('type', $item->type) }}"><br>
        説明：<textarea name="explanation">{{ old('explanation', $item->explanation) }}</textarea><br>

        <button type="submit">更新する</button>
    </form>
@endsection
