<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 17.02.2019 22:19
 */

namespace frontend\models;
use yii\db\ActiveRecord;

class Competition extends ActiveRecord
{
    public static function tableName()
    {
        return 'competition';
    }
    public function getCategory()
    {
        return $this->hasOne(Category::className,['id'=>'category_id']);
    }


}