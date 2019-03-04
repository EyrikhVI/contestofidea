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
//        $comp=new Competition();
//        $comp->name='auto';
//        $comp->note='title';
//        $comp->user_id=1;
//        $comp->category_id=2;
//        $comp->start_date=101;
//        $comp->end_date=101;
//        $comp->application_start_date=101;
//        $comp->application_end_date=101;
//        $comp->created_at=1;
//        $comp->updated_at=1;
//        $comp->save();

        return $this->hasMany(Competition::className(),['category_id'=>'id']);
    }

}