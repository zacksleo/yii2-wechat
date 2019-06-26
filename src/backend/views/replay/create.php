<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\wechat\common\models\WechatReplay */

$this->title = '添加回复';
$this->params['breadcrumbs'][] = ['label' => '关键词回复', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wechat-replay-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
