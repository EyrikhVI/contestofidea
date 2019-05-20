<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
    <style>
        /* Note: Try to remove the following lines to see the effect of CSS positioning */
        .affix {
            top: 0;
            width: 100%;
            z-index: 9999 !important;
        }

        .affix + .container-fluid {
            padding-top: 70px;
        }
    </style>

</head>
<body>
<!--<div class="container-fluid" style="background-color:#F44336;color:#fff;height:100px;">
    <h1><?/*= Html::encode(Yii::$app->name) */?></h1>
    <h3>Проведение конкурсов</h3>
    <p>Scroll this page to see how the navbar behaves with data-spy="affix".</p>
    <p>The navbar is attached to the top of the page after you have scrolled a specified amount of pixels.</p>
</div>-->
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse /*navbar-fixed-top*/',
        ],
    ]);
    $menuItems = [
        ['label' => 'Главная', 'url' => ['/site/index']],
        ['label' => 'О нас', 'url' => ['/site/about']],
        ['label' => 'Связаться с нами', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Вход', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
/*            . Html::submitButton('Выход (' . Yii::$app->user->identity->username . ')',*/
            . Html::submitButton('Выход',
                ['class' => 'btn btn-link logout'])
            . Html::endForm()
            . '</li>';
/*        $menuItems[] = '<li class="dropdown">'
        .'<a class="dropdown-toggle" data-toggle="dropdown" style="display:block; padding:0px" href="#">'
        . Html::img(Yii::$app->params['UploadAvatar'].Yii::$app->user->identity->avatar, ['alt' => 'Фото','class'=>"img-circle",'width'=>'50px','height'=>'50px'])
        .'<span class="caret"></span></a>'
        .'<ul class="dropdown-menu">'
        .'<li>'.Html::a('<i class="fas fa-user"></i>'.' Мой профиль',URL::to(['/site/profile'])).'</li>'
        .'<li>'.Html::a(' Мои конкурсы',URL::to(['/site/profile'])).'</li>'
        .'<li>'.Html::a(' Создать конкурс',URL::to(['/site/profile'])).'</li>'
        .'</ul>'
        .'</li>';*/
        $menuItems[]=Html::img(Yii::$app->params['UploadAvatar'].Yii::$app->user->identity->avatar, ['alt' => 'Фото','class'=>"img-circle",'width'=>'50px','height'=>'50px']);
        $menuItems[]=['label' =>Yii::$app->user->identity->username
        ,
            'items' => [
/*            ['label' => Html::img(Yii::$app->params['UploadAvatar'].Yii::$app->user->identity->avatar, ['alt' => 'Фото','class'=>"img-circle",'width'=>'50px','height'=>'50px']).'<span>'.Yii::$app->user->identity->last_name.' '.Yii::$app->user->identity->first_name.' '.Yii::$app->user->identity->patronymic.'</span>','visible' =>true, 'url' => '#'],
            '<li class="divider"></li>',
            '<li class="dropdown-header">Dropdown Header</li>',*/
            ['label' => '<i class="fas fa-user"></i>'.' Мой профиль', 'url' => URL::to(['/site/profile'])],
            ['label' => ' Мои конкурсы', 'url' => URL::to(['/site/profile'])],
            ['label' => ' Создать конкурс', 'url' => URL::to(['/site/profile']),'visible' =>Yii::$app->user->getIdentity()->isParticipant()],

            ]];

    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
