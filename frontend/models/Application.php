<?php

namespace frontend\models;
use common\models\user;
use Yii;
use yii\db\ActiveRecord;
use common\behaviors\DateToTimeBehavior;
use yii\behaviors\TimestampBehavior;
use mohorev\file\UploadBehavior;


/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property int $id_competition Ссылка-id из таблицы competition
 * @property int $id_user Ссылка-id из таблицы user
 * @property int $id_nomination Ссылка-id из таблицы nomination
 * @property string $name Наименование заявки
 * @property string $note Примечание к заявке
 * @property string $file Документы к заявке
 * @property int $status Статус заявки
 * @property int $created_at Дата создания заявки
 * @property int $updated_at Дата обновления заявки
 *
 * @property Competition $competition
 * @property User $user
 */
class Application extends ActiveRecord
{
    //Константы статусов заявок
    const STATUS_CREATED = 1;
    const STATUS_REJECTED = 5;
    const STATUS_ACCEPTED = 10;
    const STATUS_ARCHIVED = 15;
    const STATUS_DELETED = 20;

    public $created_at_application;
    public $updated_at_application;

    public $application_file_upload;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_competition', 'id_user', 'id_nomination', 'name'], 'required'],
            [['id_competition', 'id_user', 'id_nomination', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'note', 'application_file_upload'], 'string', 'max' => 255],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'zip, rar', 'maxSize' => 1024*1024,'on' => ['create']],
            [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'zip, rar', 'maxSize' => 1024*1024,'on' => ['update']],
            [['id_competition'], 'exist', 'skipOnError' => true, 'targetClass' => Competition::className(), 'targetAttribute' => ['id_competition' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
            [['id_nomination'], 'exist', 'skipOnError' => true, 'targetClass' => Nomination::className(), 'targetAttribute' => ['id_nomination' => 'id']],
            ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_competition' => 'Ссылка-id из таблицы competition',
            'id_user' => 'Ссылка-id из таблицы user',
            'id_nomination' => 'Номинация конкурса',
            'name' => 'Наименование заявки',
            'note' => 'Примечание к заявке',
            'file' => 'Документы к заявке',
            'status' => 'Статус заявки',
            'created_at' => 'Дата создания заявки',
            'updated_at' => 'Дата обновления заявки',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetition()
    {
        return $this->hasOne(Competition::className(), ['id' => 'id_competition']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNomination()
    {
        return $this->hasOne(Nomination::className(), ['id' => 'id_nomination']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExpertises()
    {
        return $this->hasMany(Expertise::className(), ['id_application' => 'id']);
    }

    public function behaviors()
    {
        return [

            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'created_at_application',
                    ActiveRecord::EVENT_AFTER_FIND => 'created_at_application',
                ],
                'timeAttribute' => 'created_at',
                'format'=>'d.m.Y H:i',
            ],
            [
                'class' => DateToTimeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_VALIDATE => 'updated_at_application',
                    ActiveRecord::EVENT_AFTER_FIND => 'updated_at_application',
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
                'attribute' => 'file',
                'scenarios' => ['create', 'update'],
                'path' => Yii::$app->params['CompetitionFilePath'].'{id_competition}',
                'url' => Yii::$app->params['CompetitionFileURL'].'{id_competition}',
            ],
        ];
    }
    public static function competition_status()
    {
        return [
            self::STATUS_CREATED => 'Создана',
            self::STATUS_REJECTED => 'Отклонена',
            self::STATUS_ACCEPTED => 'Принята',
            self::STATUS_ARCHIVED => 'Заархивирован',
            self::STATUS_DELETED => 'Удален',
        ];
    }
}
