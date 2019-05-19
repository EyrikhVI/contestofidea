<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\user;
/* @var $this yii\web\View */
/* @var $model backend\models\UserOperation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-operation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'role')->dropDownList([User::ROLE_PARTICIPANT=>'Участник',
        User::ROLE_ORGANIZER => 'Организатор', User::ROLE_EXPERT => 'Эксперт', User::ROLE_ADMIN => 'Администратор'],
        ['options' => [User::ROLE_ADMIN => ['disabled' => !Yii::$app->user->getIdentity()->isAdmin()]]])?>

    <?= $form->field($model, 'status')->dropDownList([User::STATUS_ACTIVE => 'Активен',
        User::STATUS_DELETED=>'Удален'],
        ['options' => [User::ROLE_ADMIN => ['disabled' => !Yii::$app->user->getIdentity()->isAdmin()]]])?>

<!--    <?/*= $form->field($model, 'created_at')->textInput() */?>

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization_web')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'organization_position_held')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lang')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
