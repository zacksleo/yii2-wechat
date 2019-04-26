<div class="panel panel-default">
    <div class="panel-heading">
        设置支付宝支付开关
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-xs-12 col-sm-3 col-md-2 control-label">支付宝无线支付</label>
            <div class="col-sm-9 col-xs-12">
                <div class="alert alert-warning">
                    您的支付宝账号必须支持手机网页即时到账接口, 才能使用手机支付功能, <a href="https://b.alipay.com/order/productDetail.htm?productId=2013080604609688" target="_blank">申请及详情请查看这里</a>.
                </div>
                <label class="radio-inline">
                    <input type="radio" name="alipay[switch]" ng-model="alipay.switch" value="true" class="ng-valid ng-dirty ng-touched ng-valid-parse">
                    开启
                </label>
                <label class="radio-inline">
                    <input type="radio" name="alipay[switch]" ng-model="alipay.switch" value="false" class="ng-valid ng-dirty ng-touched">
                    关闭
                </label>
                <span class="help-block">是否使用支付宝无线支付</span>
                <input type="hidden" name="alipay[t]">
            </div>
        </div>
        <div ng-show="alipay.switch == 'true'" class="">
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">收款支付宝账号</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="text" name="alipay[account]" class="form-control" value="" autocomplete="off">
                    <span class="help-block">如果开启兑换或交易功能，请填写真实有效的支付宝账号，用于收取用户以现金兑换交易积分的相关款项。如账号无效或安全码有误，将导致用户支付后无法正确对其积分账户自动充值，或进行正常的交易对其积分账户自动充值，或进行正常的交易。 如您没有支付宝帐号，<a href="https://memberprod.alipay.com/account/reg/enterpriseIndex.htm" target="_blank">请点击这里注册</a></span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">合作者身份</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="text" name="alipay[partner]" class="form-control" value="" autocomplete="off">
                    <span class="help-block">支付宝签约用户请在此处填写支付宝分配给您的合作者身份，签约用户的手续费按照您与支付宝官方的签约协议为准。<br>如果您还未签约，<a href="https://memberprod.alipay.com/account/reg/enterpriseIndex.htm" target="_blank">请点击这里签约</a>；如果已签约,<a href="https://b.alipay.com/order/pidKey.htm?pid=2088501719138773&amp;product=fastpay" target="_blank">请点击这里获取PID、Key</a>;如果在签约时出现合同模板冲突，请咨询0571-88158090</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">校验密钥</label>
                <div class="col-sm-9 col-xs-12">
                    <input type="text" name="alipay[secret]" class="form-control" value="" autocomplete="off">
                    <span class="help-block">支付宝签约用户可以在此处填写支付宝分配给您的交易安全校验码，此校验码您可以到支付宝官方的商家服务功能处查看</span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-xs-12 col-sm-3 col-md-2 control-label">模拟测试</label>
                <div class="col-sm-9 col-xs-12 form-control-static">
                    <a href="javascript:;" id="tPost">交易模拟测试</a>
                    <span class="help-block">本测试将模拟提交 0.01 元人民币的订单进行测试，如果提交后成功出现付款界面，说明您站点的支付宝功能可以正常使用</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group col-sm-12">
    <input name="do-submit" type="submit" value="提交" class="btn btn-primary col-lg-1">
    <input type="hidden" name="token" value="f20c4119">
</div>