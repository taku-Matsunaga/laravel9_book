<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\View\Factory;

class IndexController extends Controller
{

    // __invokeはPHPのマジックメソッドを利用して一つのコントローラクラスに一つのメソッドしかルーティングできないという制約を生み出す
    // マジックメソッドとは、__から始まるPHPで予約されたメソッド。オブジェクトの特殊な状態時に実行される関数が用意されていて、動作を上書きすることが可能

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Factory $factory)
    {

        $tweets = Tweet::orderBy('created_at', 'DESC')->get();
        // Laravel独自のヘルパー関数。dumn,dieの頭文字で、その場で処理を中断して変数の内容などを出力する
        // dd($tweets);

        // viewヘルパー関数でのViewの呼び方
        return view('tweet.index', ['tweets' => $tweets]);

        // テンプレートへ別の変数の渡し方
        // with関数はチェーンメソッドで何度も呼び出し可能
        // return view('tweet.index')->with('name', 'laravel')->with('version', '8');

        // Facadeでの呼び方
        // return View::make('tweet.index', ['name' => 'laravel']);

        // Factoryをインジェクションしての呼び方
        // return $factory->make('tweet.index', ['name' => 'laravel']);
    }
}
