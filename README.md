# Yii2 Wechat Module For Backend
 
## Quick Start

* Requirement

  Config [yii2-easy-wechat](https://github.com/max-wen/yii2-easy-wechat) First  

   ### 配置模块依赖
    ```
  'pages' => [
       'class' => 'bupy7\pages\Module',
       'tableName' => '{{%page}}',
       'layout' => '@app/themes/mp/views/layouts/console',
       'layoutPath' => '@app/themes/mp/views/layouts',
       'imperaviLanguage' => 'zh_cn',
       'on beforeAction' => function () {
           Yii::$app->set('user', [
               'class' => 'yii\web\User',
               'identityClass' => 'app\modules\console\models\Admin',
               'enableAutoLogin' => true,
               'loginUrl' => ['site/login'],
               'identityCookie' => ['name' => 'console', 'httpOnly' => true],
               'idParam' => 'console_id', //this is important !
           ]);
           if (Yii::$app->user->isGuest) {
               return Yii::$app->response->redirect('/site/login');
           }
       }
   ],
  'settings' => [
       'class' => 'pheme\settings\Module',
  ],       
  'treemanager' => [
          'class' => 'kartik\tree\Module',
      ],
    'wechat' => [
        'class' => 'zacksleo\yii2\wechat\Module',
        'layout' => '@app/themes/mp/views/layouts/wechat',
        'layoutPath' => '@app/themes/mp/views/layouts',
        'on beforeAction' => function () {
            Yii::$app->set('user', [
                'class' => 'yii\web\User',
                'identityClass' => 'app\modules\console\models\Admin',
                'enableAutoLogin' => true,
                'loginUrl' => ['console/default/login'],
                'identityCookie' => ['name' => 'console', 'httpOnly' => true],
                'idParam' => 'console_id', //this is important !
            ]);
            if (Yii::$app->user->isGuest && Yii::$app->controller->id != 'api') {
                return Yii::$app->response->redirect('/console/default/login');
            }
        }
    ],                
   ```

* Installation

```
composer require zacksleo\yii2-wechat

```
* Migration

```
yii migrate/up --migrationPath=@zacksleo/yii2/wechat/migrations

```
* Screenshot
![](http://ww2.sinaimg.cn/large/675eb504gw1faf64i67huj212d0itgnw.jpg)
