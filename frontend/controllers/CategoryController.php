<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 04.03.2019 20:50
 */

namespace frontend\controllers;
use frontend\models\Category;
use frontend\models\Competition;
use Yii;
use yii\data\Pagination;

class CategoryController extends AppController
{
    public function actionView($id){
    $id=YII::$app->request->get('id');
//    $competitions=Competition::find()->where(['category_id'=>$id])->all();
    $query=Competition::find()->where(['category_id'=>$id]);
    $pages=new Pagination(['totalCount'=>$query->count(),pageSize=>3,'forcePageParam'=>false,'pageSizeParam'=>false]);
    $competitions=$query->offset($pages->offset)->limit($pages->limit)->all();
    $category=Category::findOne($id);
    $this->setMeta('Contest of idea | ' . $category->name,$category->keyword,$category->description);
    return $this->render('view',compact('competitions','pages','category'));
    }
}