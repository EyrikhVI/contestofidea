<?php

use yii\db\Migration;

/**
 * Handles the creation of table `expertise`.
 */
class m190618_103001_create_expertise_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('expertise', [
            'id' => $this->primaryKey(),
            'id_competition'=>$this->integer()->notNull()->comment('Ссылка-id из таблицы competition'),
            'id_application'=>$this->integer()->notNull()->comment('Ссылка-id из таблицы application'),
            'id_user'=>$this->integer()->notNull()->comment('Ссылка-id из таблицы user'),
            'id_nomination'=>$this->integer()->notNull()->comment('Ссылка id из таблицы nomination'),
            'id_criterion'=>$this->integer()->notNull()->comment('Ссылка id из таблицы criterion'),
            'note'=>$this->string()->comment('Примечание'),
            'rate'=>$this->decimal(5,2)->notNull()->comment('Оценка'),
        ]);
        $this->addForeignKey('expertise_user_id_fk','{{%expertise}}', 'id_user', '{{%user}}',
            'id');
        $this->addForeignKey('expertise_competition_id_fk','{{%expertise}}', 'id_competition', '{{%competition}}',
            'id');
        $this->addForeignKey('expertise_application_id_fk','{{%expertise}}', 'id_application', '{{%application}}',
            'id');
        $this->addForeignKey('expertise_criterion_id_fk','{{%expertise}}', 'id_criterion', '{{%criterion}}',
            'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('expertise_user_id_fk','{{%expertise}}');
        $this->dropForeignKey('expertise_competition_id_fk','{{%expertise}}');
        $this->dropForeignKey('expertise_application_id_fk','{{%expertise}}');
        $this->dropForeignKey('expertise_criterion_fk','{{%expertise}}');
        $this->dropTable('expertise');
    }
}
