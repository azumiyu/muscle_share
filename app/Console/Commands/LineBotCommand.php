<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use LINE\LINEBot\HTTPClient\CurlHTTPClient;
use LINE\LINEBot;
use App\User;
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
    public function handle()
    {
        if(date('Y-m-t') == date('Y-m-d')){
            $linePost = file_get_contents('https://blooming-brook-25294.herokuapp.com/line/message');
            echo $linePost;
        }
    }
}
