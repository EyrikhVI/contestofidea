<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 23.05.2019 10:25
 */

namespace frontend\controllers;
use frontend\models\Category;
use frontend\models\Competition;
use frontend\models\Application;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\CompetitionSearch;
use yii\web\Controller;
use yii\web\UploadedFile;

class CompetitionController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    /**
     * Вывод всех конкурсов. Для этого достаточно перевести пользователя в начало сайта
     * @return mixed
     */
    public function actionIndex()
    {
/*        $searchModel = new CompetitionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);*/
        return $this->goHome();
    }

    //Просмотр конкурса
    public function actionView($id){
    $id=Yii::$app->request->get('id');
    $competition=Competition::findOne($id);
    $applications=Application::find()->where(['id_competition'=>$id])->count();
    $competition->updateCounters(['views_for_competition' => 1]);//Увеличим кол-во просмотров

    return $this->render('view',compact('competition','applications'));
    }
    /**
     * Создание конкурса пользователем
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Competition();
        $model->setScenario('create');
        $model->start_date_competition=date("d.m.Y h:i");
        $model->application_start_date_competition=date("d.m.Y h:i");
        $model->application_end_date_competition=date("d.m.Y h:i");
        $model->end_date_competition=date("d.m.Y h:i");
        if ($model->load(Yii::$app->request->post())&&$model->save())   {
                return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Изменение конкурса организатором после создания
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->setScenario('update');
        $model->logo_file_upload=$model->logo;
        $model->conditions_file_upload=$model->conditions_file;
        if ($model->load(Yii::$app->request->post())&&$model->save())   {
                return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Удаление конкурса
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Competition model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Competition the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Competition::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}