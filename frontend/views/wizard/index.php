<?php
// Wizard view example

use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use drsdre\wizardwidget\WizardWidget;

/* @var $this yii\web\View */
/* @var $Model common\models\Model */
/* @var $step integer */
/* @var $form yii\widgets\ActiveForm */

$this->title = Yii::t('app', 'Example Form Wizard');

$form = ActiveForm::begin();

$wizard_config = [
    'steps' => [
        '1' => [
            'title' => 'Step 1',
            'icon' => 'glyphicon glyphicon-cloud-download',
            'content' => $this->render('nomination', ['_form' => $form, 'Nomaination' => $Model]),
            'buttons' => [
                'next' => [
                    'title' => 'Next: Step 2',
                    'options' => ['class'=> 'btn btn-success']
                ]
            ],
        ],
        '2' => [
            'title' => 'Step 2',
            'icon' => 'glyphicon glyphicon-cloud-upload',
            'content' => $this->render('_step2', ['form' => $form, 'Model' => $Model]),
            'buttons' => [
                'buttons' => [
                    'next' => [
                        'title' => 'Next: Final Step 3',
                        'options' => ['class'=> 'btn btn-success']
                    ]
                ],
            ],
            '3' => [
                'title' => 'Step 3 - Final',
                'icon' => 'glyphicon glyphicon-ok',
                'content' => $this->render('_step3', ['form' => $form, 'Dataset' => $Dataset]),
                'buttons' => [
                    'save' => [
                        'html' => Html::submitButton(
                            Yii::t('app', 'Load data'),
                            [
                                'class' => 'btn btn-success',
                                'id' => 'wizard_step3_final',
                                'name' => 'step',
                                'value' => 'save-final'
                            ]
                        ),
                    ],
                ],
            ],
        ],
        'start_step' => $step,
    ]
];

echo WizardWidget::widget($wizard_config);

ActiveForm::end();