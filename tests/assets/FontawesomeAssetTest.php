<?php

namespace tests\assets;

use tests\TestCase;
use zacksleo\yii2\wechat\assets\FontAwesomeAsset;

/**
 * Class FontawesomeAssetTest
 * @package tests\assets
 * @author zacksleo <zacksleo@gmail.com>
 */
class FontawesomeAssetTest extends TestCase
{
    public function testAsset()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        FontAwesomeAsset::register($view);
        $this->assertEquals(1, count($view->assetBundles));
        $this->assertArrayHasKey('zacksleo\\yii2\\wechat\\assets\\FontAwesomeAsset', $view->assetBundles);
        $content = $view->renderFile('@tests/data/views/layout.php');
        $this->assertContains('css/font-awesome.min.css', $content);
    }
}
