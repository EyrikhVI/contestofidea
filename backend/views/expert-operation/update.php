<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ExpertOperation */

$this->title = 'Изменить назначение: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Эксперты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="expert-operation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'competition'=>$competition, 'usermap'=>$usermap,
    ]) ?>

</div>
