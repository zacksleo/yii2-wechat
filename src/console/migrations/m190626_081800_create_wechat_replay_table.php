<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wechat_replay}}`.
 */
class m190626_081800_create_wechat_replay_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wechat_replay}}', [
            'id' => $this->primaryKey(),
            'keyword' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wechat_replay}}');
    }
}
