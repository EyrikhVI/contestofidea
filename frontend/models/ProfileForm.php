<?php
/**
 * Eyrikh Valery, eyrikh@mail.ru
 * 22.01.2019 23:08
 */

namespace frontend\models;




use yii\db\ActiveRecord;

class ProfileForm extends ActiveRecord
{
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
            ['organization_position_held', 'trim'],

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
//    public function profile()
//    {
//        if (!$this->validate()) {
//            return null;
//        }
//
//        $user = Yii::$app->user;
//        $user->username = Yii::$app->user->username;
//        $user->email = $this->email;
//        $user->setPassword($this->password);
//        $user->generateAuthKey();
//        $user->last_name=Yii::$app->user->last_name;
//        $user->first_name=$this->first_name;
//        $user->patronymic=$this->patronymic;
//        $user->filename=$this->filename;
//        $user->avatar=$this->avatar;
//        $user->organization_name=$this->organization_name;
//        $user->organization_email=$this->organization_email;
//        $user->organization_phone=$this->organization_phone;
//        $user->organization_address=$this->organization_address;
//        $user->organization_web=$this->organization_web;
//        $user->organization_position_held=$this->organization_position_held;
//
//        return $user->save() ? $user : null;

//    }
public static function tableName()
{
    return 'user';
}
}