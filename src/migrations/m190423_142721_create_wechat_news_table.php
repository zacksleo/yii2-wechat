<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wechat_news}}`.
 */
class m190423_142721_create_wechat_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wechat_news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'thumb' => $this->string(),
            'digest' => $this->text(),
            'url' => $this->string(),
            'thumb_media_id' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer(),
            'released_at' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%wechat_news}}');
    }
}
