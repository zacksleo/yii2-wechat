<?php
namespace zacksleo\yii2\wechat\backend\models;

use yii\base\Model;

class BeAddedReplay extends Model
{
    public $content;

    public function rules()
    {
        return [
            ['content', 'string'],
            ['content', 'required']
        ];
    }

    public function fields()
    {
        return ['content'];
    }

    public function attributes()
    {
        return ['content'];
    }
}
