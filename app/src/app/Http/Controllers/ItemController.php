<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\SerialNumberGap;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ItemController extends Controller
{
    // アイテムの作成
    public function create(Request $request)
    {
        return view('items.create');
    }

    // アイテムの登録
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:30',
            'type' => 'required|string|max:30',
            'explanation' => 'nullable|string|max:255',
        ]);

        // 空き番号があれば再利用、なければ max+1
        $gap = \App\Models\SerialNumberGap::orderBy('serial_number')->first();

        if ($gap) {
            $serialNumber = $gap->serial_number;
            $gap->delete(); // 空き番号を使用済みにする
        } else {
            $serialNumber = (\App\Models\Item::max('serial_number') ?? 0) + 1;
        }

        $item = new \App\Models\Item($validated);
        $item->serial_number = $serialNumber;
        $item->save();

        return redirect()->route('items.result')->with('success', 'アイテムを登録しました');
    }


    // 完了画面表示
    public function result(Request $request)
    {
        $itemName = $request->input('item_name');
        $resultId = $request->input('result_id');
        return view('items.result', compact('itemName', 'resultId'));
    }

    // 一覧表示
    public function index(Request $request)
    {
        $items = Item::All();

        return view('items/index', ['items' => $items]);
    }

    // 編集画面を表示
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('items.edit', compact('item'));
    }

// 更新処理
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'explanation' => 'required|string|max:255',
        ]);

        $item = Item::findOrFail($id);
        $item->update($validated);

        return redirect()->route('items.index')->with('success', '更新しました');
    }

// 削除処理
    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        // 空き番号テーブルに追加
        SerialNumberGap::create(['serial_number' => $item->serial_number]);

        $item->delete();

        return redirect()->route('items.index')->with('success', '削除しました');
    }
}
