<?php
namespace zacksleo\yii2\wechat\models;


use yii\base\Model;

class WechatBasicConfig extends Model
{
    public $appId, $appSecret, $token, $encodingAESKey;

    public function rules()
    {
        return [
            [['appId', 'appSecret', 'token', 'encodingAESKey'], 'string'],
        ];
    }

    public function fields()
    {
        return ['appId', 'appSecret', 'token', 'encodingAESKey'];
    }

    public function attributes()
    {
        return ['appId', 'appSecret', 'token', 'encodingAESKey'];
    }
}