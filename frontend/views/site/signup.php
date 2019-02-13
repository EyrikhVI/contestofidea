<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
//echo '<pre>'.print_r($usermodel,true).'</pre>';
//$this->title = 'Регистрация';
$this->title = $title;
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
                <li><a href="#organization" role="tab" data-toggle="tab">Организация</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active vertical-pad" id="general">

                <?= Yii::$app->user->isGuest?$form->field($model, 'username')->textInput(['autofocus' => true]):''?>

                <?= Yii::$app->user->isGuest?$form->field($model, 'email'):''?>

                <?= Yii::$app->user->isGuest?$form->field($model, 'password')->passwordInput():''?>

                <?= $form->field($model, 'last_name') ?>

                <?= $form->field($model, 'first_name') ?>

                <?= $form->field($model, 'patronymic') ?>

                </div>
                <div class="tab-pane vertical-pad" id="photo">
                <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],
                    'initialPreview'=>[
                    Yii::$app->user->isGuest?Yii::$app->params['UploadAvatar'].Yii::$app->params['NoImageAvatar']:Yii::$app->params['UploadAvatar'].$model->avatar,
                    ],
                    'initialPreviewConfig' => [
                        ['caption' => Yii::$app->user->isGuest?Yii::$app->params['NoImageAvatar']:$model->filename],
                    ],
                    'overwriteInitial'=>true,
                    'initialPreviewAsData'=>true,
                ]
                 ]);   ?>
<!--                --><?//= $form->field($model, 'image')->widget(FileInput::classname(), Array(
//                    'options' => Array('accept' => 'image/*'),
//                    'pluginOptions'=>Array('allowedFileExtensions'=>Array('jpg','gif','png'),
//                        'initialPreview'=>Array(
//                            Yii::$app->user->isGuest?Yii::$app->params['UploadAvatar'].Yii::$app->params['NoImageAvatar']:Yii::$app->params['UploadAvatar'].$model->avatar,
//                        ),
//                        'initialPreviewConfig' => Array(
//                            Array('caption' => Yii::$app->user->isGuest?Yii::$app->params['NoImageAvatar']:$model->filename, 'size' => '0'),
//                        ),
//                        'overwriteInitial'=>true,
//                        'initialPreviewAsData'=>true,
//                    )
//                ));   ?>

                </div> <!-- end of upload photo tab -->
                <div class="tab-pane vertical-pad" id="organization">
                    <?= $form->field($model, 'organization_name') ?>

                    <?= $form->field($model, 'organization_email') ?>

                    <?= $form->field($model, 'organization_phone') ?>

                    <?= $form->field($model, 'organization_address') ?>

                    <?= $form->field($model, 'organization_web') ?>

                    <?= $form->field($model, 'organization_position_held') ?>

                </div>
            </div>


            <div class="form-group">
            <?= Html::submitButton(Yii::$app->user->isGuest ?'<i class="fas fa-user-plus"></i>'.' Зарегистрироваться': '<i class="fas fa-user-edit"></i>'.' Обновить', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                <?= Yii::$app->user->isGuest?'<p class="form-control-static">Нажимая кнопку «Зарегистрироваться», вы принимаете условия Пользовательского соглашения и
            даете согласие на обработку персональных данных</p>':''?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
