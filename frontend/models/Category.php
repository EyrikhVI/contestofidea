<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 17.02.2019 22:10
 */

namespace frontend\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }
   public function getCompetition()
    {

        return $this->hasMany(Competition::className(),['category_id'=>'id']);
    }

}