<?php

namespace frontend\models;
use common\models\user;
use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property int $id_competition Ссылка-id из таблицы competition
 * @property int $id_user Ссылка-id из таблицы user
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
class Application extends \yii\db\ActiveRecord
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
            [['id_competition', 'id_user', 'name', 'created_at', 'updated_at'], 'required'],
            [['id_competition', 'id_user', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'note', 'file'], 'string', 'max' => 255],
            [['id_competition'], 'exist', 'skipOnError' => true, 'targetClass' => Competition::className(), 'targetAttribute' => ['id_competition' => 'id']],
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
            'id_competition' => 'Ссылка-id из таблицы competition',
            'id_user' => 'Ссылка-id из таблицы user',
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
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
