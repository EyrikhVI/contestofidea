<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;
use mihaildev\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model frontend\models\Competition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="competition-form">

    <?php $form = ActiveForm::begin(); ?>

<!--    --><?/*= $form->field($model, 'id')->textInput() */?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->identity->getId()])->label(false) ?>

<!--    --><?/*= $form->field($model, 'category_id')->textInput() */?>
        <div class="form-group field-competition-category_id has-success">
        <label class="control-label" for="competition-category_id">Категория конкурса</label>
        <select id="competition-category_id" class="form-control" name="Competition[category_id]">
            <?= \frontend\components\MenuWidget::widget(['tpl'=>'select_competition','model'=>$model])?>
        </select>

    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'note')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
            'height'=>100,
        ],
    ]); ?>


    <?= $form->field($model, 'conditions_file')->fileInput() ?>

    <?php echo $form->field($model, 'conditions')->widget(CKEditor::className(),[
        'editorOptions' => [
            'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
            'height'=>100,
        ],
    ]); ?>

    <?= $form->field($model, 'inform_letter')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-lg-3">
    <?php $model->start_date_competition=date("d.m.Y h:i")?>
    <?= $form->field($model, 'start_date_competition')->widget(DateTimePicker::classname(), [
            'value'=> date("d.m.Y h:i",(integer) $model->start_date_competition),
            'options' => ['placeholder' => 'Введите дату','style'=>'width:175px'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd.mm.yyyy hh:ii',
            ]
        ]); ?>
        </div>
        <div class="col-lg-3">
    <?php $model->application_start_date_competition=date("d.m.Y h:i")?>
    <?= $form->field($model, 'application_start_date_competition')->widget(DateTimePicker::classname(), [
            'value'=> date("d.m.Y h:i",(integer) $model->application_start_date_competition),
            'options' => ['placeholder' => 'Введите дату','style'=>'width:175px'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd.mm.yyyy hh:ii',
        ]
    ]); ?>
        </div>
        <div class="col-lg-3">
    <?php $model->application_end_date_competition=date("d.m.Y h:i")?>
    <?= $form->field($model, 'application_end_date_competition')->widget(DateTimePicker::classname(), [
            'value'=> date("d.m.Y h:i",(integer) $model->application_end_date_competition),
            'options' => ['placeholder' => 'Введите дату','style'=>'width:175px'],
            'pluginOptions' => [
                'autoclose' => true,
                'format' => 'dd.mm.yyyy hh:ii',
        ]
    ]); ?>
        </div>
        <div class="col-lg-3">
            <?php $model->end_date_competition=date("d.m.Y h:i")?>
    <?= $form->field($model, 'end_date_competition')->widget(DateTimePicker::classname(), [
            'value'=> date("d.m.Y h:i",(integer) $model->end_date_competition),
            'options' => ['placeholder' => 'Введите дату','style'=>'width:175px'],
            'pluginOptions' => [
                'autoclose' => true,
                    'format' => 'dd.mm.yyyy hh:ii',
                ]
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
    <?= $form->field($model, 'application_for_participant')->textInput(['style'=>'width:175px']) ?>
        </div>
        <div class="col-lg-3">
    <?= $form->field($model, 'status')->textInput(['style'=>'width:175px']) ?>
        </div>
    </div>
    <?= $form->field($model, 'link_info_letter')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i>'.' Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
