<?php
use zacksleo\yii2\wechat\assets\IflyingAsset;

/**
 * @see https://github.com/ufologist/wechat-mp-article
 */
/** @var $model \zacksleo\yii2\wechat\common\models\WechatNews */
IflyingAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="referrer" content="never">
    <title>微信公众号图文消息默认样式</title>
    <?php $this->head() ?>
</head>

<body id="activity-detail" class="zh_CN mm_appmsg" ontouchstart="">
    <?php $this->beginBody() ?>
    <div id="js_article" class="rich_media">
        <div id="js_top_ad_area" class="top_banner"></div>
        <div class="rich_media_inner">
            <div id="page-content">
                <div id="img-content" class="rich_media_area_primary">
                    <h2 class="rich_media_title" id="activity-name">
                        <?= $model->title; ?>
                    </h2>
                    <div class="rich_media_meta_list">
                        <em id="post-date" class="rich_media_meta rich_media_meta_text"><?= date('Y-m-d', $model->created_at); ?></em>
                        <em class="rich_media_meta rich_media_meta_text">作者</em>
                        <a class="rich_media_meta rich_media_meta_link rich_media_meta_nickname" href="javascript:void(0);" id="post-user"><?= Yii::$app->name; ?></a>
                    </div>
                    <div class="rich_media_content " id="js_content">
                        <?= str_replace('mmbiz.qpic.cn', 'mpt.135editor.com', $model->content); ?>
                    </div>
                    <div class="rich_media_tool" id="js_toobar3">
                        <a class="media_tool_meta meta_primary" id="js_view_source" href="<?= $model->url; ?>">阅读原文</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>