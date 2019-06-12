<?php

use yii\db\Migration;

/**
 * Class m190610_025633_alter_inform_letter_in_competition_tables
 */
class m190610_025633_alter_inform_letter_in_competition_tables extends Migration
{

    public function up(){
        $this->alterColumn('competition', 'inform_letter', 'string null');
        $this->addCommentOnColumn('competition','inform_letter','Информационное письмо');
        $this->alterColumn('competition', 'link_info_letter', 'tinyint(4) null');
        $this->addCommentOnColumn('competition','link_info_letter','Ссылка на информационное письмо');
        $this->dropColumn('competition','application_for_competition');
    }

    public function down() {
        $this->alterColumn('competition','inform_letter', 'string not null' );
        $this->addCommentOnColumn('competition','inform_letter','Информационное письмо');
        $this->alterColumn('competition', 'link_info_letter', 'tinyint(4) not null');
        $this->addCommentOnColumn('competition','link_info_letter','Ссылка на информационное письмо');
    }
}
