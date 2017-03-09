<?php
namespace zacksleo\yii2\wechat\assets;

use yii\web\AssetBundle;

class LoginAsset extends AssetBundle
{

    public $sourcePath = '@vendor/zacksleo/yii2-wechat/src/assets';

    public $css = [
        'css/processor_bar218878.css',
        'css/page_login218878.css',
        'css/fixed.css'

    ];
    public $publishOptions = [
        'only' => [
            'css/*',
            'images/*',
            'js/*'
        ]
    ];
    public $js = [

    ];

    public $depends = [
        'yii\web\YiiAsset',
    ];
}
