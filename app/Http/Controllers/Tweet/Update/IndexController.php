<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // URLのtweetIdを取得する
        $tweetId = (int) $request->route('tweetId');
        // $tweet = Tweet::where('id', $tweetId)->first();
        // if(is_null($tweet)){
        //     throw new NotFoundHttpException('存在しないつぶやきです');
        // }

        // ↑の省略版
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();

        return view('tweet.update')->with('tweet', $tweet);
    }
}
