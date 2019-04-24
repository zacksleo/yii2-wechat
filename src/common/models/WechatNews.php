<?php

namespace zacksleo\yii2\wechat\common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%wechat_news}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $thumb
 * @property string $digest
 * @property string $url
 * @property string $thumb_media_id
 * @property string $media_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $released_at
 */
class WechatNews extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wechat_news}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            [['title', 'content', 'thumb', 'digest', 'url', 'thumb_media_id', 'media_id'], 'string'],
            [['created_at', 'updated_at', 'released_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'content' => 'Content',
            'thumb' => '缩略图',
            'thumb_media_id' => '缩略图MediaId',
            'media_id' => 'MediaId',
            'digest' => '摘要',
            'url' => '原文地址',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'released_at' => '发布时间',
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
            ]
        ];
    }
}
