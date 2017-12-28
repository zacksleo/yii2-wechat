<?php

namespace zacksleo\yii2\wechat\models;

use EasyWeChat\Factory;
use kartik\tree\models\Tree;
use yii;
use zacksleo\yii2\wechat\Module;

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
            [['name', 'url'], 'string', 'max' => 60],
            [['icon'], 'string', 'max' => 255],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
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
                $sub_button[] = [
                    'type' => 'view',
                    'name' => $vo2->name,
                    'url' => $vo2->url
                ];
            }
            if (empty($sub_button)) {
                $buttons[] = [
                    'type' => 'view',
                    'name' => $vo->name,
                    'url' => $vo->url
                ];
            } else {
                $buttons[] = [
                    'name' => $vo->name,
                    'sub_button' => $sub_button
                ];
            }
            $app = Factory::officialAccount(Yii::$app->params['wechat.officialAccount']);
            $app->menu->create($buttons);
        }
    }
}
