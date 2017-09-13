<?php

namespace tests\assets;

use tests\TestCase;
use zacksleo\yii2\wechat\assets\LoginAsset;

class LoginAssetTest extends TestCase
{
    public function testAsset()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        LoginAsset::register($view);
        $this->assertEquals(3, count($view->assetBundles));
        $this->assertArrayHasKey('zacksleo\\yii2\\wechat\\assets\\LoginAsset', $view->assetBundles);
        $this->assertArrayHasKey('yii\\web\\YiiAssett', $view->assetBundles);
        $content = $view->renderFile('@tests/data/views/layout.php');
        $this->assertContains('css/processor_bar218878.css', $content);
        $this->assertContains('css/page_login218878.css', $content);
        $this->assertContains('css/fixed.css', $content);
    }
}
