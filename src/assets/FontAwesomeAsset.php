<?php

namespace zacksleo\yii2\wechat\assets;

use yii\web\AssetBundle;

class FontAwesomeAsset extends AssetBundle
{
    public $sourcePath = '@bower/font-awesome';
    public $css = [
        'css/font-awesome.min.css'
    ];
    public $publishOptions = [
        'only' => [
            'fonts/*',
            'css/*'
        ]
    ];
}
