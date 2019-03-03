<?php

use yii\db\Migration;

/**
 * Handles the creation of table `category`.
 */
class m190217_111535_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('category', [
            'id' => $this->primaryKey(),
            'parent_id' => $this->integer()->notNull()->defaultValue(0)->
            comment('Родительская категория-id из таблицы category'),
            'name' => $this->string()->notNull()->comment('Наименование категории'),
            'keyword' => $this->string()->comment('Ключевые слова'),
            'description' => $this->string()->comment('Описание'),
        ]);
        $this->addForeignKey('competition_category_id_fk',
            '{{%competition}}', 'category_id', '{{%category}}',
            'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('competition_category_id_fk','{{%competition}}');
        $this->dropTable('category');
    }
}
