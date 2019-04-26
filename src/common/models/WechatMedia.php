<?php

namespace zacksleo\yii2\wechat\common\models;

use Yii;

/**
 * This is the model class for table "{{%wechat_media}}".
 *
 * @property integer $id
 * @property string $hash
 * @property string $media_id
 * @property string $url
 * @property string $path
 */
class WechatMedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wechat_media}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'media_id', 'url', 'path'], 'required'],
            [['hash', 'media_id', 'url', 'path'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hash' => 'Hash',
            'media_id' => 'Media ID',
            'url' => 'Url',
            'path' => 'Path',
        ];
    }

    /**
     * 根据路径查询是否存在相同的图片
     *
     * @param string $path
     * @return WechatMediaImg|null
     */
    public static function findByPath($path)
    {
        if (($model =  self::findOne(['path' => $path])) != null) {
            return $model;
        }
        $hash = md5_file($path);
        if (($model =  self::findOne(['hash' => $hash])) != null) {
            return $model;
        }
        return null;
    }
}
