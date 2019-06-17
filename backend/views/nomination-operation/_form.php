<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Competition;

/* @var $this yii\web\View */
/* @var $model backend\models\NominationOperation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomination-operation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_competition')->dropDownList(ArrayHelper::map($competition, 'id', 'name')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
