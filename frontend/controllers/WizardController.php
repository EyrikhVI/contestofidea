<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Criterion;
use frontend\models\Nomination;
use frontend\models\Competition;

class WizardController extends \yii\web\Controller
{

    public function actionIndex($id,$step)
    {
        $id_competition=YII::$app->request->get('id');
        $competition=Competition::findOne($id_competition);
        $model = new Nomination();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $step=$step++;
            return  $this->redirect( [ 'index', 'model' => $model, 'step' => $step] );
        }

        return $this->render('index',['model' => $model,'competition'=>$competition,'step' => $step]);
    }

}
