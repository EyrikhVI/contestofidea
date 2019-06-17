<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Competition;
use kartik\range\RangeInput;

/* @var $this yii\web\View */
/* @var $model backend\models\CriterionOperation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="criterion-operation-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'id_competition')->dropDownList(ArrayHelper::map($competition, 'id', 'name')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'rate')->widget(RangeInput::classname(), [
                'options' => ['placeholder' => 'Rate (1 - 100)...'],
                'html5Container' => ['style' => 'width:350px'],
                'html5Options' => ['min' => 1, 'max' => 100],
                'addon' => ['append' => ['content' => '<i class="fas fa-percent"></i>']]
            ]); ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'max_ratig')->widget(RangeInput::classname(), [
                'options' => ['placeholder' => 'Rate (1 - 100)...'],
                'html5Container' => ['style' => 'width:350px'],
                'html5Options' => ['min' => 1, 'max' => 100],
                'addon' => ['append' => ['content' => '<i class="fas fa-star"></i>']]
            ]);  ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i>'.'  Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
