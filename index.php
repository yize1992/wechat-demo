<?php

include __DIR__ . '/vendor/autoload.php'; // 引入 composer 入口文件

use EasyWeChat\Foundation\Application;

use EasyWeChat\Message\Article;

    use EasyWeChat\Message\News;
$options = [
    //'debug'  => true,
    'app_id' => 'wxe37a72963c3c800d',
    'secret' => '220cb783ba07eeddc51746b04063b4c0',
    'token'  => 'admin',
    'aes_key' => '28IbmJYncTWCiGjFe267EFZuD4bPqfw346l4GGAAbJK', // 可选

    /*
    'log' => [
        'level' => 'debug',
        'file'  => '/tmp/easywechat.log', // XXX: 绝对路径！！！！
    ],
    */

    //...
];

// ...

$app = new Application($options);

// 从项目实例中得到服务端应用实例。
$server = $app->server;

$server->setMessageHandler(function ($message) {
    switch ($message->MsgType) {
        case 'event':
            # 事件消息...
            break;
        case 'text':
            # 文字消息...
            break;
        case 'image':
            # 图片消息...
            break;
        case 'voice':
            # 语音消息...
            break;
        case 'video':
            # 视频消息...
            break;
        case 'location':
            # 坐标消息...
            break;
        case 'link':
            # 链接消息...
            break;
        // ... 其它消息
        default:
            # code...
            break;
    }
    
    $title = '图文标题';
    $url = 'https://baidu.com';
    $image = 'https://tpc.googlesyndication.com/pagead/imgad?id=CICAgKDTk5CdZxDYBRhaMgh7LEcBJURHPQ';
    $news = new News([
            'title'       => $title,
            'description' => '...',
            'url'         => $url,
            'image'       => $image,
            // ...
        ]);
    return $news;
    // or
    /*
    $news = new News();
    $news->title = 'EasyWeChat';
    $news->description = '微信 SDK ...';
    */
// ...

    
    /*
    $article = new Article([
            'title'   => 'EasyWeChat',
            'author'  => 'overtrue',
            'content' => 'EasyWeChat 是一个开源的微信 SDK，它... ...',
            // ...
        ]);
        */
    // or
    /*
    $article = new Article();
    $article->title   = 'EasyWeChat';
    $article->author  = 'overtrue';
    $article->content = '微信 SDK ...';

    return $article;
    */
    // $message->FromUserName // 用户的 openid
    // $message->MsgType // 消息类型：event, text....
    return "您好！欢迎关注我! ";//.$message->CreateTime.' '.$message->MsgId.' '.$message->MsgType.' '.var_export($message, true);
});

$response = $server->serve();

$response->send(); // Laravel 里请使用：return $response;
