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
            'keyword' => $this->string()->notNull()->comment('关键词'),
            'content' => $this->text()->notNull()->comment('回复内容'),
            'created_at' => $this->integer()->comment('创建时间'),
            'updated_at' => $this->integer()->comment('更新时间'),
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
