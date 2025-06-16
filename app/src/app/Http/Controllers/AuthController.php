<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ログイン画面を表示する
    public function index(Request $request)
    {
        $title = 'ログイン';
        //dd($request);
        return view('auth/index', ['title' => $title, 'error_id' => $request->error_id]);
    }

    // ログイン処理を行う
    public function login(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:4', 'max:20'],
            'password' => ['required']
        ]);

        $name = $request->input('name');
        $password = $request->input('password');

        // 条件を指定して取得
        $account = Account::where('name', $name)->get();
        if (Hash::check($request->password, $account[0]->password)) {
            return redirect('accounts/index');
        } else {
            return redirect()->view('/', ['error' => 'invalid']);
        }

//        // nameが"jobi"かつpasswordが"jobi"の時アカウント一覧へリダイレクト
//        if ($name === 'jobi' && $password === 'jobi') {
//            return redirect('accounts/index');
//        } else {
//            $title = 'ログイン';
//            $error = 'ユーザー名またはパスワードが違います';
//            return view('accounts/login', [
//                'title' => $title,
//                'error' => $error
//            ]);
//        }
    }

    public function logout()
    {
        // セッションを全て削除してログアウト
        $request = request();
        $request->session()->flush();

        // ログイン画面へリダイレクト
        return redirect()->route('index')->with('message', 'ログアウトしました');
    }
}
