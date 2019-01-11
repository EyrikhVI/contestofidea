<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;

$this->title = 'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните поля формы:</p>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#general" role="tab" data-toggle="tab">Пользователь</a></li>
                <li><a href="#photo" role="tab" data-toggle="tab">Фотография</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active vertical-pad" id="general">
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'last_name') ?>

                <?= $form->field($model, 'first_name') ?>

                <?= $form->field($model, 'patronymic') ?>

                </div>
                <div class="tab-pane vertical-pad" id="photo">
                <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],
                    'initialPreview'=>[
                        "/uploads/avatar/no_photo_avaiable.jpg",
                    ],
                    'initialPreviewConfig' => [
                        ['caption' => 'no_photo_avaiable.jpg', 'size' => '0'],
                    ],
                    'overwriteInitial'=>true,
                    'initialPreviewAsData'=>true,
                ]
                 ]);   ?>

                </div> <!-- end of upload photo tab -->
            </div>


            <div class="form-group">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            <p class="form-control-static">Нажимая кнопку «Зарегистрироваться», вы принимаете условия Пользовательского соглашения</p>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
