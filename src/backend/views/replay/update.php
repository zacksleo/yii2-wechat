<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\wechat\common\models\WechatReplay */

$this->title = '更新回复 ';
$this->params['breadcrumbs'][] = ['label' => '关键词回复', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="wechat-replay-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
