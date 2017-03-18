<?php

namespace zacksleo\yii2\wechat\controllers;

use yii\web\Controller;

class ReplayController extends Controller
{
    public function actions()
    {
        return [
            'beadded' => [
                'class' => 'pheme\settings\SettingsAction',
                'modelClass' => 'zacksleo\wechat\models\WechatPayConfig',
                'viewName' => 'wechat-pay'
            ],
            'autoreply' => [
                'class' => 'pheme\settings\SettingsAction',
                'modelClass' => 'zacksleo\wechat\models\WechatBasicConfig',
                'viewName' => 'wechat-basic'
            ],
            'smartreply' => [
                'class' => 'pheme\settings\SettingsAction',
                'modelClass' => 'zacksleo\wechat\models\WechatBasicConfig',
                'viewName' => 'wechat-basic'
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}
