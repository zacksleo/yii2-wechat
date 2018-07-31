# Yii2 后台微信模块

[![Latest Stable Version](https://poser.pugx.org/zacksleo/yii2-wechat/version)](https://packagist.org/packages/yii2-wechat/phpsms)
[![Total Downloads](https://poser.pugx.org/zacksleo/yii2-wechat/downloads)](https://packagist.org/packages/yii2-wechat/phpsms)
[![License](https://poser.pugx.org/zacksleo/yii2-wechat/license)](https://packagist.org/packages/yii2-wechat/phpsms)

## 准备工作

### 首先配置 [yii2-easy-wechat](https://github.com/max-wen/yii2-easy-wechat)

### 配置模块依赖

> 注意 layout和layoutPath写实际使用的布局文件, 文件内容参考 src/layouts

#### 配置 component

```
'components' => [

   'settings' => [
        'class' => 'pheme\settings\components\Settings',
    ],
]

```



#### 配置 modules

```
'modules' => [

    'settings' => [
       'class' => 'pheme\settings\Module',
    ],
    'treemanager' => [
          'class' => 'kartik\tree\Module',
      ],
    'wechat' => [
        'class' => 'zacksleo\yii2\wechat\Module',
    ],
]

```

## 安装

```
composer require zacksleo\yii2-wechat --prefer-dist

```

## 数据库迁移

### 配置数据库迁移

对于高级模板（yii2-app-advanced）, 配置 `console/config/main.php` 文件：

```
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                '@console/migrations/',
                '@pheme/settings/migrations',
                '@zacksleo/yii2/wechat/migrations'
            ],
        ],
    ],

```
对于基础模板 （yii2-app-basic）, 配置 `config/console.php` 文件：

```
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationPath' => [
                '@app/migrations/',
                '@pheme/settings/migrations',
                '@zacksleo/yii2/wechat/migrations'
            ],
        ],
    ],

```

### 执行迁移

```
yii migrate/up

```
