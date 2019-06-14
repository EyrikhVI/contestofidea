<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Expert */

$this->title = 'Изменить назначение эксперта: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Эксперты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="expert-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,  'id_competition'=>$competition->id, 'usermap'=>$usermap,
    ]) ?>

</div>
