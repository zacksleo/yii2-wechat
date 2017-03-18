<?php

namespace zacksleo\yii2\wechat\controllers;

use yii;
use yii\web\Controller;

class ConfigController extends Controller
{

    /**
     * 确保settings模块初始化过（注册i18n）
     * @param yii\base\Action $action
     * @return bool
     * @throws yii\web\BadRequestHttpException
     * @see https://github.com/phemellc/yii2-settings/issues/51#issuecomment-259896784
     */
    public function beforeAction($action)
    {
        Yii::$app->getModule('settings')->init();
        return parent::beforeAction($action);
    }

    public function actions()
    {
        return [
            //....
            'wechat-pay' => [
                'class' => 'pheme\settings\SettingsAction',
                'modelClass' => 'zacksleo\yii2\wechat\models\WechatPayConfig',
                //'scenario' => 'site', // Change if you want to re-use the model for multiple setting form.
                'viewName' => 'wechat-pay'   // The form we need to render
            ],
            'wechat-basic' => [
                'class' => 'pheme\settings\SettingsAction',
                'modelClass' => 'zacksleo\yii2\wechat\models\WechatBasicConfig',
                //'scenario' => 'site', // Change if you want to re-use the model for multiple setting form.
                'viewName' => 'wechat-basic'   // The form we need to render
            ],
            //....
        ];
    }
}
