<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Application;
use frontend\models\Nomination;
use mihaildev\ckeditor\CKEditor;
use kartik\range\RangeInput;

/* @var $this yii\web\View */
/* @var $model frontend\models\Expertise */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expertise-form">
<?php $form = ActiveForm::begin();?>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="active"><a href="#application" role="tab" data-toggle="tab">Заявка</a></li>
        <li><a href="#user" role="tab" data-toggle="tab">Пользователь</a></li>
        <li><a href="#competition" role="tab" data-toggle="tab">Конкурс </a></li>
        <li><a href="#rate" role="tab" data-toggle="tab">Оценка </a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active vertical-pad" id="application">

            <?= $form->field($application, 'id_nomination')->dropDownList(ArrayHelper::map(Nomination::find()->where(['id_competition'=>$competition->id])->all(), 'id', 'name')) ?>

            <?= $form->field($application, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($application, 'note')->textInput(['maxlength' => true]) ?>

            <div class="row">
                <div class="col-lg-6">
                    <?php if (!empty($competition->inform_letter)): ?>
                        <i class="fas fa-file-download"></i><?= Html::a(' Документы к заявке',Url::to(Yii::$app->params['CompetitionFileURL'] . $competition->id . '/'. $application->file))?>
                    <?php endif;?>
                </div>
                <div class="col-lg-6">

                </div>
            </div>
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
        <div class="tab-pane vertical-pad" id="competition">

            <br><?= Html::a($competition->name,Url::to(['competition/view', 'id'=>$competition->id]))?><br>

        <?php echo $form->field($competition, 'note')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
                'height'=>100,
            ],
        ]);  ?>

        <?php echo $form->field($competition, 'conditions')->widget(CKEditor::className(),[
            'editorOptions' => [
                'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                'inline' => false, //по умолчанию false
                'height'=>200,
            ],
        ]); ?>
        <div class="row">
            <div class="col-lg-9">
                <i class="fas fa-envelope"></i><?= Html::a(' Информационное письмо',Url::to(Yii::$app->params['CompetitionFileURL'] . $competition->id . '/'. $competition->inform_letter))?>
            </div>
            <div class="col-lg-3">
                <i class="fas fa-file-download"></i><?= Html::a(' Условия конкурса',Url::to(Yii::$app->params['CompetitionFileURL'] . $competition->id . '/'. $competition->conditions_file))?>
            </div>
        </div>
        </div>
        <div class="tab-pane vertical-pad" id="rate">
            <?php foreach ($expertises as $index => $expertise):?>

   <h4><?= $criterion[$index]->name;?></h4>
    <?= $form->field($expertise, "[$index]id_competition")->hiddenInput(['value'=>$competition->id])->label(false) ?>
    <?= $form->field($expertise, "[$index]id_application")->hiddenInput(['value'=>$application->id])->label(false) ?>
    <?= $form->field($expertise, "[$index]id_user")->hiddenInput(['value'=>$user->id])->label(false) ?>
    <?= $form->field($expertise, "[$index]id_nomination")->hiddenInput(['value'=>$application->id_nomination])->label(false) ?>
    <?= $form->field($expertise, "[$index]id_criterion")->hiddenInput(['value'=>$criterion[$index]->id])->label(false) ?>

            <div class="row">
        <div class="col-lg-6">

    <?= $form->field($expertise, "[$index]rate")->widget(RangeInput::classname(), [
        'options' => ['placeholder' => 'Нет оценки'],
        'html5Container' => ['style' => 'width:350px'],
        'html5Options' => ['min' => 1, 'max' => $criterion[$index]->max_rating],
        'addon' => ['append' => ['content' => '<i class="fas fa-star"></i>']]
    ]); ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($expertise, "[$index]note")->label($expertise->note);  ?>
        </div>
    </div>
            <?php endforeach; ?>
            <div class="form-group">
                <?= Html::submitButton('<i class="fas fa-save"></i>'.'  Сохранить', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end();?>
        </div>
    </div>
</div>
