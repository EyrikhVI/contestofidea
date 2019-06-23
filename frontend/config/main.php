<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name'=>'Конкурс идей',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
            'baseUrl'=>'',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'category/<id:\d+>/page/<page:\d+>'=>'category/view',
                'category/<id:\d+>'=>'category/view',
                'competition/view/<id:\d+>'=>'competition/view',
                'competition/update/<id:\d+>'=>'competition/update',
                'application/create/<id:\d+>'=>'application/create',
                'application/update/<id:\d+>'=>'application/update',
                'nomination/create/<id:\d+>'=>'nomination/create',
                'nomination/updare/<id:\d+>'=>'nomination/update',
                'criterion/create/<id:\d+>'=>'criterion/create',
                'criterion/update/<id:\d+>'=>'criterion/update',
                'expert/create/<id:\d+>'=>'expert/create',
                'expert/update/<id:\d+>'=>'expert/update',
                'wizard/index/<id:\d+>,<step:\d+>'=>'wizard/index',
                'expertise/competition-expertise/<id:\d+>'=>'expertise/competition-expertise',


                ],
        ],
    ],
    'params' => $params,
];
