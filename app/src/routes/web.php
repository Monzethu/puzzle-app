<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;

// アカウント

Route::post('login', [AuthController::class, 'login']);// ログイン処理
Route::post('logout', [AuthController::class, 'logout']);// ログアウト処理

Route::get('accounts/index', [AccountController::class, 'index']);// アカウント一覧ページ

// 管理画面
Route::get('home', [AccountController::class, 'index']);// TOP


// ユーザー
Route::get('user', [UserController::class, 'user']);

//アイテム
Route::prefix('items')->name('items.')->controller(ItemController::class)
    //->middleware(AuthController::class)
    ->group(function () {
        Route::get('index', 'index')->name('index');// アイテム一覧
        Route::get('create', 'create')->name('create');//登録
        Route::post('store', 'store')->name('store');// 処理
        Route::get('result', 'result')->name('result'); //登録完了

        Route::get('{id}/edit', 'edit')->name('edit');      // 編集画面
        Route::put('{id}', 'update')->name('update');       // 更新処理
        Route::delete('{id}', 'destroy')->name('destroy');  // 削除処理
    });

// 所持アイテム一覧
Route::get('user_items/index', [UserItemController::class, 'index'])->name('user_items.index');

// ユーザーにアイテム付与（POST）
Route::post('user_items/{user}/attach', [UserItemController::class, 'attachItem'])->name('user_items.attach');


Route::get('/{error_id?}', [AuthController::class, 'index'])->name('index');// ログイン処理
