<?php

use yii\db\Migration;
use yii\base;

/**
 * Handles the creation of table `content`.
 */
class m190325_061240_create_content_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%content}}', [
            'id' => $this->primaryKey(),
            'content'=> $this->getDb()->getSchema()->createColumnSchemaBuilder('mediumtext')->notNull()->
            comment(''),
            'id_author'=>$this->integer()->notNull()->comment(''),
            'id_editor'=>$this->integer()->notNull()->comment(''),
            'id_parent'=>$this->integer()->notNull()->comment(''),
            'position'=>$this->integer()->notNull()->comment(''),
            'in_menu'=>$this->integer()->notNull()->comment(''),
            'date_add'=>$this->dateTime()->notNull()->comment(''),
            'date_upd'=>$this->integer()->notNull()->comment(''),
            'active'=>$this->integer(1)->notNull()->comment(''),
            'in_trash'=>$this->integer()->notNull()->comment(''),
            'theme'=>$this->string(128)->notNull()->comment(''),
        ],'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%content}}');
    }
}
