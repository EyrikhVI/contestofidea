<?php

namespace backend\models;

use Yii;
use frontend\models\Competition;
use frontend\models\Nomination;
use common\models\User;

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
 * @property Nomination $nomination
 * @property User $user
 */
class ApplicationOperation extends \yii\db\ActiveRecord
{
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
            [['id_competition', 'id_user', 'id_nomination', 'name', 'created_at', 'updated_at'], 'required'],
            [['id_competition', 'id_user', 'id_nomination', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'note', 'file'], 'string', 'max' => 255],
            [['id_competition'], 'exist', 'skipOnError' => true, 'targetClass' => Competition::className(), 'targetAttribute' => ['id_competition' => 'id']],
            [['id_nomination'], 'exist', 'skipOnError' => true, 'targetClass' => Nomination::className(), 'targetAttribute' => ['id_nomination' => 'id']],
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
            'id_user' => 'Пользователь',
            'id_nomination' => 'Номинация',
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
}
