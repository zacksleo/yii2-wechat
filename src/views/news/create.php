<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\wechat\common\models\WechatNews */

$this->title = 'Create Wechat News';
$this->params['breadcrumbs'][] = ['label' => 'Wechat News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="wechat-news-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
