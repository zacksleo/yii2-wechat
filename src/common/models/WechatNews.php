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
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $released_at
 * @property integer $status
 */
class WechatNews extends \yii\db\ActiveRecord
{
    const STATUS_RELEASE_FAILED = -3;
    const STATUS_UPLOAD_FAILED = -2;
    const STATUS_PREPARE_FAILED = -1;
    const STATUS_DRAFT = 0;
    const STATUS_PREPARE_SUCCESS = 1;
    const STATUS_UPLOAD_SUCCESS = 2;
    const STATUS_RELEASE_SUCCESS = 3;

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
            [['title', 'content', 'thumb', 'digest', 'url', 'thumb_media_id'], 'string'],
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
            'title' => '标题',
            'content' => '内容',
            'thumb' => '缩略图',
            'thumb_media_id' => '缩略图 MediaId',
            'digest' => '摘要',
            'url' => '原文地址',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'released_at' => '发布时间',
            'status' => '状态'
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

    public function getCossdomThumb()
    {
        return str_replace('mmbiz.qpic.cn', 'mpt.135editor.com', $this->thumb);
    }

    public static function getStatusList()
    {
        return [
            self::STATUS_RELEASE_FAILED => '发布失败',
            self::STATUS_UPLOAD_FAILED => '上传失败',
            self::STATUS_PREPARE_FAILED => '预处理失败',
            self::STATUS_DRAFT => '正在预处理',
            self::STATUS_PREPARE_SUCCESS => '预处理成功',
            self::STATUS_UPLOAD_SUCCESS => '上传成功',
            self::STATUS_RELEASE_SUCCESS => '发布成功',
        ];
    }

    public function getStatus()
    {
        return self::getStatusList()[$this->status];
    }
}
