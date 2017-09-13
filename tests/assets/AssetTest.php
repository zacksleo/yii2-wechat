<?php

namespace tests\assets;

use tests\TestCase;
use zacksleo\yii2\wechat\assets\Asset;
use yii\web\AssetBundle;

/**
 * Class AssetTest
 * @package tests\assets
 * @author zacksleo <zacksleo@gmail.com>
 */
class AssetTest extends TestCase
{
    public function testAsset()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        Asset::register($view);
        $this->assertEquals(4, count($view->assetBundles));
        $this->assertArrayHasKey('zacksleo\\yii2\\wechat\\assets\\Asset', $view->assetBundles);
        $this->assertTrue($view->assetBundles['yii\\bootstrap\\BootstrapAsset'] instanceof AssetBundle);
        $this->assertTrue($view->assetBundles['yii\\bootstrap\\BootstrapPluginAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/data/views/layout.php');
        $this->assertContains('css/layout_head218878.css', $content);
        $this->assertContains('css/base22a2de.css', $content);
        $this->assertContains('css/lib218878.css', $content);
        $this->assertContains('css/page_index21bbfa.css', $content);
        $this->assertContains('css/pagination218878.css', $content);
        $this->assertContains('css/processor_bar218878.css', $content);
        $this->assertContains('css/common.css', $content);
        $this->assertContains('css/fixed.css', $content);
    }
}
