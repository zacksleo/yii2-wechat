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
        设置微信支付开关
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label"></label>
            <div class="col-sm-9 col-xs-12">
                <div class="alert alert-danger hide">
                    因微信公众平台对部分认证订阅号开放申请微信支付的能力,系统在设置支付公众号时,认证的订阅号会出现在下拉选择框,请您根据自己的公众号类型进行选择。 <a
                        href="https://mp.weixin.qq.com/cgi-bin/announce?action=getannouncement&amp;key=1430372687&amp;version=4&amp;lang=zh_CN"
                        target="_blank">详情请查看这里（登陆公众号后可查看）</a>.
                </div>
                <div class="alert alert-warning">
                    你必须向微信公众平台提交企业信息以及银行账户资料，审核通过并签约后才能使用微信支付功能 <a
                        href="https://mp.weixin.qq.com/paymch/readtemplate?t=mp/business/faq_tmpl" target="_blank">申请及详情请查看这里</a>.
                </div>
                <div class="alert alert-warning hidden">
                    <p>支持微信支付接口，注意你的访问地址一定不要写错了，这里我们用访问地址代替下面说明中出现的链接，申请微信支付的接口说明如下：</p>
                    <br>
                    <h4>JS API网页支付参数</h4>
                    <p>支付授权目录: http://wechat.moguyun.net.cn/payment/wechat/</p>
                    <p>支付请求实例: http://wechat.moguyun.net.cn/payment/wechat/pay.php</p>
                    <p>共享收货地址: 选择"是"</p>
                    <br>
                    <h4>Native原生支付</h4>
                    <p>支付回调URL: http://wechat.moguyun.net.cn/payment/wechat/native.php</p>
                    <p>维权通知URL: http://wechat.moguyun.net.cn/payment/wechat/rights.php</p>
                    <p>警告通知URL: http://wechat.moguyun.net.cn/payment/wechat/warning.php</p>
                </div>
            </div>
        </div>
        <?= $form->field($model, 'active')->inline()->label('微信支付')->radioList([
            '1'=>'开启',
            '0'=>'关闭'
        ]); ?>
        <?= $form->field($model, 'merchantId')->hint('微信支付商户号')->label('微信支付商户号<br/>(MchId)'); ?>
        <?= $form->field($model, 'merchantSecret')->hint('此值需要手动在腾讯商户后台API密钥保持一致')->label('商户支付密钥<br/>(API密钥)'); ?>
    </div>
</div>

<div class="form-group col-sm-12">
    <input name="do-submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
    <input type="hidden" name="token" value="f20c4119">
</div>
<?php ActiveForm::end(); ?>