<?php

namespace tests\models;

use tests\TestCase;
use zacksleo\yii2\wechat\models\WechatBasicConfig;

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
        $this->assertArrayHasKey('appId', $fields);
        $this->assertArrayHasKey('appSecret', $fields);
        $this->assertArrayHasKey('token', $fields);
        $this->assertArrayHasKey('encodingAESKey', $fields);
    }

    public function testAttributes()
    {
        $model = new WechatBasicConfig();
        $attributes = $model->attributes();
        $this->assertArrayHasKey('appId', $attributes);
        $this->assertArrayHasKey('appSecret', $attributes);
        $this->assertArrayHasKey('token', $attributes);
        $this->assertArrayHasKey('encodingAESKey', $attributes);
    }
}
