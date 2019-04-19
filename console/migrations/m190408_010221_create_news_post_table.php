<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news_post`.
 */
class m190408_010221_create_news_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news_post', [
            'id' => $this->primaryKey(),
            'title'=> $this->string(128)->notNull()->comment(''),
            'friendly_url'=> $this->string(128)->notNull()->comment(''),
            'content'=>$this->getDb()->getSchema()->createColumnSchemaBuilder('text')->notNull()->
            comment(''),
            'author'=> $this->integer()->notNull()->comment(''),
            'published'=> $this->integer()->notNull()->comment(''),
            'date_add'=>$this->dateTime()->notNull()->comment(''),
            'date_upd'=>$this->dateTime()->notNull()->comment(''),
        ]);
        $this->createTable('news_post_tag', [
            'id_post'=> $this->integer()->notNull()->comment(''),
            'id_tag' => $this->integer()->notNull()->comment(''),
        ]);
        $this->addPrimaryKey('id_post_id_tag','news_post_tag',['id_post','id_tag']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news_post');
        $this->dropTable('news_post_tag');
    }
}
