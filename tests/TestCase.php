<?php

namespace tests;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\web\AssetManager;
use yii\web\View;

/**
 * This is the base class for all yii framework unit tests.
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->mockWebApplication();

        $this->setupTestDbData();

        $this->createRuntimeFolder();
    }

    protected function tearDown()
    {
        $this->destroyApplication();
    }

    protected function mockWebApplication($config = [], $appClass = '\yii\web\Application')
    {
        return new $appClass(ArrayHelper::merge([
            'id' => 'testapp',
            'basePath' => __DIR__,
            'vendorPath' => $this->getVendorPath(),
            'aliases' => [
                '@bower' => '@vendor/bower-asset',
                '@npm' => '@vendor/npm-asset',
            ],
            'components' => [
                'db' => [
                    'class' => 'yii\db\Connection',
                    'dsn' => 'sqlite::memory:'
                ],
                'request' => [
                    'hostInfo' => 'http://domain.com',
                    'cookieValidationKey' => 'wefJDF8sfdsfSDefwqdxj9oq',
                    'scriptFile' => __DIR__ . '/index.php',
                    'scriptUrl' => '/index.php',
                ],
                'assetManager' => [
                    'basePath' => '@tests/assets',
                    'baseUrl' => '/',
                ],
                'user' => [
                    'identityClass' => 'tests\data\models\User',
                ],
                'i18n' => [
                    'translations' => [
                        'zacksleo/yii2/feedback/*' => [
                            'class' => 'yii\i18n\PhpMessageSource',
                            'basePath' => '@zacksleo/yii2/wechat/messages',
                            'sourceLanguage' => 'en-US',
                            'fileMap' => [
                                'zacksleo/yii2/wechat/core' => 'core.php',
                                'zacksleo/yii2/wechat/tree' => 'tree.php',
                            ],
                        ]
                    ],
                ],
                'easywechat' => [
                    'class' => 'maxwen\easywechat\Wechat',
                ]
            ],
            'modules' => [
                'treemanager' => [
                    'class' => '\kartik\tree\Module',
                ],
                'wechat' => [
                    'class' => 'zacksleo\yii2\wechat\backend\Module',
                    'controllerNamespace' => 'tests\data\controllers'
                ]
            ],
            'params' => [
                'WECHAT' => [

                ]
            ],
        ],
            $config));
    }

    /**
     * @return string vendor path
     */
    protected function getVendorPath()
    {
        return dirname(__DIR__) . '/vendor';
    }

    /**
     * Destroys application in Yii::$app by setting it to null.
     */
    protected function destroyApplication()
    {
        Yii::$app = null;
    }

    /**
     * Setup tables for test ActiveRecord
     */
    protected function setupTestDbData()
    {
        $db = Yii::$app->getDb();
        $db->createCommand()->createTable('wechat_menu', [
            'id' => 'pk',
            'root' => 'integer',
            'lft' => 'integer not null',
            'rgt' => 'integer not null',
            'lvl' => 'smallint not null',
            'name' => 'string(60) not null',
            'icon' => 'string(255)',
            'icon_type' => 'smallint not null default 1',
            'active' => 'boolean not null default true',
            'selected' => 'boolean not null default false',
            'disabled' => 'boolean not null default false',
            'readonly' => 'boolean not null default false',
            'visible' => 'boolean not null default true',
            'collapsed' => 'boolean not null default false',
            'movable_u' => 'boolean not null default true',
            'movable_d' => 'boolean not null default true',
            'movable_l' => 'boolean not null default true',
            'movable_r' => 'boolean not null default true',
            'removable' => 'boolean not null default true',
            'removable_all' => 'boolean not null default false',
            'url' => 'string',
        ])->execute();
    }

    /**
     * Create runtime folder
     */
    protected function createRuntimeFolder()
    {
        FileHelper::createDirectory(dirname(__DIR__) . '/tests/runtime');
    }

    /**
     * Creates a view for testing purposes
     *
     * @return View
     */
    protected function getView()
    {
        $view = new View();
        $view->setAssetManager(new AssetManager([
            'basePath' => '@tests/data/assets',
            'baseUrl' => '/',
        ]));
        return $view;
    }
}
