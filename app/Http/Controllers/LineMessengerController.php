<?php

namespace App\Http\Controllers;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use App\User;
use App\Post;
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
        
        $message = "今月のランキング！\n\nベンチプレス↓\n";
        for($i=0; $i< count($name1);$i++){ //ベンチの配列の長さ取得
            $rank = $i + 1;
            $bench = $rank . "位 " . $name1[$i] . " " . $weight1[$i] . "kg " . $rep1[$i] . "回";
            $message .= $bench . "\n";
        }

        $message .= "\nスクワット↓\n";
        for($i=0; $i< count($name2);$i++){ //ベンチの配列の長さ取得
            $rank = $i + 1;
            $squat = $rank . "位 " . $name2[$i] . " " . $weight2[$i] . "kg " . $rep2[$i] . "回";
            $message .= $squat . "\n";
        }

        $message .= "\nその他ランキングは以下からチェック！" . "\n" . "https://blooming-brook-25294.herokuapp.com/rankings";
 
        // メッセージ送信
        $textMessageBuilder = new TextMessageBuilder($message);
        $response = $bot->multicast($userIds, $textMessageBuilder);
    }
    
}
