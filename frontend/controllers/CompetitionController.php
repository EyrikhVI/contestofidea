<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 23.05.2019 10:25
 */

namespace frontend\controllers;
use frontend\models\Category;
use frontend\models\Competition;
use Yii;

class CompetitionController extends AppController
{
public function actionView($id){
    $id=Yii::$app->request->get('id');
    $competition=Competition::findOne($id);
    return $this->render('view',compact('competition'));
}

}