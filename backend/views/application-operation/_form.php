<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Application;
use frontend\models\Nomination;

/* @var $this yii\web\View */
/* @var $model backend\models\ApplicationOperation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-operation-form">

    <?php $form = ActiveForm::begin(); ?>

            <!--    <?/*= $form->field($model, 'id_competition')->textInput() */?>

    --><?/*= $form->field($model, 'id_user')->textInput() */?>
            <?= $form->field($model, 'id_nomination')->dropDownList(ArrayHelper::map(Nomination::find()->where(['id_competition'=>$competition->id])->all(), 'id', 'name')) ?>

            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

            <div class="row">
                <div class="col-lg-6">
                    <!--            --><?/*= $form->field($model, 'application_file_upload')->textInput(['maxlength' => true]) */?>
                </div>
                <div class="col-lg-6">
                    <?= $form->field($model, 'file')->fileInput() ?>
                </div>
            </div>

            <?= $form->field($model, 'status')->dropDownList([Application::STATUS_CREATED=>'Создана',
                Application::STATUS_REJECTED => 'Отклонена', Application::STATUS_ACCEPTED=> 'Принята',
                Application::STATUS_ARCHIVED =>'Заархивирована', Application::STATUS_DELETED=>'Удалена']) ?>
            <!--    <?/*= $form->field($model, 'created_at')->textInput() */?>

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

    <div class="form-group">
        <?= Html::submitButton('<i class="fas fa-save"></i>'.' Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
