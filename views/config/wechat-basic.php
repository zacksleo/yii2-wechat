<?php
/* @var $this yii\web\View */
use yii\bootstrap\ActiveForm;

$this->title = '微信配置';
?>
<?php $form = ActiveForm::begin([
    'id' => 'wechat-basic-form',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
        'horizontalCssClasses' => [
            'label' => 'col-xs-12 col-sm-3 col-md-2',
            'offset' => '',
            'wrapper' => 'col-sm-9 col-xs-12',
            'error' => '',
            'hint' => '',
        ],
    ],
]); ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            开发者ID
        </div>
        <div class="panel-body">
            <div>
                <?= $form->field($model, 'appId')->hint('公众号身份标识')->label('AppID<br>(应用ID)'); ?>
                <?= $form->field($model,
                    'appSecret')->hint('公众平台API(参考文档API 接口部分)的权限获取所需密钥Key')->label('AppSecret<br>(应用密钥)'); ?>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            服务器配置
        </div>
        <div class="panel-body">
            <?= $form->field($model, 'token')->hint('必须为英文或数字，长度为3-32字符<br/><a href="https://mp.weixin.qq.com/wiki"
                                                    target = "_blank" > 什么是Token？</a>'); ?>
            <?= $form->field($model,
                'encodingAESKey')->hint('消息加密密钥由43位字符组成，可随机修改，字符范围为A-Z，a-z，0-9。<br/><a href="https://mp.weixin.qq.com/wiki" target="_blank">什么是EncodingAESKey？</a>'); ?>
        </div>
    </div>

    <div class="form-group col-sm-12">
        <input name="do-submit" type="submit" value="提交" class="btn btn-primary col-lg-1">        
    </div>
<?php ActiveForm::end(); ?>