<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wechat_news_img}}`.
 */
class m190425_123358_create_wechat_news_img_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wechat_news_img}}', [
            'id' => $this->primaryKey(),
            'hash' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'path' => $this->string()->notNull(),
        ]);
        $this->createIndex('hash', '{{%wechat_news_img}}', 'hash');
        $this->createIndex('path', '{{%wechat_news_img}}', 'path');
        $this->createIndex('url', '{{%wechat_news_img}}', 'url');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wechat_news_img}}');
    }
}
