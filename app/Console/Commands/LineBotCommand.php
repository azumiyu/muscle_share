<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use App\Models\User;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;
use Illuminate\Http\Request;

class LineBotCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:lineBot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Lineで1ヶ月に1回ランキングを表示します。';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Request $request)
    {
        // LINEBOTSDKの設定
        $http_client = new CurlHTTPClient(config('services.line.channel_token'));
        $bot = new LINEBot($http_client, ['channelSecret' => config('services.line.messenger_secret')]);
 
        // 送信するメッセージの設定
        $reply_message='メッセージありがとうございます';
 
        // ユーザーにメッセージを返す
        $reply=$bot->replyText('yuki0517baseball',$reply_message);
        return 'ok';
    }
}
