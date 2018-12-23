<?php

use yii\db\Migration;

/**
 * Handles adding last_name to table `user`.
 */
class m181029_125518_add_last_name_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'last_name', $this->string());
        $this->addColumn('user', 'first_name', $this->string());
        $this->addColumn('user', 'patronymic', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'last_name');
        $this->dropColumn('user', 'first_name');
        $this->dropColumn('user', 'patronymic');
    }
}
