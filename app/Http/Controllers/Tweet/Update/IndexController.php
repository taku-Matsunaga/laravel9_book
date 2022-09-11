<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // URLのtweetIdを取得する
        $tweetId = (int) $request->route('tweetId');

        if(!$tweetService->checkOwnTweet($request->user()->id, $tweetId)){
            throw new AccessDeniedHttpException();
        };

        // $tweet = Tweet::where('id', $tweetId)->first();
        // if(is_null($tweet)){
        //     throw new NotFoundHttpException('存在しないつぶやきです');
        // }

        // ↑の省略版
        $tweet = Tweet::where('id', $tweetId)->firstOrFail();

        return view('tweet.update')->with('tweet', $tweet);
    }
}
