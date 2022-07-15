<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [ContactController::class, 'index']);
// お問い合わせページ表示
Route::get('/confirm', [ContactController::class, 'confirm']);
Route::post('/confirm', [ContactController::class, 'confirm']);
// お問い合わせ情報をpostし、一旦DBには格納せず、内容確認のviewに送る
Route::post('/send', [ContactController::class, 'send']);
// confirm アクションで送られてきた情報を「送信」ボタンで、DBにcreate＝send アクション→redirect でthanksページ
Route::post('/revise', [ContactController::class, 'revise']);
// confirmアクション飛ばされた情報を再度お問い合わせページに送る
Route::get('/thanks', [ContactController::class, 'thanks']);
// thanksページへのredirect用rooting→念のためcontrollerを介してthanksページへ遷移するよう設定

// 以下管理システム用のrooting
Route::get('/admin', [AdminController::class, 'admin']);
// 管理者システム表示
Route::get('/search', [AdminController::class, 'search']);
Route::get('/reset', [AdminController::class, 'reset']);
// /adminにredirect
Route::post('/delete', [AdminController::class, 'delete']);

