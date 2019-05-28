<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 17.02.2019 22:19
 */

namespace frontend\models;
use common\models\User;
use yii\db\ActiveRecord;
use common\behaviors\DateToTimeBehavior;
use yii\behaviors\TimestampBehavior;

class Competition extends ActiveRecord
{
    public $start_date_competition;
    public $application_start_date_competition;
    public $application_end_date_competition;
    public $end_date_competition;
    public $created_at_competition;
    public $updated_at_competition;

    public static function tableName()
    {
        return 'competition';
    }
    public function getCategory()
    {
        return $this->hasOne(Category::className(),['id'=>'category_id']);

    }
    public function getUser()
    {
        return $this->hasOne(User::className(),['id'=>'user_id']);

    }
    /**
     * @inheritdoc
     */
    //Преобразование числового поля в формат даты
    //Заполнение/Обновление полей created_at, updated_at
    public function behaviors()
    {
        return [
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'start_date_competition',
                    ActiveRecord::EVENT_AFTER_FIND => 'start_date_competition',
                ],
                'timeAttribute' => 'start_date',
                'format'=>'d.m.Y H:i:s',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'application_start_date_competition',
                    ActiveRecord::EVENT_AFTER_FIND => 'application_start_date_competition',
                ],
                'timeAttribute' => 'application_start_date',
                'format'=>'d.m.Y H:i:s',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'application_end_date_competition',
                    ActiveRecord::EVENT_AFTER_FIND => 'application_end_date_competition',
                ],
                'timeAttribute' => 'application_end_date',
                'format'=>'d.m.Y H:i:s',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'end_date_competition',
                    ActiveRecord::EVENT_AFTER_FIND => 'end_date_competition',
                ],
                'timeAttribute' => 'end_date',
                'format'=>'d.m.Y H:i:s',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'created_at_competition',
                    ActiveRecord::EVENT_AFTER_FIND => 'created_at_competition',
                ],
                'timeAttribute' => 'created_at',
                'format'=>'d.m.Y H:i:s',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'updated_at_competition',
                    ActiveRecord::EVENT_AFTER_FIND => 'updated_at_competition',
                ],
                'timeAttribute' => 'updated_at',
                'format'=>'d.m.Y H:i:s',
            ],

            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
            ],
        ]

        ];
    }
    public function attributeLabels()
    {
        return [
            'category_id'=>'Категория конкурса',
            'name'=>'Название конкурса',
            'note'=>'Аннотация ',
            'conditions_file'=>'Файл положения',
            'conditions'=>'Положение',
            'inform_letter'=>'Информационное письмо',
            'start_date'=>'Дата начала конкурса',
            'application_start_date'=>'Дата начала приема заявок',
            'application_end_date'=>'Дата окончания приема заявок',
            'end_date'=>'Дата окончания приема заявок',
            'application_for_participant'=>'Заявок от участника',
            'application_for_competition'=>'Заявок на конкурс',
            'views_for_competition'=>'Просмотров',
            'status'=>'Статус конкурса'

        ];
    }
}