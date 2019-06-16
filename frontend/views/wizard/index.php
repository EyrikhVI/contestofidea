<?php
// Wizard view example
global $form;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use drsdre\wizardwidget\WizardWidget;

/* @var $this yii\web\View */
/* @var $Model common\models\Model */
/* @var $step integer */
/* @var $form yii\widgets\ActiveForm */


//$form = ActiveForm::begin(['options' => ['role' => 'form']]);
$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Step 1',
            'icon' => 'glyphicon glyphicon-certificate',
            'content' =>  $this->render('nomination', ['model_nomination' => $model_nomination,'competition'=>$competition]),
            'buttons' => [
                'next' => [
                    'title' => 'Forward',
                    'options' => [
                        'class' => 'disabled'
                    ],
                ],
            ],
        ],
        2 => [
            'title' => 'Step 2',
            'icon' => 'glyphicon glyphicon-star',
            'content' =>$this->render('criterion', ['model_criterion' =>$model_criterion,'competition'=>$competition]),
            'skippable' => true,
        ],
        3 => [
            'title' => 'Step 3',
            'icon' => 'glyphicon glyphicon-user',
            'content' => $this->render('expert', ['model' => $model_expert,'competition'=>$competition, 'usermap'=>$usermap]),

            ],
    ],
    'complete_content' => "You are done!", // Optional final screen
    'start_step' => 1, // Optional, start with a specific step
];
echo WizardWidget::widget($wizard_config);

//ActiveForm::end();