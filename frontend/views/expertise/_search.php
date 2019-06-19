<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ExpertiseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expertise-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_competition') ?>

    <?= $form->field($model, 'id_application') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_nomination') ?>

    <?php // echo $form->field($model, 'id_criterion') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
