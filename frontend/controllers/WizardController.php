<?php

namespace frontend\controllers;
use frontend\models\Criterion;
use frontend\models\Expert;
use frontend\models\Nomination;
use Yii;
use yii\helpers\ArrayHelper;
use common\models\User;
use frontend\models\Competition;
use yii\base\Model;

class WizardController extends \yii\web\Controller
{

    public function actionIndex($id,$step)
    {
        $request = Yii::$app->request;
        $id_competition=YII::$app->request->get('id');
        $competition=Competition::findOne($id_competition);
        $user=User::find()->where(['role'=>User::ROLE_ORGANIZER])->all();
        $usermap = ArrayHelper::map($user,'id',
            function ($user, $defaultValue) {
                return $user->getFullName();
            });
        $model_nomination = new Nomination();
        $model_criterion = new Criterion();
        $model_expert = new Expert();
        if ($model_nomination->load($request->post())&& $model_nomination->save()) {
            $step++;
        }
        if ($model_criterion->load($request->post())&& $model_criterion->save()) {
            $step++;
        }
        if ($model_expert->load($request->post())&& $model_expert->save()) {
            $step++;
        }
        return $this->render('index',['model_nomination' => $model_nomination,'model_criterion'=>$model_criterion,
            'model_expert'=>$model_expert,
            'competition'=>$competition,'usermap'=>$usermap ,'step' => $step]);

    }

}
