<?php

namespace app\controller;

use think\response\Json;

class Banner
{
    public function index(): Json
    {
        return json([
            ['imgUrl' => 'https://t7.baidu.com/it/u=4198287529,2774471735&fm=193&f=GIF', 'relation' => ''],
            ['imgUrl' => 'https://t7.baidu.com/it/u=1956604245,3662848045&fm=193&f=GIF', 'relation' => '']
        ]);
    }
}