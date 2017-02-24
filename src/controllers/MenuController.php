<?php

namespace zacksleo\yii2\wechat\controllers;

use yii\web\Controller;

class MenuController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}