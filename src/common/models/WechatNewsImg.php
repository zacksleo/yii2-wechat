<?php

namespace zacksleo\yii2\wechat\common\models;

use Yii;

/**
 * This is the model class for table "{{%wechat_news_img}}".
 *
 * @property integer $id
 * @property string $hash
 * @property string $url
 * @property string $path
 */
class WechatNewsImg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wechat_news_img}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hash', 'url', 'path'], 'required'],
            [['hash', 'url', 'path'], 'string'],
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
            'url' => 'Url',
            'path' => 'Path',
        ];
    }

    /**
     * 根据路径查询是否存在相同的图片
     *
     * @param string $path
     * @return WechatNewsImg|null
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
