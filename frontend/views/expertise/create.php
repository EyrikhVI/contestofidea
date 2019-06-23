<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Expertise */

$this->title = 'Оценить заявку';
$this->params['breadcrumbs'][] = ['label' => 'Оценки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="expertise-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'expertises' => $expertises, 'application'=>$application,'competition'=>$competition,
        'criterion'=>$criterion, 'user'=>$user
    ]) ?>

</div>
