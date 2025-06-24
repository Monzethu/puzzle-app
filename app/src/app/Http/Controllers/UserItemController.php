<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserItem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserItemController extends Controller
{
    public function index()
    {
        $users = User::with('items')->simplePaginate(10);
        $items = \App\Models\Item::all();

        return view('user_items.index', compact('users', 'items'));
    }

    public function attachItem(Request $request, $userId)
    {
        $request->validate([
            'item_id' => 'required|exists:items,id',
        ]);

        $user = User::findOrFail($userId);
        $itemId = $request->input('item_id');

        $user->items()->syncWithoutDetaching([$itemId]);

        return redirect()->back()->with('success', 'アイテムを付与しました');
    }
}
