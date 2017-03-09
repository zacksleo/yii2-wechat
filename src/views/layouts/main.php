<?php
use yii\helpers\Html;
use yii\helpers\Url;
use zacksleo\yii2\wechat\assets\Asset;
use zacksleo\yii2\wechat\assets\FontAwesomeAsset;

/* @var \yii\web\View $this */
/* @var string $content */

Asset::register($this);
FontAwesomeAsset::register($this);

?>
<?php $this->beginPage() ?>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="shortcut icon" href="/images/favicon.ico"/>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="zh_CN">
    <?php $this->beginBody() ?>
    <div class="head" id="header">
        <div class="head_box">
            <div class="inner wrp">
                <h1 class="logos"><a href="" title="微信第三方公众平台--后台管理系统"></a></h1>
                <ul class="top_navv" style="color:#222;">
                    <li class="active">
                        <a href="<?= Url::to(['/wechat/default/index']); ?>"><i
                                class="fa fa-cog"></i>&nbsp;公众号设置</a></li>
                    <li><a href="<?= Url::to(['/console/default/index']); ?>"><i
                                class="fa fa-umbrella"></i>&nbsp;网站功能</a>
                    </li>
                </ul>
                <div class="accounts">
                    <div class="account_meta account_info account_meta_primary">
                        <a href="https://mp.weixin.qq.com"
                           class="nickname">公众号</a>
                    <span class="type_wrp">
                    <a href="https://mp.weixin.qq.com" target="_blank"
                       class="type icon_service_label">服务号</a>
                    <a href="./index.php?c=system&amp;a=welcome&amp;" target="_blank"
                       class="type icon_verify_label success">已认证</a>
                    </span>
                        <a href="#">
                            <img src="/images/gw-wx.gif" class="avatar" width="50" height="50"
                            >
                        </a>
                    </div>
                    <div class="account_meta account_logout account_meta_primary">
                        <a id="logout" href="<?= Url::to(['default/logout']); ?>">退出</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="body" class="body page_index">
        <div id="js_container_box" class="container_box cell_layout side_l">
            <?= $content; ?>
        </div>
    </div>

    <div class="foot" id="footer">
        <ul class="links ft">
            <li class="links_item no_extra">
                <a href="http://www.moguyun.ltd/about" target="_blank">关于蘑菇云</a>
            </li>
            <li class="links_item">
                <a href="http://www.moguyun.ltd/showcase.html" target="_blank">案例</a>
            </li>
            <li class="links_item">
                <a href="http://www.moguyun.ltd/showcase.html" target="_blank">模板</a>
            </li>
            <li class="links_item">
                <a href="http://www.moguyun.ltd/post/news.html" target="_blank">动态</a>
            </li>
            <li class="links_item">
                <p class="copyright">Copyright © 2012-2016 蘑菇云. All Rights Reserved.</p>
            </li>
        </ul>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>