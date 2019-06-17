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
            'title' => 'Номинации',
            'icon' => 'glyphicon glyphicon-certificate',
            'content' =>  $this->render('nomination', ['model_nomination' => $model_nomination,'competition'=>$competition]),
            'buttons' => [
                'next' => [
                    'title' => 'Далее',
                    'options' => ['class'=> 'btn btn-success'],
                ],
            ],
        ],
        2 => [
            'title' => 'Критерии',
            'icon' => 'glyphicon glyphicon-star',
            'content' =>$this->render('criterion', ['model_criterion' =>$model_criterion,'competition'=>$competition]),
            'skippable' => true,
            'buttons' => [
                'next' => [
                    'title' => 'Далее',
                    'options' => ['class'=> 'btn btn-success']
                ],
                'skip' => [
                    'title' => 'Пропустить',
                    'options' => ['class'=> 'btn btn-danger'],
                ],
                'prev' => [
                    'title' => 'Назад',
                    'options' => ['class'=> 'btn btn-primary'],
                ],
            ],
        ],
        3 => [
            'title' => 'Эксперты',
            'icon' => 'glyphicon glyphicon-user',
            'content' => $this->render('expert', ['model' => $model_expert,'competition'=>$competition, 'usermap'=>$usermap]),
            'buttons' => [
                'save' => [
                    'title' => 'Завершить',
                    'options' => ['class'=> 'btn btn-success']
                ],
                'prev' => [
                    'title' => 'Назад',
                    'options' => ['class'=> 'btn btn-primary'],
                ],
            ],
            ],
    ],
    'complete_content' => "Завершено конфигурирование конкурса!", // Optional final screen
    'start_step' => 1, // Optional, start with a specific step
];
echo WizardWidget::widget($wizard_config);

//ActiveForm::end();