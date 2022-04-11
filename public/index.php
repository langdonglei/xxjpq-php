<?php
ini_set('display_errors',1);
use GuzzleHttp\Client;

require_once __DIR__ . '/../vendor/autoload.php';

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

// $token = token();
// echo $token . '<br><pre>';


$client = new Client();
#$api = "https://api.weixin.qq.com/wxa/msg_sec_check?cloudbase_access_token=$token";
$api = "http://api.weixin.qq.com/wxa/msg_sec_check?cloudbase_access_token=CL0BEoACRgKBrJ4pH9_fREbM59k5fYdvvC-gDXXLd3xg_Q_MWKqHMMl_1_brg7iurV7rdbby1L6gg0EJFzZPYNFff_lHa41a_aP0zjNFuxRNPbA1yqgrtmiTd81e3OXlxl9C1BLafkX2rSF5BFGimp6lcCMsMWTkACXLvEBetBPIEH_kpS67VA8Z2l7UxNlYYsN0NZNeQqf2s6oARVuY7aerbPtnlJd-HfNpthJzVXBegliInfUMXH72tA9hOBILDCTYsdaz8hpxvpD0vhXPD6CNrM3VkmOAkQ1jgMsWYnlWU3BHjrTDWzAwiAlfmlc4aIUTv6EK8DBraxY9-HAexGgAPNg9UhgFIAA";
$res = $client->post($api, [
    'json' => [
        'content' => 'abcd'
    ]
])->getBody()->getContents();
$res = json_decode($res, true);
print_r($res);


