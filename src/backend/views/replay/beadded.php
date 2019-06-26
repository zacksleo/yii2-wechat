<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>

<ul class="nav nav-tabs">
    <li class="active">
        <a href="#">被添加自动回复</a>
    </li>
    <li>
        <a href="<?= Url::to('auto')?>">消息自动回复</a>
    </li>
    <li>
        <a href="<?= Url::to('index')?>">关键词自动回复</a>
    </li>
</ul>
<div class="clearfix">
<?php

$form = ActiveForm::begin([
    'id' => 'wechat-basic-form',
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
                    <?= $form->field($model, 'content')->label()->textarea(['cols'=>"30", 'rows'=>"10"]); ?>
                        <div class="help-block">
                            指定用户添加公众帐号好友时，发送的欢迎信息, 你可以在这里输入关键字, 那么用户添加公众号好友时就相当于发送这个内容至系统<br>
                            这个过程是程序模拟的, 比如这里添加关键字: 欢迎关注, 那么用户添加公众号好友时, 系统相当于接受了粉丝用户的消息, 内容为"欢迎关注"
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <input name="submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>