<?php

namespace zacksleo\yii2\wechat\backend\controllers;

use yii\web\Controller;

class ReplayController extends Controller
{
    public function actions()
    {
        return [
            'beadded' => [
                'class' => 'pheme\settings\SettingsAction',
                'modelClass' => 'zacksleo\wechat\common\models\WechatPayConfig',
                'viewName' => 'wechat-pay'
            ],
            'autoreply' => [
                'class' => 'pheme\settings\SettingsAction',
                'modelClass' => 'zacksleo\wechat\common\models\WechatBasicConfig',
                'viewName' => 'wechat-basic'
            ],
            'smartreply' => [
                'class' => 'pheme\settings\SettingsAction',
                'modelClass' => 'zacksleo\wechat\common\models\WechatBasicConfig',
                'viewName' => 'wechat-basic'
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
