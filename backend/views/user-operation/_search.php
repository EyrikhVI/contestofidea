<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserOperationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-operation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

<!--    <?/*= $form->field($model, 'auth_key') */?>

    <?/*= $form->field($model, 'password_hash') */?>

    --><?/*= $form->field($model, 'password_reset_token') */?>

    <?php  echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'role') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php  echo $form->field($model, 'last_name') ?>

    <?php  echo $form->field($model, 'first_name') ?>

    <?php  echo $form->field($model, 'patronymic') ?>

    <?php // echo $form->field($model, 'filename') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'organization_name') ?>

    <?php // echo $form->field($model, 'organization_email') ?>

    <?php // echo $form->field($model, 'organization_phone') ?>

    <?php // echo $form->field($model, 'organization_address') ?>

    <?php // echo $form->field($model, 'organization_web') ?>

    <?php // echo $form->field($model, 'organization_position_held') ?>

    <?php // echo $form->field($model, 'lang') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>