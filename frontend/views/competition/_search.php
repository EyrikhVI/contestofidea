<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\CompetitionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competition-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'category_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'conditions_file') ?>

    <?php // echo $form->field($model, 'conditions') ?>

    <?php // echo $form->field($model, 'inform_letter') ?>

    <?php // echo $form->field($model, 'start_date') ?>

    <?php // echo $form->field($model, 'application_start_date') ?>

    <?php // echo $form->field($model, 'application_end_date') ?>

    <?php // echo $form->field($model, 'end_date') ?>

    <?php // echo $form->field($model, 'application_for_participant') ?>

    <?php // echo $form->field($model, 'application_for_competition') ?>

    <?php // echo $form->field($model, 'views_for_competition') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'link_info_letter') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
