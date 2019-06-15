<?php
$wizard_config = [
    'id' => 'stepwizard',
    'steps' => [
        1 => [
            'title' => 'Step 1',
            'icon' => 'glyphicon glyphicon-cloud-download',
            'content' =>  $this->render('nomination', ['model' => $model,'competition'=>$competition]),
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
            'icon' => 'glyphicon glyphicon-cloud-upload',
            'content' => $this->render('criterion', ['model' => $model]),
            'skippable' => true,
        ],
        3 => [
            'title' => 'Step 3',
            'icon' => 'glyphicon glyphicon-transfer',
            'content' => '<h3>Step 3</h3>This is step 3',
        ],
    ],
    'complete_content' => "You are done!", // Optional final screen
    'start_step' => 1, // Optional, start with a specific step
];
?>

<?= \drsdre\wizardwidget\WizardWidget::widget($wizard_config); ?>