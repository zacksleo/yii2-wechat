<?php

namespace zacksleo\yii2\wechat\backend\models;

use zacksleo\yii2\wechat\common\models\WechatNews;

class NewsPostForm extends WechatNews
{
    public $number;

    public function rules()
    {
        return [
            [['title', 'number', 'id'], 'required'],
            [['title'], 'string'],
            [['number', 'id'], 'integer'],
        ];
    }
}
