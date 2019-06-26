<?php

namespace zacksleo\yii2\wechat\common\models;

use Yii;

/**
 * This is the model class for table "{{%wechat_replay}}".
 *
 * @property int $id
 * @property string $keyword 关键词
 * @property string $content 回复内容
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 */
class WechatReplay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%wechat_replay}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keyword', 'content'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'integer'],
            [['keyword'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keyword' => '关键词',
            'content' => '回复内容',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
