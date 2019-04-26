<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use zacksleo\yii2\wechat\assets\MpAdminAsset;
use zacksleo\yii2\wechat\common\models\WechatNews;

MpAdminAsset::register($this);
$head = array_shift($items);
?>

<div>
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">发布</a></li>
        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">预览</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div class="weui-desktop-media__list-col" style="width: 313.55px;">
            <div class="inner">
                <svg xmlns="http://www.w3.org/2000/svg" style="width: 0px; height: 0px; visibility: hidden; position: absolute; z-index: -1;">
                    <symbol id="common-edit" viewBox="0 0 16 17">
                        <path d="M8 1H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V8h-2v7H2V3h6V1z"></path>
                        <path d="M15.185 2.714l.448-.448c.3-.3.31-.81 0-1.118l-.296-.296a.787.787 0 0 0-1.118 0l-.448.448 1.414 1.414zm-.707.707L8.414 9.485 7 8.071l6.064-6.064 1.414 1.414zm-8.15 6.21L7 8.071l1.414 1.414-1.56.673c-.515.222-.747-.016-.526-.527z"></path>
                    </symbol>
                    <symbol id="common-del" viewBox="0 0 16 18">
                        <path d="M1 5c-.556 0-1-.448-1-1 0-.556.448-1 1-1h14c.555 0 1 .448 1 1 0 .556-.448 1-1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V5zm12 0H3v11h10V5zM5.99 0h4.02A1 1 0 0 1 11 1v1H5V1c0-.556.444-1 .99-1zM10 7c.556 0 1 .446 1 .997v6.006c0 .544-.448.997-1 .997-.556 0-1-.446-1-.997V7.997C9 7.453 9.448 7 10 7zM6 7c.556 0 1 .446 1 .997v6.006c0 .544-.448.997-1 .997-.556 0-1-.446-1-.997V7.997C5 7.453 5.448 7 6 7z"></path>
                    </symbol>
                </svg>
                <div class="weui-desktop-card weui-desktop-appmsg">
                    <div class="weui-desktop-card__inner">
                        <div class="weui-desktop-card__bd">

                            <div class="weui-desktop-appmsg__cover-item weui-desktop-appmsg__cover_thumb"><a href="" target="_blank" class="weui-desktop-appmsg__cover__title"><?= $head['title']; ?></a>
                                <i class="weui-desktop-appmsg__cover__thumb" style="background-image: url(<?= WechatNews::formatImg($head['thumb_url']); ?>);"></i>
                                <div class="weui-desktop-mask weui-desktop-mask_status weui-desktop-mask_preview">
                                    <a href="<?= $haed['url']; ?>" target="_blank">预览文章 </a>
                                </div>
                            </div>
                            <?php foreach ($items as $item) : ?>
                                <div class="weui-desktop-appmsg__item sub_card_media">
                                    <i class="weui-desktop-appmsg__thumb" style="background-image: url(<?= WechatNews::formatImg($item['thumb_url']); ?>);"></i>
                                    <a href="" target="_blank" class="weui-desktop-appmsg__title"><?= $item['title']; ?></a>
                                    <div class="weui-desktop-mask weui-desktop-mask_status weui-desktop-mask_preview">
                                        <a href="<?= $item['url']; ?>" target="_blank"> 预览文章 </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div role="tabpanel" class="tab-pane active" id="home">

            <?php $form = ActiveForm::begin([
                'id' => 'publish-form',
                'action' => ['news/publish', 'ids' => $ids, 'mediaId' => $mediaId],
                'options' => ['class' => 'form-horizontal'],
            ]); ?>
            <div class="form-group">
                <div class="col-lg-11">
                    <?= Html::submitButton('立即群发', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="profile">
            <?php $form = ActiveForm::begin([
                'id' => 'preview-form',
                'action' => ['news/preview', 'ids' => $ids, 'mediaId' => $mediaId],
                'options' => ['class' => 'form-horizontal', 'style' => 'width: 313.55px;'],
            ]); ?>
            <div class="form-group">
                <label class="col-md-4">微信用户名</label>
                <div class="col-md-8">
                    <input type="index" class="form-control" name="username" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-2">
                    <?= Html::submitButton('发送预览', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>