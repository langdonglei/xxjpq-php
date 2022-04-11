<?php

use GuzzleHttp\Client;

require_once __DIR__ . '/vendor/autoload.php';

/**
 * @throws Exception
 */
function token()
{
    $token_path = '/.tencentcloudbase/wx/cloudbase_access_token';
    if (file_exists($token_path)) {
        return file_get_contents($token_path);
    }
    throw new Exception('no token file');
}

$token = token();
echo $token . '<br><pre>';


$client = new Client();
$api = "https://api.weixin.qq.com/wxa/msg_sec_check?cloudbase_access_token=$token";
$res = $client->post($api, [
    'json' => [
        'content' => 'abcd'
    ]
])->getBody()->getContents();
$res = json_decode($res, true);
print_r($res);


