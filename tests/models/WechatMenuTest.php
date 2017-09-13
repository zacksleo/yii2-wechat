<?php

namespace tests\models;

use tests\TestCase;
use zacksleo\yii2\wechat\models\WechatMenu;

/**
 * Class WechatMenuTest
 * @package tests\models
 * @author zacksleo <zacksleo@gmail.com>
 */
class WechatMenuTest extends TestCase
{
    public function testRules()
    {
        $model = new WechatMenu();
        $this->assertTrue($model->isAttributeRequired('lft'));
        $this->assertTrue($model->isAttributeRequired('rgt'));
        $this->assertTrue($model->isAttributeRequired('lvl'));
        $this->assertTrue($model->isAttributeRequired('name'));
        $model->name = 'name';
        //$this->assertTrue($model->makeRoot());
        $this->assertArrayHasKey('active', $model->getAttributes());
    }
}
