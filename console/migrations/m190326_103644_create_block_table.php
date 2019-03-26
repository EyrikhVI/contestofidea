<?php

use yii\db\Migration;

/**
 * Handles the creation of table 'block'.
 */
class m190326_103644_create_block_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('block', [
            'id' => $this->primaryKey(),
            'prefix'=> $this->string(140)->notNull()->comment(''),
            'active'=> $this->integer(1)->notNull()->comment(''),
            'configurable'=> $this->integer()->notNull()->comment(''),
            'position'=> $this->integer()->notNull()->comment(''),
            'block_default'=> $this->integer()->notNull()->defaultValue(0)->
            comment(''),
            'version'=> $this->string(140)->notNull()->comment(''),
            'date_upd'=>$this->timestamp()->notNull()->defaultExpression('CURRENT_TIMESTAMP')->
            append('ON UPDATE CURRENT_TIMESTAMP'),
        ],'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createTable('block_lang', [
            'id_block'=> $this->integer()->notNull()->comment(''),
            'id_lang'=> $this->integer()->notNull()->comment(''),
            'name'=> $this->string(140)->notNull()->comment(''),
        ],'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->createIndex('id_block','block_lang',['id_block','id_lang'],true);

        $this->batchInsert('block', ['id', 'prefix', 'active', 'configurable', 'position', 'version', 'block_default', 'date_upd'], [
        [1, 'call2action', 1, 1, 0, '0.1',1, '2016-04-06 09:21:36'],
        [2, 'dailymotion', 1, 1, 0, '0.1',1, '2016-04-06 09:21:36'],
        [3, 'gallery', 1, 1, 0, '0.1',1, '2016-04-06 09:21:36'],
        [4, 'icon', 1, 1, 0, '0.1',1, '2016-04-06 09:21:36'],
        [5, 'image', 1, 1, 0, '0.1',1, '2016-04-06 09:21:36'],
        [6, 'list', 1, 1, 2, '0.1',1, '2016-04-06 09:21:36'],
        [7, 'slider', 1, 1, 0, '0.1',1, '2016-04-06 09:21:36'],
        [8, 'text', 1, 1, 1, '0.1',1, '2016-04-06 09:21:36'],
        [9, 'vimeo', 1, 1, 0, '0.1',1, '2016-04-06 09:21:36'],
        [10, 'youtube', 1, 1, 0, '0.1',1, '2016-04-06 09:21:36'],
        [11, 'contactform', 1, 0, 0, '0.1', 1,'2016-04-06 09:23:05'],
        [12, 'line', 1, 0, 0, '0.1',1, '2016-04-06 09:23:09'],
        [13, 'googlemap', 1, 1, 0, '0.1',1, '2016-04-06 09:23:09'],
        [14, 'customhtml', 1, 1, 0, '0.1',1, '2016-04-06 09:23:09'],
        [15, 'contactdata', 1, 1, 0, '0.1',1, '2016-04-06 09:23:09'],
        [16, 'news', 1, 1, 0, '0.1',1, '2016-04-06 09:23:09']
        ]);

        $this->batchInsert('block_lang', ['id_block', 'id_lang', 'name'], [
        [1, 2, 'Call to action'],
        [2, 2, 'Dailymotion'],
        [3, 2, 'Gallery'],
        [4, 2, 'Icon'],
        [5, 2, 'Image'],
        [6, 2, 'List'],
        [7, 2, 'Slider'],
        [8, 2, 'Text'],
        [9, 2, 'Vimeo'],
        [10, 2, 'Youtube'],
        [11, 2, 'Contact form'],
        [12, 2, 'Line'],
        [13, 2, 'Google Map'],
        [14, 2, 'Custom Html'],
        [15,2, 'Contact data'],
        [16,2, 'News']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('id_block', 'block_lang');
        $this->dropTable('block');
        $this->dropTable('block_lang');
    }
}
