<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Application */

$this->title = 'Заявка на конкурс';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="application-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3><?=$competition->name?></h3>
    <h3><?=$user->id?></h3>
    <?= $this->render('_form', [
        'model' => $model, 'user'=>$user,
    ]) ?>

</div>
