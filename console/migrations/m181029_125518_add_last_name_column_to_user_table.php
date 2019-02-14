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
        $this->addColumn('user', 'filename', $this->string());
        $this->addColumn('user', 'avatar', $this->string());
        $this->addColumn('user', 'organization_name', $this->string());
        $this->addColumn('user', 'organization_email', $this->string());
        $this->addColumn('user', 'organization_phone', $this->string());
        $this->addColumn('user', 'organization_address', $this->string());
        $this->addColumn('user', 'organization_web', $this->string());
        $this->addColumn('user', 'organization_position_held', $this->string());


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'last_name');
        $this->dropColumn('user', 'first_name');
        $this->dropColumn('user', 'patronymic');
        $this->DropColumn('user', 'filename');
        $this->DropColumn('user', 'avatar');
        $this->dropColumn('user', 'organization_name');
        $this->dropColumn('user', 'organization_email');
        $this->dropColumn('user', 'organization_phone');
        $this->DropColumn('user', 'organization_address');
        $this->DropColumn('user', 'organization_web');
        $this->DropColumn('user', 'organization_position_held');

    }
}
