<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;

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
        'patronymic'=>'Отчество'
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
        return $user->save() ? $user : null;
    }
}
