<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Item;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AccountController extends Controller
{
    //アカウント一覧を表示する
    public function index(Request $request)
    {
        //テーブルの全てのレコードを取得
        //$accounts = Account::All();

        //$title = 'アカウント一覧';

//        //idで検索,見つからなかったら404エラー
//        $account = Account::findOrFail(1);
//
//        //条件を指定して取得
//        $account = Account::where('name', '=', 'jobi')->get();

        //return view('accounts/index', ['title' => $title, 'accounts' => $accounts]);


//        Debugbar::info('情報表示だよ');
//        Debugbar::warning('警告だよ');
//        Debugbar::error('エラーだよ');
//

        return view('accounts/home');
    }

    public function user(Request $request)
    {
        //テーブルの全てのレコードを取得
        $accounts = Account::All();// jobi jobi
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
}
