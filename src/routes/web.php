<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// お問い合わせフォーム入力ページ:/
// お問い合わせフォーム確認ページ:/confirm
// サンクスページ:/thanks
// 管理画面:/admin
// ユーザ登録ページ:/register
// ログインページ:/login

// お問い合わせフォーム入力ページ
Route::get('/', [ContactController::class, 'index']);

// お問い合わせフォーム確認ページ
Route::post('/confirm', [ContactController::class, 'confirm']);

// 問い合わせ内容登録→サンクスページの表示
Route::post('/thanks', [ContactController::class, 'store']);

// 管理画面
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin', [AdminController::class, 'search']);

// ユーザ登録ページ
Route::get('/register', [AuthController::class, 'create']);
Route::post('/register', [AuthController::class, 'store']);


Route::get('/login', [AuthController::class, 'login']);