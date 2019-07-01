<?php

namespace zacksleo\yii2\wechat\backend\models;

use zacksleo\yii2\wechat\common\models\WechatNews;

use yii;
use EasyWeChat\Kernel\Messages\Article;

class NewsPostForm extends WechatNews
{
    public $number;

    public function rules()
    {
        return [
            [['title', 'number', 'id'], 'required'],
            [['title'], 'string'],
            [['number', 'id'], 'integer'],
        ];
    }

    public static function upload($models)
    {
        $models = self::sortModels($models);
        $articles = [];
        foreach ($models as $model) {
            $articles[] = new Article([
                'title' => $model->title,
                'thumb_media_id' => $model->thumb_media_id,
                'author' => Yii::$app->name,
                'source_url' => $model->url,
                'content' => $model->content,
                'digest' => mb_substr($model->digest, 60),
                'show_cover' => 1,
                'show_cover_pic' => 1,
                'need_open_comment' => 1,
                'only_fans_can_comment' => 1
            ]);
        }
        $app = Yii::$app->wechat->app;
        $res = $app->material->uploadArticle($articles);
        return $res;
    }

    public static function sortModels($models)
    {
        for ($i = 0; $i < count($models); $i++) {
            for ($j = $i + 1; $j < count($models); $j++) {
                if ($models[$i]->number > $models[$j]->number) {
                    $temp = $models[$i];
                    $models[$i] = $models[$j];
                    $models[$j] = $temp;
                }
            }
        }
        return $models;
    }
}
