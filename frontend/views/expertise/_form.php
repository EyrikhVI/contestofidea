<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Expertise */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expertise-form">
<?php
    $form = ActiveForm::begin();
    echo $application->name;
    foreach ($expertises as $index => $expertise) {
    echo $form->field($expertise, "[$index]rate")->label($expertise->rate);
    echo $form->field($expertise, "[$index]note")->label($expertise->note);
    }
    ActiveForm::end();?>

</div>
