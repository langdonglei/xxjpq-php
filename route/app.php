<?php

use GuzzleHttp\Client;
use think\facade\Route;

Route::get('test', function () {
    throw new Exception('test');
    $token_path = '/.tencentcloudbase/wx/cloudbase_access_token';
    if (file_exists($token_path)) {
        $token = file_get_contents($token_path);
        dump($token);
    } else {
        throw new Exception('no token file');
    }

    $client = new Client();
    $api = "https://api.weixin.qq.com/wxa/msg_sec_check?cloudbase_access_token=$token";
    $res = $client->post($api, [
        'json' => [
            'content' => 'abcd'
        ]
    ])->getBody()->getContents();
    $res = json_decode($res, true);
    dump($res);
});
