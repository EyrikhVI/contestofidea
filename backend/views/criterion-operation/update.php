<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CriterionOperation */

$this->title = 'Изменить критерий: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Критерии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="criterion-operation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,'competition'=>$competition,
    ]) ?>

</div>
