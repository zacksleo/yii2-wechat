<?php

namespace zacksleo\yii2\wechat\assets;

use yii\web\AssetBundle;

/**
 * @author zacksleo <zacksleo@gmail.com>
 */
class MpAsset extends AssetBundle
{
    public $sourcePath = '@vendor/zacksleo/yii2-wechat/src/assets/mp';

    public $css = [
        'wx-mp.css',
    ];
}
