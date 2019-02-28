<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 17.02.2019 22:19
 */

namespace frontend\models;
use yii\db\ActiveRecord;
use common\behaviors\DateToTimeBehavior;

class Competition extends ActiveRecord
{
    public static function tableName()
    {
        return 'competition';
    }
    public function getCategory()
    {
        return $this->hasOne(Category::className(),['id'=>'category_id']);
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'birthday_formatted',
                    ActiveRecord::EVENT_AFTER_FIND => 'start_date',
                ],
                'timeAttribute' => 'start_date'
            ]
        ];
    }
}