<?php

use yii\db\Migration;

/**
 * Class m190312_050252_add_users_role_field
 */
class m190312_050252_add_users_role_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $this->addColumn('{{%user}}', 'role', $this->smallInteger()->after('email')->defaultValue(1)
        ->comment('Роль пользователя'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190312_050252_add_users_role_field cannot be reverted.\n";
        $this->dropColumn('{{%user}}', 'role');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190312_050252_add_users_role_field cannot be reverted.\n";

        return false;
    }
    */
}
