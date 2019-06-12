<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "nomination".
 *
 * @property int $id
 * @property int $id_competition Ссылка-id из таблицы competition
 * @property string $name Наименование номинации
 *
 * @property Application[] $applications
 * @property Competition $competition
 */
class Nomination extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nomination';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_competition', 'name'], 'required'],
            [['id_competition'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_competition'], 'exist', 'skipOnError' => true, 'targetClass' => Competition::className(), 'targetAttribute' => ['id_competition' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_competition' => 'Номинация к конкурсу',
            'name' => 'Наименование номинации',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::className(), ['id_nomination' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetition()
    {
        return $this->hasOne(Competition::className(), ['id' => 'id_competition']);
    }
}
