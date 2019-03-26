<?php

use yii\db\Migration;

/**
 * Handles the creation of table `configuration`.
 */
class m190326_002912_create_configuration_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('configuration', [
            'id_configuration' => $this->primaryKey(),
            'name'=> $this->string(254)->notNull()->comment(''),
            'value'=>$this->getDb()->getSchema()->createColumnSchemaBuilder('text')->notNull()->
            comment(''),
        ],'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->batchInsert('configuration', ['id_configuration', 'name', 'value'], [
            [1, '_DEFAULT_THEME_', 'starter'],
            [2, '_AUTOSAVE_', '1'],
            [3, '_WEB_NAME_', 'Menapro'],
            [4, '_FACEBOOK_', ''],
            [5, '_TWITTER_', ''],
            [6, '_INSTAGRAM_', ''],
            [7, '_PINTEREST_', ''],
            [8, '_YOUTUBE_', ''],
            [9, '_EMAIL_', ''],
            [10, '_ADDRESS_', ''],
            [11, '_PHONE_', ''],
            [12, '_MOBILE_PHONE_', ''],
            [13, '_OPENING_HOURS_', ''],
            [14, '_DEFAULT_LANG_', ''],
            [15, '_UA_ANALYTICS_', ''],
            [16, '_GMAP_API_KEY_', ''],
            [17, '_COMPRESS_HTML_', '1'],
            [18, '_BOOTSTRAP4_', '0'],
            [19, '_COOKIES_NOTIFICATION_', '1'],
            [20, '_ENABLE_CACHE_', '0']

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('configuration');
    }
}
