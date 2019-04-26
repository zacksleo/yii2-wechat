<?php

namespace tests\models;

use tests\TestCase;
use zacksleo\yii2\wechat\common\models\WechatPayConfig;

/**
 * Class WechatPayConfigTest
 * @package tests\models
 * @author zacksleo <zacksleo@gmail.com>
 */
class WechatPayConfigTest extends TestCase
{
    public function testRules()
    {
        $model = new WechatPayConfig();
        $model->merchantId = 'merchantId';
        $model->merchantSecret = 'merchantSecret';
        $model->active = 1;
        $this->assertTrue($model->validate());
    }

    public function testFields()
    {
        $model = new WechatPayConfig();
        $fields = $model->fields();
        $this->assertEquals(['active', 'merchantId', 'merchantSecret'], $fields);
    }

    public function testAttributes()
    {
        $model = new WechatPayConfig();
        $attributes = $model->attributes();
        $this->assertEquals(['active', 'merchantId', 'merchantSecret'], $attributes);
    }
}
