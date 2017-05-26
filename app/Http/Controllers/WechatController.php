<?php

namespace App\Http\Controllers;


use Log;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use EasyWeChat\Message\News;
use EasyWeChat\Foundation\Application;
use App\Models\Weixinuser;
use App\Models\ServiceProvider;
class WechatController extends Controller
{
    public function index()
    {

    }

    public function serve()
    {

        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function($message){
            $wechat = app('wechat');

             return "欢迎关注 overtrue！";

        });



        Log::info('return response.');

        return $wechat->server->serve();
    }

    public function callback($value='')
    {
        $config = [
  // ...
  'oauth' => [
      'scopes'   => ['snsapi_base'],
      'callback' => '/oauth_callback',
  ],
  // ..
];
        $app = app('wechat');
        $oauth = $app->oauth;
// 获取 OAuth 授权结果用户信息
        $user = $oauth->user();
        $_SESSION['wechat_user'] = $user->toArray();

        $targetUrl = empty($_SESSION['target_url']) ? '/' : $_SESSION['target_url'];
    }
}
