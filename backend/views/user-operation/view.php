<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model backend\models\UserOperation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Справочник пользователей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-operation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            'password_reset_token',
            'email:email',
            [                      // the owner name of the model
            'label' => 'Роль',
            'value' => User::GetRoleName($model->role)
            ],
//            'status',
            [
            'attribute'=>'status',
            'value'=>function($data){$data=array(User::STATUS_ACTIVE=>"Активен",User::STATUS_DELETED=>"Удален");
                return $data[Yii::$app->user->identity->status];
                },
            ],
//            'created_at',
            [
                'attribute' => 'created_at',
                'format' =>  ['date', 'php:d-m-Y H:i:s'],
                'options' => ['width' => '200']
            ],
//            'updated_at',
            [
                'attribute' => 'updated_at',
                'format' =>  ['date', 'php:d-m-Y H:i:s'],
                'options' => ['width' => '200']
            ],
            'last_name',
            'first_name',
            'patronymic',
            'filename',
            'avatar',
            'organization_name',
            'organization_email:email',
            'organization_phone',
            'organization_address',
            'organization_web',
            'organization_position_held',
            'lang',
        ],
    ]) ?>

</div>
