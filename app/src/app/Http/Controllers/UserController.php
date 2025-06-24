<?php

namespace App\Http\Controllers;

//use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function user(Request $request)
    {
        //テーブルの全てのレコードを取得
        //$users = User::All();
        $users = User::simplePaginate(10);

//        $data = [
//            [
//                'name' => 'テストさん',
//                'password' => '$3$3kdiei2',
//            ],
//            [
//                'name' => 'jobi',
//                'password' => '$9$s#2kdie',
//            ]
//        ];

        return view('users/index', ['accounts' => $users]);
    }

    // ユーザー詳細
    public function show($id)
    {
        $user = User::with('items')->findOrFail($id);
        return view('users.show', compact('user'));
    }
}
