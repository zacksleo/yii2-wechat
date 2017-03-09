<?php
namespace zacksleo\yii2\wechat\assets;

use yii\web\AssetBundle;

class Asset extends AssetBundle
{

    public $sourcePath = '@vendor/zacksleo/yii2-wechat/src/assets';

    public $css = [
        'css/layout_head218878.css',
        'css/base22a2de.css',
        'css/lib218878.css',
        'css/page_index21bbfa.css',
        'css/pagination218878.css',
        'css/processor_bar218878.css',
        'css/common.css',
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
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
