<?php

use yii\db\Migration;

/**
 * Class m190521_060503_add_competition_fields
 */
class m190521_060503_add_competition_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%competition}}', 'conditions', $this->string()->after('note')
            ->notNull()->comment('Условия конкурса'));
        $this->addColumn('{{%competition}}', 'inform_letter', $this->string()->after('conditions')
            ->notNull()->comment('Информационное письмо'));
        $this->addColumn('{{%competition}}', 'link_info_letter', $this->tinyInteger(4)
            ->notNull()->comment('Ссылка на информационное письмо'));
        $this->addColumn('{{%competition}}', 'conditions_file', $this->string()->after('note')
            ->notNull()->comment('Файл с условиями конкурса'));

        $this->addForeignKey('competition_user_id_fk',
            '{{%competition}}', 'user_id', '{{%user}}',
            'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190521_060503_add_competition_fields cannot be reverted.\n";
        $this->dropForeignKey('competition_user_id_fk','{{%competition}}');
        $this->dropColumn('{{%competition}}', 'conditions');
        $this->dropColumn('{{%competition}}', 'inform_letter');
        $this->dropColumn('{{%competition}}', 'link_info_letter');
        $this->dropColumn('{{%competition}}', 'conditions_file');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190521_060503_add_competition_fields cannot be reverted.\n";

        return false;
    }
    */
}
