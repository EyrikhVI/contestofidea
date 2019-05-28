<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Competition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competition-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?/*= $form->field($model, 'id')->textInput() */?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->identity->getId()])->label(false) ?>

<!--    --><?/*= $form->field($model, 'category_id')->textInput() */?>
    <div class="form-group field-competition-category_id">
        <label class="control-label" for="competition-category_id">Категория конкурса</label>
        <select id="competition-category_id" class="form-control" name="Competition[category_id]">
            <?= \frontend\components\MenuWidget::widget(['tpl'=>'select_competition','model'=>$model])?>
        </select>

    </div>




    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'conditions_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'conditions')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'inform_letter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput() ?>

    <?= $form->field($model, 'application_start_date')->textInput() ?>

    <?= $form->field($model, 'application_end_date')->textInput() ?>

    <?= $form->field($model, 'end_date')->textInput() ?>

    <?= $form->field($model, 'application_for_participant')->textInput() ?>

    <?= $form->field($model, 'application_for_competition')->textInput() ?>

    <?= $form->field($model, 'views_for_competition')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'link_info_letter')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
