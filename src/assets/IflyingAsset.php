<?php

namespace zacksleo\yii2\wechat\assets;

use yii\web\AssetBundle;

/**
 * @author zacksleo <zacksleo@gmail.com>
 */
class IflyingAsset extends AssetBundle
{
    public $sourcePath = '@vendor/zacksleo/yii2-wechat/src/assets/iflying';

    public $depends = [
        'zacksleo\yii2\wechat\assets\MpAsset'
    ];
}
