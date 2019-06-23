<?php

use yii\db\Migration;

/**
 * Handles the creation of table `criterion`.
 */
class m190612_093617_create_criterion_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('criterion', [
            'id' => $this->primaryKey(),
            'id_competition'=>$this->integer()->notNull()->comment('Ссылка-id из таблицы competition'),
            'name'=>$this->string()->notNull()->comment('Наименование критерия'),
            'rate'=>$this->smallInteger(3)->notNull()->comment('Вес критерия (%)'),
            'max_rating'=>$this->smallInteger(3)->notNull()->comment('Максимальная оценка')
        ]);
        $this->addForeignKey('criterion_competition_id_fk','{{%criterion}}', 'id_competition', '{{%competition}}',
            'id');

    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('criterion_competition_id_fk','{{%criterion}}');
        $this->dropTable('criterion');
    }
}
