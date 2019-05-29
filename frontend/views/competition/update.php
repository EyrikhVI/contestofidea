<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Competition */

$this->title = 'Изменить параметры: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Конкурсы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="competition-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
