<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model zacksleo\yii2\wechat\common\models\WechatNews */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="wechat-news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'content')->textInput() ?>

    <?= $form->field($model, 'thumb')->textInput() ?>

    <?= $form->field($model, 'digest')->textInput() ?>

    <?= $form->field($model, 'url')->textInput() ?>

    <?= $form->field($model, 'media_id')->textInput() ?>

    <?= $form->field($model, 'thumb_media_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'released_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
