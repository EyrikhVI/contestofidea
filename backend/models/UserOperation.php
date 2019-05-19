<?php

namespace backend\models;

use Yii;
use yii\db\ActiveRecord;
use common\behaviors\DateToTimeBehavior;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property int $role Роль пользователя
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string $last_name
 * @property string $first_name
 * @property string $patronymic
 * @property string $filename
 * @property string $avatar
 * @property string $organization_name
 * @property string $organization_email
 * @property string $organization_phone
 * @property string $organization_address
 * @property string $organization_web
 * @property string $organization_position_held
 * @property int $lang
 */
class UserOperation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at', 'lang'], 'required'],
            [['role', 'status', 'created_at', 'updated_at', 'lang'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'last_name', 'first_name', 'patronymic', 'filename', 'avatar', 'organization_name', 'organization_email', 'organization_phone', 'organization_address', 'organization_web', 'organization_position_held'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID пользователя',
            'username' => 'Имя пользователя',
            'auth_key' => 'Ключ авторизации',
            'password_hash' => 'Хэш пароля',
            'password_reset_token' => 'Ключ для сброса пароля',
            'email' => 'Email',
            'role' => 'Роль',
            'status' => 'Статус',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'patronymic' => 'Отчество',
            'filename' => 'Имя файла',
            'avatar' => 'Имя загруженного файла',
            'organization_name' => 'Наименование организации',
            'organization_email' => 'E-mail организации',
            'organization_phone' => 'Телефон',
            'organization_address' => 'Юридический адрес',
            'organization_web' => 'Сайт организации',
            'organization_position_held' => 'Должность',
            'lang' => 'Язык',
        ];
    }

}
