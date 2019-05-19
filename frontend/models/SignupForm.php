<?php
namespace frontend\models;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;
use yii\base\Security;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $last_name;
    public $first_name;
    public $patronymic;
    public $role;
    public $filename;
    public $avatar;
    public $image;
//    public $termsofuse;
    public $organization_name;
    public $organization_email;
    public $organization_phone;
    public $organization_address;
    public $organization_web;
    public $organization_position_held;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['last_name', 'trim'],
            ['last_name', 'required'],

            ['first_name', 'trim'],
            ['first_name', 'required'],

            ['patronymic', 'trim'],
            ['patronymic', 'required'],

            ['role', 'safe'],

//            ['termsofuse', 'safe'],
//            ['termsofuse', 'boolean'],
//            ['termsofuse', 'required','requiredValue' => 1, 'message' => 'Необходимо принять условия пользовательского соглашения'],

            [['image'], 'safe'],
            [['image'], 'file', 'extensions'=>'jpg, gif, png'],
            [['image'], 'file', 'maxSize'=>'1000000'],
            [['filename', 'avatar'], 'string', 'max' => 255],
            ['organization_name', 'trim'],
            ['organization_email', 'trim'],
            ['organization_email', 'email'],
            ['organization_phone', 'trim'],
            ['organization_address', 'trim'],
            ['organization_web', 'trim'],
            ['organization_web', 'url', 'defaultScheme' => 'http'],
            ['organization_position_held', 'trim'],

        ];
    }
    const SCENARIO_PROFILE = 'profile';
    const SCENARIO_REGISTER = 'register';

    public function scenarios()
    {
        return [
            self::SCENARIO_PROFILE => ['last_name','first_name','patronymic', 'role',
                'image','filename','avatar','organization_name','organization_email','organization_phone',
                'organization_address','organization_web','organization_position_held'],
            self::SCENARIO_REGISTER => ['username', 'email', 'password','last_name','first_name','patronymic','role',
                'image','filename','avatar','organization_name','organization_email','organization_phone',
                'organization_address','organization_web','organization_position_held' ],
        ];
    }
    public function attributeLabels()
{
    return [
        'username'=>'Логин',
        'email'=>'E-mail',
        'password'=>'Пароль',
        'last_name'=>'Фамилия',
        'first_name'=>'Имя',
        'patronymic'=>'Отчество',
        'role'=>'Роль',
        'image'=>'Фотография',
//        'termsofuse'=>'Пользовательское соглашение'
        'organization_name'=>'Наименование организации',
        'organization_email'=>'E-mail организации',
        'organization_phone'=>'Телефон',
        'organization_address'=>'Юридический адрес',
        'organization_web'=>'Сайт организации',
        'organization_position_held'=>'Должность'

    ];
}

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->last_name=$this->last_name;
        $user->first_name=$this->first_name;
        $user->patronymic=$this->patronymic;
        $user->role=$this->role;
        $user->filename=$this->filename;
        $user->avatar=$this->avatar;
        $user->organization_name=$this->organization_name;
        $user->organization_email=$this->organization_email;
        $user->organization_phone=$this->organization_phone;
        $user->organization_address=$this->organization_address;
        $user->organization_web=$this->organization_web;
        $user->organization_position_held=$this->organization_position_held;

        return $user->save() ? $user : null;
    }
    //Удаление изображения
    //Используется при смене аватара в профиле пользователя
    public function deleteImage($path,$filename) {
        $file =array();
        $file[] = $path.$filename;
//        $file[] = $path.'sqr_'.$filename;
//        $file[] = $path.'sm_'.$filename;
        foreach ($file as $f) {
            // check if file exists on server
            if (!empty($f) && file_exists($f)) {
                // delete file
                unlink($f);
            }
        }
    }
    //Сохранение изображения
    //Используется при регистрации и в профиле пользователя
    public function SaveImage($model,$image) {
        if (!is_null($image)) {
            // Если пользователь загрузил фото
            // сохраним его на диске и имя файла в БД
            $model->filename = $image->name;
            $ext = end(explode(".",$image->name));
            // генерация случайного/уникального имени файла для исключения дублирования
            $model->avatar = Yii::$app->security->generateRandomString() . ".{$ext}";
            //Путь для сохранения файла, установлен как параметр
            $path = Yii::$app->params['UploadAvatar'] . $model->avatar;
            $image->saveAs($path);
        }
        else {
            // если фото не выбрано, в БД сохраним имя файла пустого фото (параметр)
            $model->avatar=Yii::$app->params['NoImageAvatar'];
            $model->filename =Yii::$app->params['NoImageAvatar'];
        }
    }
}
