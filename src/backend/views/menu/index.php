<?php

use zacksleo\yii2\wechat\common\models\WechatMenu;

Yii::$app->getModule('treemanager')->treeViewSettings = [
    'nodeView' => '@vendor/zacksleo/yii2-wechat/src/backend/views/menu/_form'
];
Yii::$app->getModule('treemanager')->init();

echo \kartik\tree\TreeView::widget([
    'query' => WechatMenu::find()->addOrderBy('root, lft'),
    'headingOptions' => ['label' => '菜单'],
    'rootOptions' => ['label' => '<span class="text-primary">-</span>'],
    'fontAwesome' => true,
    'isAdmin' => true,
    'displayValue' => 1,
    'softDelete' => false,
    'cacheSettings' => ['enableCache' => true],
]);
