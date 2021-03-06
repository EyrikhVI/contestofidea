<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\file\FileInput;
use common\models\User;
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

                <?= Yii::$app->user->isGuest?$form->field($model, 'username')->textInput(['autofocus' => true]):'<br>'?>

                <?= Yii::$app->user->isGuest?$form->field($model, 'email'):''?>

                <?= Yii::$app->user->isGuest?$form->field($model, 'password')->passwordInput()->textInput(array('data-toggle' => 'tooltip', 'data-placement' =>'right',
                    'title' => 'Используйте буквы, цифры и спецсимволы для пароля.')):''?>

                <?= Yii::$app->user->isGuest?$form->field($model, 'last_name'):
                    $form->field($model, 'last_name' , ['enableLabel' => false])->textInput(array('placeholder' => $model->getAttributeLabel('last_name')))?>

                <?= Yii::$app->user->isGuest?$form->field($model, 'first_name'):
                    $form->field($model, 'first_name' , ['enableLabel' => false])->textInput(array('placeholder' => $model->getAttributeLabel('first_name')))?>

                <?= Yii::$app->user->isGuest?$form->field($model, 'patronymic'):
                    $form->field($model, 'patronymic' , ['enableLabel' => false])->textInput(array('placeholder' => $model->getAttributeLabel('patronymic')))?>

                <?= Yii::$app->user->isGuest?$form->field($model, 'role')->dropDownList([User::ROLE_PARTICIPANT=>'Участник',
                    User::ROLE_ORGANIZER => 'Организатор', User::ROLE_EXPERT => 'Эксперт']):
                    $form->field($model, 'role', ['enableLabel' => false])->dropDownList([User::ROLE_PARTICIPANT=>'Участник',
                    User::ROLE_ORGANIZER => 'Организатор', User::ROLE_EXPERT => 'Эксперт', User::ROLE_ADMIN => 'Администратор'],
                    ['options' => [User::ROLE_ADMIN => ['disabled' => !Yii::$app->user->getIdentity()->isAdmin()]]])?>


<!--                --><?/*= Html::activeDropDownList($model, 'role', \common\models\User::roles()); */?>

                </div>
                <div class="tab-pane vertical-pad" id="photo">
                <?= $form->field($model, 'image')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
                'pluginOptions'=>['allowedFileExtensions'=>['jpg','gif','png'],
                    'initialPreview'=>[
                    Yii::$app->user->isGuest?Url::to(Yii::$app->params['UploadAvatar'].Yii::$app->params['NoImageAvatar']):Url::to(Yii::$app->params['UploadAvatar'].$model->avatar),
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
                    <?= Yii::$app->user->isGuest?$form->field($model, 'organization_name'):
                        $form->field($model, 'organization_name' , ['enableLabel' => false])->textInput(array('placeholder' => $model->getAttributeLabel('organization_name')))?>

                    <?= Yii::$app->user->isGuest?$form->field($model, 'organization_email'):
                        $form->field($model, 'organization_email' , ['enableLabel' => false])->textInput(array('placeholder' => $model->getAttributeLabel('organization_email')))?>

                    <?= Yii::$app->user->isGuest?$form->field($model, 'organization_phone'):
                        $form->field($model, 'organization_phone' , ['enableLabel' => false])->textInput(array('placeholder' => $model->getAttributeLabel('organization_phone')))?>

                    <?= Yii::$app->user->isGuest?$form->field($model, 'organization_address'):
                        $form->field($model, 'organization_address' , ['enableLabel' => false])->textInput(array('placeholder' => $model->getAttributeLabel('organization_address')))?>

                    <?= Yii::$app->user->isGuest?$form->field($model, 'organization_web'):
                        $form->field($model, 'organization_web' , ['enableLabel' => false])->textInput(array('placeholder' => $model->getAttributeLabel('organization_web')))?>

                    <?= Yii::$app->user->isGuest?$form->field($model, 'organization_position_held'):
                        $form->field($model, 'organization_position_held' , ['enableLabel' => false])->textInput(array('placeholder' => $model->getAttributeLabel('organization_position_held')))?>

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
