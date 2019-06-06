<?php

use yii\db\Migration;

/**
 * Handles the creation of table `application`.
 */
class m190606_053100_create_application_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('application', [
            'id' => $this->primaryKey(),
            'id_competition'=>$this->integer()->notNull()->comment('Ссылка-id из таблицы competition'),
            'id_user'=>$this->integer()->notNull()->comment('Ссылка-id из таблицы user'),
            'name'=>$this->string()->notNull()->comment('Наименование заявки'),
            'note' => $this->string()->comment('Примечание к заявке'),
        ]);
        $this->addForeignKey('application_user_id_fk','{{%application}}', 'id_user', '{{%user}}',
            'id');
        $this->addForeignKey('application_competition_id_fk','{{%application}}', 'id_competition', '{{%competition}}',
            'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('application_user_id_fk','{{%application}}');
        $this->dropForeignKey('application_competition_id_fk','{{%application}}');
        $this->dropTable('application');
    }
}
