<?php
namespace zacksleo\yii2\wechat\common\models;

use yii\base\Model;

class WechatPayConfig extends Model
{
    public $active;
    public $merchantId;
    public $merchantSecret;

    public function rules()
    {
        return [
            [['merchantId', 'merchantSecret'], 'string'],
            ['active', 'integer']
        ];
    }

    public function fields()
    {
        return ['active', 'merchantId', 'merchantSecret'];
    }

    public function attributes()
    {
        return ['active', 'merchantId', 'merchantSecret'];
    }
}
