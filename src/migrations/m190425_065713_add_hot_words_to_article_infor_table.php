<?php

use yii\db\Migration;

/**
 * Class m190425_065713_add_hot_words_to_article_infor_table
 */
class m190425_065713_add_hot_word最北s_to_article_infor_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('Article_infor', 'HotWords', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('Article_infor', 'HotWords');
    }
}
