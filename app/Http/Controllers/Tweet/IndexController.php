<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function __invoke(Request $request)
    {
        return 'single Action';
    }
}
