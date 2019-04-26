<?php

namespace tests\models;

use tests\TestCase;
use zacksleo\yii2\wechat\common\models\WechatBasicConfig;

/**
 * Class WechatBasicConfigTest
 * @package tests\models
 * @author zacksleo <zacksleo@gmail.com>
 */
class WechatBasicConfigTest extends TestCase
{
    public function testRules()
    {
        $model = new WechatBasicConfig();
        $model->appId = 'appId';
        $model->appSecret = 'appSecret';
        $model->token = 'token';
        $model->encodingAESKey = 'encodingAESKey';
        $this->assertTrue($model->validate());
    }

    public function testFields()
    {
        $model = new WechatBasicConfig();
        $fields = $model->fields();
        $this->assertEquals(['appId', 'appSecret', 'token', 'encodingAESKey'], $fields);
    }

    public function testAttributes()
    {
        $model = new WechatBasicConfig();
        $attributes = $model->attributes();
        $this->assertEquals(['appId', 'appSecret', 'token', 'encodingAESKey'], $attributes);
    }
}
