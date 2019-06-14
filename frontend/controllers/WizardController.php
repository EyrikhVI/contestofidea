<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Nomination;
use frontend\models\Competition;
class WizardController extends \yii\web\Controller
{
    public function actionIndex($id, $step = null)
    {
        $request = Yii::$app->request;
/*        $id_competition=YII::$app->request->get('id');
        $competition=Competition::findOne($id_competition);*/
            $Model = new Nomination();

        // Process a model save
        if ($Model->load($request->post())) {
            if ( $Model->save() ) {
                if ($request->post('step') == 'save-final') {
                    // Final wizard step, go to overview
                    $this->redirect( [ '/overview/index',  ] );
                } else {
                    // Refresh widget with the saved model and continue with step 3
                    $this->redirect( [ 'index', 'model' => $Model, 'step' => 3 ] );
                }
            }
        }

        return $this->render('index', [
            'model' => $Model,
            'step' => $step,
        ]);
    }

}
