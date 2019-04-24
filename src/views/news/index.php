<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '图文素材管理';
$this->params['breadcrumbs'][] = $this->title;
$url = Url::to(['news/post']);
$css = <<<CSS
td>img{width:120px;}
CSS;
$this->registerCss($css);
$js = <<<JS
    $('#post-to-wechat').click(function(){
       var ids = $('#w0').yiiGridView('getSelectedRows');
       if(ids.length == 0) {
           alert('至少需要勾选一篇素材');
           return;
       }
       if(ids.length>8){
            alert('最多可以勾选8篇素材');
           return;
       }
       window.location.href = "{$url}?ids="+ids.join(',');
    });
JS;
$this->registerJs($js);
?>
<div class="wechat-news-index">

    <button id="post-to-wechat" class="btn btn-sm btn-success">发布到微信</button>
    <br />

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\CheckboxColumn', 'name' => 'id'],
            'title',
            [
                'attribute' => 'thumb',
                'format' => 'image',
                'value' => function ($model) {
                    return $model->getCossdomThumb();
                }
            ],
            [
                'attribute' => 'digest',
                'value' => function ($model) {
                    return mb_substr($model->digest, 0, 64) . '...';
                }
            ],
            // 'url:url',
            // 'media_id',
            // 'thumb_media_id',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $model->getStatus();
                }
            ],
            'created_at:date',
            'updated_at:date',
            'released_at:date',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        $icon = Html::tag('span', '', ['class' => "fa fa-eye"]);
                        return Html::a($icon, ['news/view', 'id' => $model->id], [
                            'title' => '预览页面',
                            'target' => '_blank'
                        ]);
                    }
                ]
            ],
        ],
    ]); ?>
</div>