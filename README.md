# Yii2 Wechat Module For Backend,  Yii2 后台微信模块
 
## Quick Start 

* Requirement

  Config [yii2-easy-wechat](https://github.com/max-wen/yii2-easy-wechat) First  

   ### 配置模块依赖
  
  > 注意 layout和layoutPath写实际使用的布局文件, 文件内容参考 src/layouts
  
  #### 配置component
  
  ```
  'components' => [
  
       'settings' => [
            'class' => 'pheme\settings\components\Settings',
        ],
        'easywechat' => [
            'class' => 'maxwen\easywechat\Wechat',          
        ],    
  ]

  ```
    
  #### 配置modules
   
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
            'layout' => '@app/themes/mp/views/layouts/wechat',
            'layoutPath' => '@app/themes/mp/views/layouts',
        ],    
    ]
            
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
