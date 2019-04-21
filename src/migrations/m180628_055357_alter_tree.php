<?php
use yii\db\Migration;

/**
 * Class m180628_055357_alter_tree
 */
class m180628_055357_alter_tree extends Migration
{
    const TABLE_NAME = '{{%wechat_menu}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(self::TABLE_NAME, 'child_allowed', $this->boolean()->notNull()->defaultValue(1));
    }
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(self::TABLE_NAME, 'child_allowed');
    }
}
