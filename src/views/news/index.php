<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wechat News';
$this->params['breadcrumbs'][] = $this->title;
$css = <<<CSS
td>img{width:120px;}
CSS;
$this->registerCss($css);
?>
<div class="wechat-news-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Wechat News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            [
                'attribute' => 'thumb',
                'format' => 'image',
                'value' => function ($model) {
                    return str_replace('/var/www/html/frontend/web', '', $model->thumb);
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