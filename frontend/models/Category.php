<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 17.02.2019 22:10
 */

namespace frontend\models;
use yii\db\ActiveRecord;
use common\behaviors\DateToTimeBehavior;

class Category extends ActiveRecord
{
    public $start_date_f;
    public static function tableName()
    {
        return 'category';
    }
    public function rules()
    {
        return [
            [['birthday'], 'integer'],
            ['start_date_f', 'date', 'format' => 'php:d.m.Y']
        ];
    }
    public function getCompetition()
    {
        return $this->hasMany(Competition::className(),['category_id'=>'id']);
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
                    ActiveRecord::EVENT_BEFORE_VALIDATE => ['start_date',],
                    ActiveRecord::EVENT_AFTER_FIND => 'start_date',
                ],
                'timeAttribute' => 'start_date'
            ]
        ];
    }
}