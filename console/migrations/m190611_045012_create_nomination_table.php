<?php

use yii\db\Migration;

/**
 * Handles the creation of table `nomination`.
 */
class m190611_045012_create_nomination_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('nomination', [
            'id' => $this->primaryKey(),
            'id_competition'=>$this->integer()->notNull()->comment('Ссылка-id из таблицы competition'),
            'name'=>$this->string()->notNull()->comment('Наименование номинации')
        ]);
        $this->addForeignKey('nomination_competition_id_fk','{{%nomination}}', 'id_competition', '{{%competition}}',
            'id');
//      Добавим в таблицу заявок поле со ссылкой на номинации
        $this->addColumn('{{%application}}', 'id_nomination', $this->integer()->after('id_user')
            ->notNull()->comment('Ссылка-id из таблицы nomination'));
        $this->addForeignKey('application_nomination_id_fk','{{%application}}', 'id_nomination', '{{%nomination}}',
            'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('application_nomination_id_fk','{{%application}}');
        $this->dropColumn('{{%application}}', 'id_nomination');
        $this->dropForeignKey('nomination_competition_id_fk','{{%nomination}}');
        $this->dropTable('nomination');
    }
}
