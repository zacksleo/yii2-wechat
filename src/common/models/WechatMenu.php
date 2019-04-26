<?php

namespace zacksleo\yii2\wechat\common\models;

use kartik\tree\models\Tree;
use yii;
use zacksleo\yii2\wechat\backend\Module;

/**
 * This is the model class for table "{{%wechat_menu}}".
 *
 * @property integer $id
 * @property integer $root
 * @property integer $lft
 * @property integer $rgt
 * @property integer $lvl
 * @property string $name
 * @property string $icon
 * @property integer $icon_type
 * @property integer $active
 * @property integer $selected
 * @property integer $disabled
 * @property integer $readonly
 * @property integer $visible
 * @property integer $collapsed
 * @property integer $movable_u
 * @property integer $movable_d
 * @property integer $movable_l
 * @property integer $movable_r
 * @property integer $removable
 * @property integer $removable_all
 */
class WechatMenu extends Tree
{
    const TYPE_CLICK = 'click';
    const TYPE_VIEW = 'view';
    const TYPE_SCANCODE_PUSH = 'scancode_push';
    const TYPE_SCANCODE_WAITMSG = 'scancode_waitmsg';
    const TYPE_PIC_SYSPHOTO = 'pic_sysphoto';
    const TYPE_PIC_PHOTO_OR_ALBUM = 'pic_photo_or_album';
    const TYPE_PIC_WEIXIN = 'pic_weixin';
    const TYPE_LOCATION_SELECT = 'location_select';
    const TYPE_MEDIA_ID = 'media_id';
    const TYPE_VIEW_LIMITED = 'view_limited';
    const TYPE_MINI_PROGRAM = 'miniprogram';

    public function init()
    {
        parent::init();
        Yii::$app->getModule('wechat')->init();
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%wechat_menu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lft', 'lvl'], 'default', 'value' => 1],
            ['rgt', 'default', 'value' => 1],
            [
                [
                    'root',
                    'lft',
                    'rgt',
                    'lvl',
                    'icon_type',
                    'active',
                    'selected',
                    'disabled',
                    'readonly',
                    'visible',
                    'collapsed',
                    'movable_u',
                    'movable_d',
                    'movable_l',
                    'movable_r',
                    'removable',
                    'removable_all'
                ],
                'integer'
            ],
            [['lft', 'rgt', 'lvl', 'name'], 'required'],
            [['name'], 'string', 'max' => 60],
            [['icon', 'url'], 'string', 'max' => 255],
            ['type', 'in', 'range' => array_keys(self::getTypeList())]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type' => '类型',
            'id' => Module::t('tree', 'ID'),
            'root' => Module::t('tree', 'Root'),
            'lft' => Module::t('tree', 'Nested set left property'),
            'rgt' => Module::t('tree', 'Nested set right property'),
            'lvl' => Module::t('tree', 'Nested set level / depth'),
            'name' => Module::t('tree', 'Name'),
            'icon' => Module::t('tree', 'Icon'),
            'icon_type' => Module::t('tree', 'Icon Type'),
            'active' => Module::t('tree', 'Active'),
            'selected' => Module::t('tree', 'Selected'),
            'disabled' => Module::t('tree', 'Disabled'),
            'readonly' => Module::t('tree', 'Read Only'),
            'visible' => Module::t('tree', 'Visible'),
            'collapsed' => Module::t('tree', 'Collapsed'),
            'movable_u' => Module::t('tree', 'Up Movable'),
            'movable_d' => Module::t('tree', 'Down Movable'),
            'movable_l' => Module::t('tree', 'Movable To The Left'),
            'movable_r' => Module::t('tree', 'Movable To The Right'),
            'removable' => Module::t('tree', 'Removable'),
            'removable_all' => Module::t('tree', 'Removable Along With Descendants'),
            'url' => Module::t('tree', 'Url'),
        ];
    }

    public static function getTypeList()
    {
        return [
            self::TYPE_CLICK => '点击事件',
            self::TYPE_VIEW => '网页跳转',
            self::TYPE_SCANCODE_PUSH => '扫码推送',
            self::TYPE_SCANCODE_WAITMSG => '扫码上传',
            self::TYPE_PIC_SYSPHOTO => '拍照上传',
            self::TYPE_PIC_PHOTO_OR_ALBUM => '上传照片',
            self::TYPE_PIC_WEIXIN => '微信相册',
            self::TYPE_LOCATION_SELECT => '发送位置',
            self::TYPE_MEDIA_ID => '发送素材',
            self::TYPE_VIEW_LIMITED => '发送图文',
            self::TYPE_MINI_PROGRAM => '小程序'
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->refresh2Api();
    }

    public function afterDelete()
    {
        parent::afterDelete();
        $this->refresh2Api();
    }

    protected function refresh2Api()
    {
        $buttons = [];
        $roots = WechatMenu::find()->roots()->all();
        foreach ($roots as $vo) {
            $children = $vo->children()->all();
            $sub_button = [];
            foreach ($children as $vo2) {
                $sub_button[] = $this->parseConfig($vo2);
            }
            if (empty($sub_button)) {
                $buttons[] = $this->parseConfig($vo);
            } else {
                $buttons[] = [
                    'name' => $vo->name,
                    'sub_button' => $sub_button
                ];
            }
        }
        $app = Yii::$app->wechat->app;
        $app->menu->create($buttons);
    }

    private function parseConfig($model)
    {
        switch ($model->type) {
            case self::TYPE_CLICK:
            case self::TYPE_SCANCODE_WAITMSG:
            case self::TYPE_SCANCODE_PUSH:
            case self::TYPE_PIC_SYSPHOTO:
            case self::TYPE_PIC_PHOTO_OR_ALBUM:
            case self::TYPE_PIC_WEIXIN:
            case self::TYPE_LOCATION_SELECT:
                return [
                    'type' => $model->type,
                    'name' => $model->name,
                    'key' => $model->url
                ];
                break;
            case self::TYPE_VIEW:
                return [
                    'type' => $model->type,
                    'name' => $model->name,
                    'url' => $model->url
                ];
                break;
            case self::TYPE_MINI_PROGRAM:
                $conf = json_decode($model->url, true);
                return [
                    'type' => $model->type,
                    'name' => $model->name,
                    'url' => $conf['url'],
                    'appid' => $conf['appid'],
                    'pagepath' => $conf['pagepath']
                ];
                break;
        }
    }
}
