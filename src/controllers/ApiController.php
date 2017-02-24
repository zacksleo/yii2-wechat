<?php

namespace zacksleo\yii2\wechat\controllers;

use yii;
use yii\web\Controller;

class ApiController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionServer()
    {
        $server = Yii::$app->easywechat->server;
        $server->setMessageHandler(function ($message) {
            switch ($message->MsgType) {
                case 'event':
                    # 事件消息...
                    break;
                case 'text':
                    return '您好!欢迎关注我!';
                    break;
                case 'image':
                    # 图片消息...
                    break;
                case 'voice':
                    # 语音消息...
                    break;
                case 'video':
                    # 视频消息...
                    break;
                case 'location':
                    # 坐标消息...
                    break;
                case 'link':
                    # 链接消息...
                    break;
                // ... 其它消息
                default:
                    return '您好!欢迎关注我!';
                    break;
            }

        });
        $response = $server->serve();
        return $response->send();
    }
}