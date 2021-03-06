<?php
namespace frontend\controllers;

use common\models\User;
use frontend\models\Competition;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\base\Security;
use yii\data\Pagination;

/**
 * Site controller
 */
class SiteController extends AppController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     * Выводим популярные конкурсы
     * @return mixed
     */
    public function actionIndex()
    {
        $competitions=Competition::find()->with('user')->orderBy(['views_for_competition'=> SORT_DESC])->limit(6)->all();
        $this->setMeta('Contest of idea');
        $title='Популярные конкурсы';
        return $this->render('index',compact('competitions','user_competition','title' ));
    }

    //Конкурсы пользователя системы
    public function actionViewByUser()
    {
        $id=YII::$app->user->getId();
        $query=Competition::find()->where(['user_id'=>$id]);
        $pages=new Pagination(['totalCount'=>$query->count(),'pageSize'=>6,'forcePageParam'=>false,'pageSizeParam'=>false]);
        $competitions=$query->offset($pages->offset)->limit($pages->limit)->all();
        $user=User::findOne($id);
        $title='Мои конкурсы';
        return $this->render('index',compact('competitions','pages','user','title'));
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *Регистрация пользователя
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        $model->scenario='register';
        if ($model->load(Yii::$app->request->post())) {
            //получаем данные изображения аватара
            $image = UploadedFile::getInstance($model, 'image');
            //сохраняем имя файла в БД и файл изображения загружаем
            $model->SaveImage($model,$image);
            //Регистрируем пользователя
                if ($user = $model->signup()) {
                    if (Yii::$app->getUser()->login($user)) {
                        return $this->goHome();
                    }
                }
        }
        return $this->render('signup', [
            'model' => $model,  'title'=>'Регистрация'
        ]);
    }

    //Профиль пользователя
    //Базируется на одном view с регистрацией пользователя
    //Данные в модели разделены сценариями
    public function actionProfile()
    {
    //Найдем данные текущего зарегистрированного пользователя в БД
    //Таблица User расширена дополнительными параметрами пользователя
    $usermodel=User::findOne(['id'=>Yii::$app->user->identity->getId()]);
    if (!$usermodel) {
        throw new NotFoundHttpException('User is not found');}
    //создадим модель для профиля по сценарию  профиля
    $profilemodel = new SignupForm();
    $profilemodel->scenario='profile';
    //Присвоим начальные значения данными текущего пользователя
    $profilemodel->attributes=$usermodel->attributes;
    if ($profilemodel->load(Yii::$app->request->post())) {
        if ($profilemodel->validate()) {
        //сохраним данные в БД без валидации, т.к. данные проверялись в форме
        $usermodel->last_name=$profilemodel->last_name;
        $usermodel->first_name=$profilemodel->first_name;
        $usermodel->patronymic=$profilemodel->patronymic;
        $usermodel->role=$profilemodel->role;
        //получаем данные изображения аватара
        $image = UploadedFile::getInstance($profilemodel, 'image');
            $profilemodel->SaveImage($usermodel,$image);
        }
        $usermodel->organization_name=$profilemodel->organization_name;
        $usermodel->organization_email=$profilemodel->organization_email;
        $usermodel->organization_phone=$profilemodel->organization_phone;
        $usermodel->organization_address=$profilemodel->organization_address;
        $usermodel->organization_web=$profilemodel->organization_web;
        $usermodel->organization_position_held=$profilemodel->organization_position_held;
        $usermodel->save(false);
        return $this->goHome();
//            $usermodel->setAttributes([
//                'username' => $profilemodel->username,
//                'last_name' => $profilemodel->last_name
//            ]);
        }

    return $this->render('signup', ['model'=>$profilemodel, 'title'=>'Профиль']);
    }


    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

        }
