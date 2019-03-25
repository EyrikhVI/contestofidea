<?php

use yii\db\Migration;

/**
 * Handles the creation of table `content_pages`.
 */
class m190325_121257_create_content_pages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('content_pages', [
        'id_content'=>$this->integer()->notNull()->comment(''),
        'id_lang'=>$this->integer()->notNull()->comment(''),
        'title'=>$this->string(256)->notNull()->comment(''),
        'meta_title'=>$this->string(140)->notNull()->comment(''),
        'meta_description'=>$this->getDb()->getSchema()->createColumnSchemaBuilder('text')->notNull()->
        comment(''),
        'link_rewrite'=>$this->string(128)->notNull()->comment(''),
        'menu_text'=>$this->string(128)->notNull()->comment(''),
        ],'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('content_pages');
    }
}
