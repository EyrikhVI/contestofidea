<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Expertise */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expertise-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_competition')->textInput() ?>

    <?= $form->field($model, 'id_application')->textInput() ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'id_nomination')->textInput() ?>

    <?= $form->field($model, 'id_criterion')->textInput() ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
