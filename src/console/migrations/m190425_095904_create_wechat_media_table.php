<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wechat_media}}`.
 */
class m190425_095904_create_wechat_media_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wechat_media}}', [
            'id' => $this->primaryKey(),
            'hash' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'path' => $this->string()->notNull(),
        ]);
        $this->createIndex('hash', '{{%wechat_media}}', 'hash');
        $this->createIndex('path', '{{%wechat_media}}', 'path');
        $this->createIndex('url', '{{%wechat_media}}', 'url');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wechat_media}}');
    }
}
