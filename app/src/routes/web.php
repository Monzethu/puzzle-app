<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;


Route::post('login', [AuthController::class, 'login']);// ログイン処理
Route::post('logout', [AuthController::class, 'logout']);// ログアウト処理

Route::get('accounts/index', [AccountController::class, 'index']);// アカウント一覧ページ

Route::get('home', [AccountController::class, 'index']);
Route::get('score', [AccountController::class, 'score']);
Route::get('user', [AccountController::class, 'user']);

Route::get('/{error_id?}', [AuthController::class, 'index'])->name('index');// ログイン処理
