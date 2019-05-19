<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoryOperation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-operation-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?//= $form->field($model, 'parent_id')->textInput() ?>
    <div class="form-group field-category-parent_id has-success">
    <label class="control-label" for="category-parent_id">-</label>
    <select id="category-parent_id" class="form-control" name="Category[parent_id]">
    <?= \frontend\components\MenuWidget::widget(['tpl'=>'select','model'=>$model])?>
    </select>
    </div>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
