# Yii2 后台微信模块
 

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
    'easywechat' => [
        'class' => 'maxwen\easywechat\Wechat',          
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
        'layout' => '@app/themes/mp/views/layouts/wechat',
        'layoutPath' => '@app/themes/mp/views/layouts',
    ],    
    
]
        
```
   
## 安装 

```
composer require zacksleo\yii2-wechat

```

## 数据库迁移

```
yii migrate/up --migrationPath=@zacksleo/yii2/wechat/migrations

```
## 截图
![](http://ww2.sinaimg.cn/large/675eb504gw1faf64i67huj212d0itgnw.jpg)
