<?php

namespace backend\models;

use Yii;
use frontend\models\Competition;
/**
 * This is the model class for table "criterion".
 *
 * @property int $id
 * @property int $id_competition Ссылка-id из таблицы competition
 * @property string $name Наименование критерия
 * @property int $rate Вес критерия (%)
 * @property int $max_ratig Максимальная оценка
 *
 * @property Competition $competition
 */
class CriterionOperation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'criterion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_competition', 'name', 'rate', 'max_ratig'], 'required'],
            [['id_competition', 'rate', 'max_ratig'], 'integer'],
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
            'id_competition' => 'Наименование конкурса',
            'name' => 'Наименование критерия',
            'rate' => 'Вес критерия (%)',
            'max_ratig' => 'Максимальная оценка',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetition()
    {
        return $this->hasOne(Competition::className(), ['id' => 'id_competition']);
    }
}
