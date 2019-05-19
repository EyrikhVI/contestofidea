<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id Родительская категория-id из таблицы category
 * @property string $name Наименование категории
 * @property string $keyword Ключевые слова
 * @property string $description Описание
 *
 * @property Competition[] $competitions
 */
class CategoryOperation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'keyword', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'name' => 'Наименование',
            'keyword' => 'Ключевые слова',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetitions()
    {
        return $this->hasMany(Competition::className(), ['category_id' => 'id']);
    }

    public function getCategory()
    {
        return $this->hasone(CategoryOperation::className(), ['id' => 'parent_id']);
    }
}

