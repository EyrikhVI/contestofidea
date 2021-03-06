<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Competition;
use kartik\range\RangeInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Criterion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="criterion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model_criterion, 'id_competition')->dropDownList(ArrayHelper::map(Competition::findAll($id_competition), 'id', 'name')) ?>

    <?= $form->field($model_criterion, 'name')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-lg-6">
    <?= $form->field($model_criterion, 'rate')->widget(RangeInput::classname(), [
        'options' => ['placeholder' => 'Rate (1 - 100)...'],
        'html5Container' => ['style' => 'width:350px'],
        'html5Options' => ['min' => 1, 'max' => 100],
        'addon' => ['append' => ['content' => '<i class="fas fa-percent"></i>']]
    ]); ?>
        </div>
        <div class="col-lg-6">
    <?= $form->field($model_criterion, 'max_rating')->widget(RangeInput::classname(), [
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
