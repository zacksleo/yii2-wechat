<?php
use yii\helpers\Html;
use zacksleo\yii2\wechat\assets\LoginAsset;
use zacksleo\yii2\wechat\assets\FontAwesomeAsset;

/* @var \yii\web\View $this */
/* @var string $content */

LoginAsset::register($this);
FontAwesomeAsset::register($this);

?>
<?php $this->beginPage() ?>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="zh_CN">
    <?php $this->beginBody() ?>
    <?= $content; ?>
    <div id="body" class="body page_login">
        <dl class="notices_box">
            <dt><i class="icon_login speaker"></i>系统公告</dt>
            <dd><i>●</i> <a class="notices_title" href="" target="_blank"> 微营销系统技术领先！得到无数商家赞扬！</a> <span
                    class="label_new"></span></dd>
            <dd><i>●</i> <a class="notices_title" href="" target="_blank">微信认证命名规则调整</a> <span class="label_new"></span>
            </dd>
            <dd class="extra"><a href="" target="_blank">查看更多<i class="icon_arrow"></i> </a></dd>
        </dl>
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