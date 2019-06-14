<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\models\Competition;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model frontend\models\Nomination */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomination-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_competition')->dropDownList(ArrayHelper::map(Competition::findAll($id_competition), 'id', 'name')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i>'.' Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
