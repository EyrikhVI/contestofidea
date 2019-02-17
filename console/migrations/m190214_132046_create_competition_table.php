<?php

use yii\db\Migration;

/**
 * Handles the creation of table `competition`.
 */
class m190214_132046_create_competition_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%competition}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->comment('Владелец конкурса - id из таблицы user'),
            'category_id' => $this->integer()->notNull()->comment('Категория конкурса - id из таблицы category'),
            'name' => $this->string()->notNull()->comment('Наименование конкурса'),
            'note' => $this->string()->notNull()->comment('Аннотация конкурса'),
            'start_date' => $this->integer()->notNull()->comment('Дата/время начала конкурса'),
            'application_start_date' => $this->integer()->notNull()->comment('Дата/время начала приема заявок'),
            'application_end_date' => $this->integer()->notNull()->comment('Дата/время окончания приема заявок'),
            'end_date' => $this->integer()->notNull()->comment('Дата/время окончания конкурса'),
            'application_for_participant' => $this->smallinteger()->notNull()->defaultValue(1)->
            comment('Кол-во заявок от участника'),
            'application_for_competition' => $this->smallinteger()->notNull()->defaultValue(0)->
            comment('Кол-во заявок конкурс'),
            'views_for_competition' => $this->smallinteger()->notNull()->defaultValue(0)->
            comment('просмотров конкурса'),
            'status' => $this->smallInteger()->notNull()->defaultValue(0)->comment('Статус конкурса'),
            'created_at' => $this->integer()->notNull()->comment('Дата/время создания конкурса'),
            'updated_at' => $this->integer()->notNull()->comment('Дата/время обновления конкурса'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%competition}}');
    }
}
