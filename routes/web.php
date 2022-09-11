<?php

use App\Http\Controllers\Sample\IndexController;
use App\Http\Controllers\Tweet\CreateController;
use App\Http\Controllers\Tweet\DeleteController;
use App\Http\Controllers\Tweet\IndexController as TweetIndexController;
use App\Http\Controllers\Tweet\Update\IndexController as UpdateIndexController;
use App\Http\Controllers\Tweet\Update\PutController;
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

// つぶやきの新規投稿
Route::get('/tweet', TweetIndexController::class)->name('tweet.index');

Route::middleware('auth')->group(function () {
    Route::post('/tweet/create', CreateController::class)->name('tweet.create');
    // つぶやきの編集
    Route::get('/tweet/update/{tweetId}', UpdateIndexController::class)->name('tweet.update.index');
    // 更新処理をPUTとする。PUTメソッドはPOSTと同様にリソースの作成や更新を意味するが、POSTとは違い”べき等”であることを表す
    // べき等とは、ある操作を1回行っても複数回行っても結果が同じになるという概念。編集リクエストは何度送られても同じ結果になる
    Route::put('/tweet/update/{tweetId}', PutController::class)->name('tweet.update.put');

    // つぶやきの削除
    Route::delete('/tweet/delete/{tweetId}', DeleteController::class)->name('tweet.delete');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
