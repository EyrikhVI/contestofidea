<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model frontend\models\Application */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="application-form">
        <div class="row">
        <div class="col-lg-6">
        <p>Для подачи заявки необходимо заполнить приведенную ниже форму. Обратите внимание на коректность заполнения данных.
            Заявка может быть отклонена в случае некорректного заполнения.</p>
    <?php $form = ActiveForm::begin(); ?>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#application" role="tab" data-toggle="tab">Заявка</a></li>
        <li><a href="#user" role="tab" data-toggle="tab">Пользователь</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active vertical-pad" id="application">
<!--    <?/*= $form->field($model, 'id_competition')->textInput() */?>

    --><?/*= $form->field($model, 'id_user')->textInput() */?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'application_file_upload')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'file')->fileInput() ?>
        </div>
    </div>

    <?= $form->field($model, 'status')->textInput() ?>

<!--    <?/*= $form->field($model, 'created_at')->textInput() */?>

    --><?/*= $form->field($model, 'updated_at')->textInput() */?>

        </div>
        <div class="tab-pane vertical-pad" id="user">
            <?=  $form->field($user, 'last_name' , ['enableLabel' => false])->textInput(array('placeholder' => $user->getAttributeLabel('last_name'),'readonly'=> true))?>

            <?=  $form->field($user, 'first_name' , ['enableLabel' => false])->textInput(array('placeholder' => $user->getAttributeLabel('first_name'),'readonly'=> true))?>

            <?=  $form->field($user, 'patronymic' , ['enableLabel' => false])->textInput(array('placeholder' => $user->getAttributeLabel('patronymic'),'readonly'=> true))?>

            <?=  $form->field($user, 'organization_name' , ['enableLabel' => false])->textInput(array('placeholder' => $user->getAttributeLabel('organization_name'),'readonly'=> true))?>

            <?=  $form->field($user, 'organization_email' , ['enableLabel' => false])->textInput(array('placeholder' => $user->getAttributeLabel('organization_email'),'readonly'=> true))?>

            <?=  $form->field($user, 'organization_phone' , ['enableLabel' => false])->textInput(array('placeholder' => $user->getAttributeLabel('organization_phone'),'readonly'=> true))?>

            <?=  $form->field($user, 'organization_address' , ['enableLabel' => false])->textInput(array('placeholder' => $user->getAttributeLabel('organization_address'),'readonly'=> true))?>

            <?=  $form->field($user, 'organization_web' , ['enableLabel' => false])->textInput(array('placeholder' => $user->getAttributeLabel('organization_web'),'readonly'=> true))?>

            <?=  $form->field($user, 'organization_position_held' , ['enableLabel' => false])->textInput(array('placeholder' => $user->getAttributeLabel('organization_position_held'),'readonly'=> true))?>

        </div>

        <div class="form-group">
            <?= Html::submitButton('<i class="fas fa-save"></i>'.' Сохранить', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
    </div>
</div>
