<?php

use yii\db\Migration;

/**
 * Class m190421_151841_add_type_to_wechat_menu
 */
class m190421_151841_add_type_to_wechat_menu extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%wechat_menu}}', 'type', $this->string()->notNull());
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropColumn('{{%wechat_menu}}', 'type');
    }
}
