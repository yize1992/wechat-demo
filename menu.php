<?php
date_default_timezone_set('PRC');
	ini_set("display_errors", "On");
	error_reporting(E_ALL & ~E_NOTICE);
include __DIR__ . '/vendor/autoload.php'; // 引入 composer 入口文件

use EasyWeChat\Foundation\Application;
// ...
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
//echo date('Y-m-d');die;
/*$directory = 'E:\temp\test.txt';
if ( ! is_writable($directory)) {
	throw new \InvalidArgumentException(sprintf(
			'The directory "%s" is not writable.',
			$directory
	));
}*/
//date_default_timezone_get()
$app = new Application($options);
$menu = $app->menu;
//\Doctrine\Common\Cache\FileCache::
$menus = $menu->all();

print_r($menus);