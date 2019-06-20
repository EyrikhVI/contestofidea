<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Expertise;
use frontend\models\ExpertiseSearch;
use frontend\models\Application;
use frontend\models\Competition;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExpertiseController implements the CRUD actions for Expertise model.
 */
class ExpertiseController extends Controller
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
     * Lists all Expertise models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExpertiseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Expertise model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
    //Заявки для оценки экспертом
    public function actionViewByExpert()
    {

        $id=YII::$app->user->getId();
//        $application=Application::find()->with('competition')->with('expert')->where(['id_competition'=>'10'])->all();
        $applications=Application::find()->with('competition')->with('nomination')->
//            select('expert.*')->
        leftJoin('expert','expert.id_competition=application.id_competition')->
            where(['expert.id_user'=>Yii::$app->user->identity->getId()])->all();
//        debug($applications);
//        $query=Competition::find()->where(['user_id'=>$id]);
//        $pages=new Pagination(['totalCount'=>$query->count(),'pageSize'=>6,'forcePageParam'=>false,'pageSizeParam'=>false]);
//        $competitions=$query->offset($pages->offset)->limit($pages->limit)->all();
        $user=User::findOne($id);
//        $title='Мои конкурсы';
//        return $this->render('index',compact('competitions','pages','user','title'));
//        return $this->render('application',compact('application'));
        return $this->render('application', compact('applications'));

    }
    /**
     * Creates a new Expertise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Expertise();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Expertise model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Expertise model.
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
     * Finds the Expertise model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Expertise the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Expertise::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
