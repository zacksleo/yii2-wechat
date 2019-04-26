<?php

namespace zacksleo\yii2\wechat\backend\controllers;

use yii\web\Controller;

class MenuController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
