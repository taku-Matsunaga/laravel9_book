<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;

    // テーブル名とクラス名の紐付けが必要な場合
    // protected $stable = 'tweet';

    // 主キーの名前がidではなくtweet_idなど別名であった場合
    // protected $primaryKey = 'tweet_id';

    // 主キーが増分整数値(auto increment)ではなくUUIDなどの場合
    // 主キーが増分整数ではないことの宣言
    // public $incrementing = false;
    // 主キーが整数でない場合
    // protected $keyType = 'string';

    // created_at,updated_atが不要な場合
    // public $timestamps = false;
    // 対応するカラム名を指定
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'tweet_images')->using(TweetImage::class);
    }
}
