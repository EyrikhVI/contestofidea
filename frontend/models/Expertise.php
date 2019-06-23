<?php

namespace frontend\models;

use Yii;
use common\models\User;


/**
 * This is the model class for table "expertise".
 *
 * @property int $id
 * @property int $id_competition Ссылка-id из таблицы competition
 * @property int $id_application Ссылка-id из таблицы application
 * @property int $id_user Ссылка-id из таблицы user
 * @property int $id_nomination Ссылка id из таблицы nomination
 * @property int $id_criterion Ссылка id из таблицы criterion
 * @property string $note Примечание
 * @property int $rate Оценка
 *
 * @property Application $application
 * @property Competition $competition
 * @property Criterion $criterion
 * @property User $user
 */
class Expertise extends \yii\db\ActiveRecord
{
    public $total_rate; //Итоговая оценка заявки от всех экспертов
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expertise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_competition', 'id_application', 'id_user', 'id_nomination', 'id_criterion', 'rate'], 'required'],
            [['id_competition', 'id_application', 'id_user', 'id_nomination', 'id_criterion', 'rate'], 'integer'],
            [['note'], 'string', 'max' => 255],
            [['id_application'], 'exist', 'skipOnError' => true, 'targetClass' => Application::className(), 'targetAttribute' => ['id_application' => 'id']],
            [['id_competition'], 'exist', 'skipOnError' => true, 'targetClass' => Competition::className(), 'targetAttribute' => ['id_competition' => 'id']],
            [['id_criterion'], 'exist', 'skipOnError' => true, 'targetClass' => Criterion::className(), 'targetAttribute' => ['id_criterion' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_competition' => 'Наименование конкурса',
            'id_application' => 'Наименование заявки',
            'id_user' => 'Пользователь',
            'id_nomination' => 'Номинация',
            'id_criterion' => 'Критерий',
            'note' => 'Примечание',
            'rate' => 'Оценка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplication()
    {
        return $this->hasOne(Application::className(), ['id' => 'id_application']);
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
    public function getCriterion()
    {
        return $this->hasOne(Criterion::className(), ['id' => 'id_criterion']);
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
    public function getNomination()
    {
        return $this->hasOne(Nomination::className(), ['id' => 'id_nomination']);
    }
}
