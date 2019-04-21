<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2015 - 2016
 * @package yii2-tree-manager
 * @version 1.0.0
 * @see http://demos.krajee.com/tree-manager
 */

use yii\db\Migration;

/**
 * Migration for creating the database structure for the kartik-v/yii2-tree-manager module.
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class m160416_200116_wechat_menu extends Migration
{
    const TABLE_NAME = '{{%wechat_menu}}';

    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable(self::TABLE_NAME, [
            'id' => $this->bigPrimaryKey(),
            'root' => $this->integer(),
            'lft' => $this->integer()->notNull(),
            'rgt' => $this->integer()->notNull(),
            'lvl' => $this->smallInteger(5)->notNull(),
            'name' => $this->string(60)->notNull(),
            'icon' => $this->string(255),
            'icon_type' => $this->smallInteger(1)->notNull()->defaultValue(1),
            'active' => $this->boolean()->notNull()->defaultValue(1),
            'selected' => $this->boolean()->notNull()->defaultValue(0),
            'disabled' => $this->boolean()->notNull()->defaultValue(0),
            'readonly' => $this->boolean()->notNull()->defaultValue(0),
            'visible' => $this->boolean()->notNull()->defaultValue(1),
            'collapsed' => $this->boolean()->notNull()->defaultValue(0),
            'movable_u' => $this->boolean()->notNull()->defaultValue(1),
            'movable_d' => $this->boolean()->notNull()->defaultValue(1),
            'movable_l' => $this->boolean()->notNull()->defaultValue(1),
            'movable_r' => $this->boolean()->notNull()->defaultValue(1),
            'removable' => $this->boolean()->notNull()->defaultValue(1),
            'removable_all' => $this->boolean()->notNull()->defaultValue(0),
            'url' => $this->string()->defaultValue('#'),
        ], $tableOptions);
        $this->createIndex('tree_NK1', self::TABLE_NAME, 'root');
        $this->createIndex('tree_NK2', self::TABLE_NAME, 'lft');
        $this->createIndex('tree_NK3', self::TABLE_NAME, 'rgt');
        $this->createIndex('tree_NK4', self::TABLE_NAME, 'lvl');
        $this->createIndex('tree_NK5', self::TABLE_NAME, 'active');
    }


    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable(self::TABLE_NAME);
    }
}
