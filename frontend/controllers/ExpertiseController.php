<?php

namespace frontend\controllers;

use frontend\models\Criterion;
use Yii;
use yii\base\Model;
use frontend\models\Expertise;
use frontend\models\ExpertiseSearch;
use frontend\models\Application;
use frontend\models\Competition;
use common\models\User;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;

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
    /**
     * Creates a new Expertise model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $application=Application::findOne($id);
        $user=User::findOne($application->id_user);
        $competition=Competition::findOne($application->id_competition);
        $criterion=Criterion::find()->where(['id_competition'=>$competition->id])->all();
        $criterion_count=Criterion::find()->where(['id_competition'=>$competition->id])->count();
        $count = $criterion_count;
        $expertises = [new Expertise()];
        for($i = 1; $i < $count; $i++) {
            $expertises[] = new Expertise();
        }

        if (Model::loadMultiple($expertises, Yii::$app->request->post())&&Model::validateMultiple($expertises)){
            $i=0;
            foreach ($expertises as $expertise) {
                $expertise->rate=$expertise->rate*$criterion[$i]->rate/100;
                $expertise->save(false);
                $i++;
            }
            return $this->redirect('index');
        }

        return $this->render('create', ['expertises' => $expertises, 'application'=>$application,
            'competition'=>$competition, 'criterion'=>$criterion, 'user'=>$user]);
    }

    public function actionCompetitionExpertise($id){
        $query=Expertise::find()->
        select('id_competition,id_application,id_user,id_nomination,SUM(rate) as total_rate')->
        where(['id_competition'=>$id])->
        groupBy(['id_competition','id_application','id_user'])->
        orderBy(['id_nomination'=>SORT_ASC,'total_rate'=>SORT_DESC]);
        $count = $query->count();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'totalCount' => $count,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => [
                    'id_competition',
                    'created_at',
                ],
            ],
        ]);

// returns an array of data rows
        $models = $dataProvider->getModels();

        return $this->render('expertises', [
            'dataProvider' => $dataProvider,
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
