<?php

use App\Http\Controllers\Sample\IndexController;
use App\Http\Controllers\Tweet\IndexController as TweetIndexController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// ::はstaticメソッドと呼ばれ、newのようにインスタンス化することなくクラスの関数を呼び出せる
Route::get('/sample', [IndexController::class, 'show']);
Route::get('/sample/{id}', [IndexController::class, 'showId']);

Route::get('/tweet', TweetIndexController::class);