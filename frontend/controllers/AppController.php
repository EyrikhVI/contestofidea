<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 04.03.2019 20:43
 */
//Общий контролер приложения, от которого будут наследоваться
//другие контролеры
namespace frontend\controllers;

//use yii\web\Controller;
use yii\filters\AccessControl;
use Yii;
use yii\helpers\Url;
use common\models\User;
class AppController extends Controller
{
    public function setMeta($title=null,$keywords=null,$description=null){
    $this->view->title=$title;
    $this->view->registerMetaTag(['name'=>'keywords','content'=>"$keywords"]);
    $this->view->registerMetaTag(['name'=>'description','content'=>"$description"]);

    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                        'denyCallback' => function($rule, $action) {
                            return $this->redirect(Url::toRoute(['/site/login']));
                        }
                    ],
                    [
                        'actions' => [],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            /** @var User $user */
                            $user = Yii::$app->user->getIdentity();
                            return $user->isAdmin() || $user->isModerator();
                        }
                    ],
                ],
            ],
        ];
    }
}