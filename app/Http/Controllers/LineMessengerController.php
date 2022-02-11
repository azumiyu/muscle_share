<?php

namespace App\Http\Controllers;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use App\User;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

use Illuminate\Http\Request;

class LineMessengerController extends Controller
{
    public function webhook(Request $request) {
        // LINEから送られた内容を$inputsに代入
        $inputs=$request->all();
 
        // そこからtypeをとりだし、$message_typeに代入
        $message_type=$inputs['events'][0]['type'];
 
        // メッセージが送られた場合、$message_typeは'message'となる。その場合処理実行。
        if($message_type=='message') {
            
            // replyTokenを取得
            $reply_token=$inputs['events'][0]['replyToken'];
 
            // LINEBOTSDKの設定
            $http_client = new CurlHTTPClient(config('services.line.channel_token'));
            $bot = new LINEBot($http_client, ['channelSecret' => config('services.line.messenger_secret')]);
 
            // 送信するメッセージの設定
            $reply_message='メッセージありがとうございます';
 
            // ユーザーにメッセージを返す
            $reply=$bot->replyText($reply_token, $reply_message);
            
            // LINEのユーザーIDをuserIdに代入
            $userId=$request['events'][0]['source']['userId'];
 
            // userIdがあるユーザーを検索
            $user=User::where('line_id', $userId)->first();
 
            // もし見つからない場合は、データベースに保存
            if($user==NULL) {
                $profile=$bot->getProfile($userId)->getJSONDecodedBody();
 
                $user=new User();
                $user->provider='line';
                $user->line_id=$userId;
                $user->name=$profile['displayName'];
                $user->save();
            }
            return 'ok';
        }
    }
    
    // メッセージ送信用
    public function message(Post $post) {
 
        // LINEBOTSDKの設定
        $http_client = new CurlHTTPClient(config('services.line.channel_token'));
        $bot = new LINEBot($http_client, ['channelSecret' => config('services.line.messenger_secret')]);
        
        $user = User::orderBy("created_at",'desc');
        // LINEユーザーID指定
        $userIds = $user->pluck("line_id")->whereNotNull()->toArray();
        
        //メッセージ設定
        $benchRanking = $post->benchData()->sort(function ($first, $second){
        if ($first['weight'] == $second['weight']) {
            return $first['rep'] < $second['rep'] ? 1 : -1 ;
        }
        return $first['weight'] < $second['weight'] ? 1 : -1 ;
        })->unique('user_id')->take(5);
        
        $squatRanking = $post->squatData()->sort(function ($first, $second){
        if ($first['weight'] == $second['weight']) {
            return $first['rep'] < $second['rep'] ? 1 : -1 ;
        }
        return $first['weight'] < $second['weight'] ? 1 : -1 ;
        })->unique('user_id')->take(5);
        
        $name1 = [];
        $weight1 = [];
        $rep1 = [];
        foreach ($benchRanking as $workoutrank) {
            $name1[] = $workoutrank->user->name;
            $weight1[] = $workoutrank->weight;
            $rep1[] = $workoutrank->rep;
        }
        
        $name2 = [];
        $weight2 = [];
        $rep2 = [];
        foreach ($squatRanking as $workoutrank) {
            $name2[] = $workoutrank->user->name;
            $weight2[] = $workoutrank->weight;
            $rep2[] = $workoutrank->rep;
        }
         
        $message="今月のランキング！
        ベンチプレス→
        １位 ".$name1[0]." ".$weight1[0]."kg ".$rep1[0]."回".PHP_EOL.
        "2位 ".$name1[1]." ".$weight1[1]."kg ".$rep1[1]."回".PHP_EOL.
        "3位 ".$name1[2]." ".$weight1[2]."kg ".$rep1[2]."回".PHP_EOL.
        "4位 ".$name1[3]." ".$weight1[3]."kg ".$rep1[3]."回".PHP_EOL.
        "5位 ".$name1[4]." ".$weight1[4]."kg ".$rep1[4]."回".PHP_EOL.
        
        "スクワット→
        １位 ".$name2[0]." ".$weight2[0]."kg ".$rep2[0]."回".PHP_EOL.
        "2位 ".$name2[1]." ".$weight2[1]."kg ".$rep2[1]."回".PHP_EOL.
        "3位 ".$name2[2]." ".$weight2[2]."kg ".$rep2[2]."回".PHP_EOL.
        "4位 ".$name2[3]." ".$weight2[3]."kg ".$rep2[3]."回".PHP_EOL.
        "5位 ".$name2[4]." ".$weight2[4]."kg ".$rep2[4]."回".PHP_EOL.
        "その他ランキングは以下からチェック！
        https://blooming-brook-25294.herokuapp.com/rankings";
 
        // メッセージ送信
        $textMessageBuilder = new TextMessageBuilder($message);
        $response = $bot->multicast($userIds, $textMessageBuilder);
    }
    
}
