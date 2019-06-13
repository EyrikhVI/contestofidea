<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Competition;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model frontend\models\Expert */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expert-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_competition')->dropDownList(ArrayHelper::map(Competition::findAll($id_competition), 'id', 'name')) ?>

    <?= $form->field($model, 'id_user')->dropDownList($usermap) ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i>'.'  Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
