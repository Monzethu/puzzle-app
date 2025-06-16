<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    //アカウント一覧を表示する
    public function index(Request $request)
    {
        //テーブルの全てのレコードを取得
        $accounts = Account::All();

        $title = 'アカウント一覧';

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

    public function score(Request $request)
    {
        $score = [
            ['name' => 'テストさん', 'score' => 100],
            ['name' => 'jobi', 'score' => 50],
        ];

        return view('accounts/score', ['scores' => $score]);
    }

    public function user(Request $request)
    {
        $title = 'アカウント一覧';

        $data = [
            [
                'name' => 'テストさん',
                'password' => '$3$3kdiei2',
            ],
            [
                'name' => 'jobi',
                'password' => '$9$s#2kdie',
            ]
        ];

        return view('accounts/index', ['title' => $title, 'accounts' => $data]);
    }
}
