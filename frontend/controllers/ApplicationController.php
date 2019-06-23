<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\Competition;
use frontend\models\Expertise;
use Yii;
use frontend\models\Application;
use frontend\models\ApplicationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\data\ActiveDataProvider;
/**
 * ApplicationController implements the CRUD actions for Application model.
 */
class ApplicationController extends Controller
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
     * Lists all Application models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ApplicationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //Вывод заявок только текущего пользователя
        $dataProvider->query->andWhere(['application.id_user' => Yii::$app->user->identity->getId()]);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionIndexExpert()
    {
//        $searchModel = new ApplicationSearch();
        $query=Application::find()->with('competition')->with('nomination')->
//            select('expert.*')->
        leftJoin('expert','expert.id_competition=application.id_competition')->
        where(['expert.id_user'=>Yii::$app->user->identity->getId()]);
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

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }


    /**
     * Displays a single Application model.
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
     * Creates a new Application model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $id_competition=YII::$app->request->get('id');
//        $user=User::find()->all();
        $competition=Competition::findOne($id_competition);
        $query=Application::find()->with('competition')->with('user')->where(['id_competition'=>$id_competition]);
        $pages=new Pagination(['totalCount'=>$query->count(),'pageSize'=>12,'forcePageParam'=>false,'pageSizeParam'=>false]);
        $applications=$query->offset($pages->offset)->limit($pages->limit)->all();
        $user=User::findOne(Yii::$app->user->identity->getId());
        $count_application=$query->count();//Количество заявок на конкурс
        $model = new Application();
        $model->setScenario('create');
        $model->id_competition=$id_competition;
        $model->id_user=$user->id;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model, 'user'=>$user, 'competition'=>$competition, 'applications'=>$applications,
            'pages'=>$pages, 'count_application'=>$count_application,
        ]);
    }

    /**
     * Updates an existing Application model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $id_competition=$model->id_competition;
//        $user=User::find()->all();
        $competition=Competition::findOne($id_competition);
        $query=Application::find()->with('competition')->with('user')->where(['id_competition'=>$id_competition]);
        $pages=new Pagination(['totalCount'=>$query->count(),'pageSize'=>12,'forcePageParam'=>false,'pageSizeParam'=>false]);
        $applications=$query->offset($pages->offset)->limit($pages->limit)->all();
        $user=User::findOne(Yii::$app->user->identity->getId());
        $model->setScenario('update');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model, 'user'=>$user, 'competition'=>$competition, 'applications'=>$applications,'pages'=>$pages,

        ]);
    }

    /**
     * Deletes an existing Application model.
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
     * Finds the Application model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Application the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Application::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
