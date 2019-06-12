<?php

use yii\db\Migration;

/**
 * Handles the creation of table `expert`.
 */
class m190612_143102_create_expert_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('expert', [
            'id' => $this->primaryKey(),
            'id_competition'=>$this->integer()->notNull()->comment('Ссылка-id из таблицы competition'),
            'id_user'=>$this->integer()->notNull()->comment('Ссылка-id из таблицы user'),
        ]);
        $this->addForeignKey('expert_user_id_fk','{{%expert}}', 'id_user', '{{%user}}',
            'id');
        $this->addForeignKey('expert_competition_id_fk','{{%expert}}', 'id_competition', '{{%competition}}',
            'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('expert_user_id_fk','{{%application}}');
        $this->dropForeignKey('expert_competition_id_fk','{{%application}}');
        $this->dropTable('expert');
    }
}
