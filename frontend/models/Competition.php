<?php

namespace frontend\models;
use common\models\User;
use yii\db\ActiveRecord;
use Yii;
use common\behaviors\DateToTimeBehavior;
use yii\behaviors\TimestampBehavior;
use mohorev\file\UploadBehavior;
use yii\web\UploadedFile;

/**
 * This is the model class for table "competition".
 *
 * @property int $id
 * @property int $user_id Владелец конкурса - id из таблицы user
 * @property int $category_id Категория конкурса - id из таблицы category
 * @property string $name Наименование конкурса
 * @property string $note Аннотация конкурса
 * @property string $conditions_file Файл с условиями конкурса
 * @property string $conditions Условия конкурса
 * @property string $inform_letter Информационное письмо
 * @property int $start_date Дата/время начала конкурса
 * @property int $application_start_date Дата/время начала приема заявок
 * @property int $application_end_date Дата/время окончания приема заявок
 * @property int $end_date Дата/время окончания конкурса
 * @property int $application_for_participant Кол-во заявок от участника
 * @property int $application_for_competition Кол-во заявок конкурс
 * @property int $views_for_competition просмотров конкурса
 * @property int $status Статус конкурса
 * @property int $created_at Дата/время создания конкурса
 * @property int $updated_at Дата/время обновления конкурса
 * @property int $link_info_letter Ссылка на информационное письмо
 *
 * @property Category $category
 * @property User $user
 */
class Competition extends ActiveRecord
{
    //Константы статусов конкурсов
    const STATUS_CREATED = 1;
    const STATUS_PUBLISHED = 5;
    const STATUS_CLOSED = 10;
    const STATUS_ARCHIVED = 15;
    const STATUS_DELETED = 20;

    public $start_date_competition;
    public $application_start_date_competition;
    public $application_end_date_competition;
    public $end_date_competition;
    public $created_at_competition;
    public $updated_at_competition;

    public $conditions_file_upload;
    public $logo_file_upload;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'category_id', 'name', 'note', 'conditions'], 'required'],
            [['user_id', 'category_id', 'start_date', 'application_start_date', 'application_end_date', 'end_date', 'application_for_participant', 'views_for_competition', 'status', 'created_at', 'updated_at', 'link_info_letter'], 'integer'],
            [['name', 'logo_file_upload','note','conditions_file_upload'], 'string', 'max' => 255],
            [['conditions'], 'string','max'=>4000],
            [['conditions_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf', 'maxSize' => 1024*1024,'on' => ['create']],
            [['conditions_file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf', 'maxSize' => 1024*1024,'on' => ['update']],
            [['logo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif', 'maxSize' => 1024*1024,'on' => ['create']],
            [['logo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, gif', 'maxSize' => 1024*1024,'on' => ['update']],
            [['inform_letter'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, docx, pdf', 'maxSize' => 1024*1024,'on' => ['create']],
            [['inform_letter'], 'file', 'skipOnEmpty' => true, 'extensions' => 'doc, docx, pdf', 'maxSize' => 1024*1024,'on' => ['update']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['start_date_competition','application_start_date_competition','application_end_date_competition','end_date_competition' ], 'date', 'format' => 'php:d.m.Y h:i']
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Владелец конкурса',
            'category_id' => 'Категория конкурса',
            'name' => 'Наименование конкурса',
            'logo_file_upload' => 'Файл с логотипом конкурса',
            'logo' => 'Логотип конкурса',
            'note' => 'Аннотация конкурса',
            'conditions_file' => 'Файл с условиями конкурса',
            'conditions_file_upload' => 'Файл с условиями конкурса',
            'conditions' => 'Условия конкурса',
            'inform_letter' => 'Информационное письмо',
            'start_date_competition' => 'Дата начала конкурса',
            'application_start_date_competition' => 'Дата начала приема заявок',
            'application_end_date_competition' => 'Дата окончания приема заявок',
            'end_date_competition' => 'Дата окончания конкурса',
            'application_for_participant' => 'Заявок от участника',
            'views_for_competition' => 'Просмотров конкурса',
            'status' => 'Статус конкурса',
            'created_at' => 'Дата/время создания конкурса',
            'updated_at' => 'Дата/время обновления конкурса',
            'link_info_letter' => 'Ссылка на информационное письмо',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::className(), ['id_competition' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCriterions()
    {
        return $this->hasMany(Criterion::className(), ['id_competition' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExperts()
    {
        return $this->hasMany(Expert::className(), ['id_competition' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNominations()
    {
        return $this->hasMany(Nomination::className(), ['id_competition' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpertises()
    {
        return $this->hasMany(Expertise::className(), ['id_competition' => 'id']);
    }

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
                'format'=>'d.m.Y H:i',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'application_start_date_competition',
                    ActiveRecord::EVENT_AFTER_FIND => 'application_start_date_competition',
                ],
                'timeAttribute' => 'application_start_date',
                'format'=>'d.m.Y H:i',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'application_end_date_competition',
                    ActiveRecord::EVENT_AFTER_FIND => 'application_end_date_competition',
                ],
                'timeAttribute' => 'application_end_date',
                'format'=>'d.m.Y H:i',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'end_date_competition',
                    ActiveRecord::EVENT_AFTER_FIND => 'end_date_competition',
                ],
                'timeAttribute' => 'end_date',
                'format'=>'d.m.Y H:i',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'created_at_competition',
                    ActiveRecord::EVENT_AFTER_FIND => 'created_at_competition',
                ],
                'timeAttribute' => 'created_at',
                'format'=>'d.m.Y H:i',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'updated_at_competition',
                    ActiveRecord::EVENT_AFTER_FIND => 'updated_at_competition',
                ],
                'timeAttribute' => 'updated_at',
                'format'=>'d.m.Y H:i',
            ],

            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'conditions_file',
                'scenarios' => ['create', 'update'],
                'path' => Yii::$app->params['CompetitionFilePath'].'{id}',
                'url' => Yii::$app->params['CompetitionFileURL'].'{id}',
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'logo',
                'scenarios' => ['create', 'update'],
                'path' => Yii::$app->params['CompetitionFilePath'].'{id}',
                'url' => Yii::$app->params['CompetitionFileURL'].'{id}',
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'inform_letter',
                'scenarios' => ['create', 'update'],
                'path' => Yii::$app->params['CompetitionFilePath'].'{id}',
                'url' => Yii::$app->params['CompetitionFileURL'].'{id}',
            ],

        ];
    }

}