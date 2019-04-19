<?php

use yii\db\Migration;

/**
 * Handles the creation of table `language`.
 */
class m190329_114422_create_language_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('language', [
            'id_lang' => $this->primaryKey(),
            'iso_code'=>$this->string(2)->notNull()->comment(''),
            'country_code'=>$this->string(2)->notNull()->comment(''),
            'name'=>$this->string(50)->notNull()->comment(''),
            'img'=>$this->string(50)->notNull()->comment(''),
            'active'=>$this->integer()->notNull()->comment(''),
        ],'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->batchInsert('language', ['id_lang', 'iso_code', 'country_code', 'name', 'img','active'], [
            [1, 'es', 'ES', 'Castellano', 'es.png',0],
            [2, 'en', 'US', 'English', 'en.png',0],
            [3, 'de', 'DE', 'Deutsch', 'de.png',0],
            [4, 'fr', 'FR', 'Français', 'fr.png',0]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('language');
    }
}
