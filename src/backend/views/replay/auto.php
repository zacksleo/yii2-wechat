<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>

<ul class="nav nav-tabs">
    <li>
        <a href="<?= Url::to('beadded')?>">被添加自动回复</a>
    </li>
    <li class="active">
        <a>消息自动回复</a>
    </li>
    <li>
        <a href="<?= Url::to('index')?>">关键词自动回复</a>
    </li>
</ul>
<div class="clearfix">
<?php

$form = ActiveForm::begin([
    'id' => 'auto-replay-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-xs-12 col-sm-3 col-md-2',
            'offset' => '',
            'wrapper' => 'col-sm-12 col-xs-12',
            'error' => '',
            'hint' => '',
        ],
    ],
]); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                自动回复
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-sm-12 col-lg-12 col-xs-12">
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary">文字</a>
                            <a href="#" class="btn btn-default">图片</a>
                            <a href="#" class="btn btn-default">语音</a>
                            <a href="#" class="btn btn-default">视频</a>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12 col-xs-12" style="position:relative">
                        <?= $form->field($model, 'content')->hint('用户发送消息时，如果没有匹配到关键词时，使用的默认回复内容')->label()->textarea(['cols'=>"30", 'rows'=>"10"]); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input type="submit" value="提交" class="btn btn-primary col-lg-1">
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>